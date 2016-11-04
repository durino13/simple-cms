import Datatable from './Datatable';
import Article from '../model/article';
import Common from '../common';

var alertify = require("imports?this=>window!alertify.js/dist/js/alertify.js");
require("imports?this=>window!alertify.js/dist/css/alertify.css");

class ArchiveDatatable extends Datatable {

    constructor(selector, trash, archive, recycle) {
        super(selector, trash, archive, recycle);
    }

    /**
     * Init buttons
     */
    initButtons() {

        return [
            {
                text: '<i class="fa fa-recycle" aria-hidden="true"></i>',
                enabled: false,
                className: 'recycleButton',
                action: function ( e, dt, node, config ) {
                    let rows = dt.rows('.selected');
                    let ids = rows.ids().toArray();

                    alertify.confirm("Do you really want to restore the "+ ids.length +" selected item(s)?", function () {

                        for (let id of ids) {
                            Article.restore(id)
                                .done(function() {
                                    // Remove deleted rows from the table
                                    rows.remove().draw();

                                    // Display the notification ..
                                    Common.notify('success', 'The selected item(s) have been successfully restored!');
                                });
                        }

                    });
                }
            }
        ]

    }

}

export default ArchiveDatatable;