import Datatable from './Datatable';
import Article from '../model/article';
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
                text: '<i class="fa fa-trash" aria-hidden="true"></i>',
                enabled: false,
                className: 'trashButton',
                action: function ( e, dt, node, config ) {
                    let rows = dt.rows('.selected');
                    let ids = rows.ids().toArray();
                    for (let id of ids) {
                        let article = new Article(id);
                        article.trash()
                            .done(function() {

                                // Remove selected rows ..
                                rows.remove().draw();

                                // Display the notification ..
                                alertify.logPosition("top right");
                                alertify.success('The article has been moved into trash!');
                            });
                    }
                }
            },
            {
                text: '<i class="fa fa-archive" aria-hidden="true"></i>',
                enabled: false,
                className: 'archiveButton',
                action: function ( e, dt, node, config ) {
                    let ids = dt.rows('.selected').ids().toArray();
                    for (let id of ids) {
                        let article = new Article(id);
                        article.archiveArticle();
                    }
                }
            }
        ]

    }

}

export default ArticleDatatable;