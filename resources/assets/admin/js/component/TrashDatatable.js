import Datatable from './Datatable';
import Trash from '../model/trash';
import Common from '../common';

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

                    alertify.confirm("Do you really want to restore the selected item(s)?", function () {

                        for (let id of ids) {
                            Trash.restoreItem(id).done(function() {
                                // Remove deleted rows from the table
                                rows.remove().draw();

                                // Display the notification ..
                                Common.notify('success', 'The selected item(s) have been successfully restored!');
                            });
                        }

                    })

                }
            },
            {
                text: '<i class="fa fa-trash-o" aria-hidden="true"></i>',
                enabled: false,
                className: 'wipeButton',
                action: function ( e, dt, node, config ) {
                    let rows = dt.rows('.selected');
                    let ids = rows.ids().toArray();
                    let csrf_token = $('#csrf_token').val();

                    alertify.confirm("Do you really want to delete selected items?", function () {

                        for (let id of ids) {
                            Trash.wipeItem(id, csrf_token).done(function(result) {
                                if (result.result) {
                                    // Remove deleted rows from the table
                                    rows.remove().draw();

                                    // Display the notification ..
                                    Common.notify('success', 'The selected items(s) have been successfully deleted!');
                                } else {
                                    Common.notify('error', result.error)
                                }
                            });
                        }

                    })

                }
            }
        ]

    }

}

export default TrashDatatable;