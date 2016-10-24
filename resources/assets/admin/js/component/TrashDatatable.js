import Datatable from './Datatable';
import Trash from '../model/trash';
var alertify = require("imports?this=>window!alertify.js/dist/js/alertify.js");
require("imports?this=>window!alertify.js/dist/css/alertify.css");

class TrashDatatable extends Datatable {

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
                    for (let id of ids) {
                        let trash = new Trash(id);
                        trash.restoreItem().done(function() {
                            // Remove deleted rows from the table
                            rows.remove().draw();

                            // Show the notification
                            alertify.logPosition("top right");
                            alertify.success('The article has been restored!');
                        });
                    }
                }
            }
        ]

    }

}

export default TrashDatatable;