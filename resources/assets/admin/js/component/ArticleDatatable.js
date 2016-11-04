import Datatable from './Datatable';
import Article from '../model/article';
import Common from '../common';

var alertify = require("imports?this=>window!alertify.js/dist/js/alertify.js");
require("imports?this=>window!alertify.js/dist/css/alertify.css");


class ArticleDatatable extends Datatable {

    constructor(selector, trash, archive, recycle) {
        super(selector, trash, archive, recycle);
    }

    /**
     * Init buttons
     */
    initButtons() {

        return [
            {
                text: '<i class="fa fa-archive" aria-hidden="true"></i>',
                enabled: false,
                className: 'archiveButton',
                action: function ( e, dt, node, config ) {

                    let rows = dt.rows('.selected');
                    let ids = rows.ids().toArray();

                    // confirm dialog
                    alertify.confirm("Do you really want to archive "+ ids.length +" selected article(s)?", function () {

                        for (let id of ids) {
                            Article.archive(id)
                                .done(function() {

                                    // Remove selected rows ..
                                    rows.remove().draw();

                                    // Display the notification ..
                                    Common.notify('success', 'The article has been successfully archived!');
                                });
                        }

                    });

                }
            },
            {
                text: '<i class="fa fa-trash" aria-hidden="true"></i>',
                enabled: false,
                className: 'trashButton',
                action: function ( e, dt, node, config ) {

                    let rows = dt.rows('.selected');
                    let ids = rows.ids().toArray();

                    alertify.confirm("Do you really want to trash "+ ids.length +" selected article(s)?", function () {

                        for (let id of ids) {
                            Article.trash(id)
                                .done(function() {

                                    // Remove selected rows ..
                                    rows.remove().draw();

                                    // Display the notification ..
                                    Common.notify('success', 'The article(s) have been successfully moved into trash!');
                                });
                        }

                    });

                }
            }
        ]

    }

}

export default ArticleDatatable;