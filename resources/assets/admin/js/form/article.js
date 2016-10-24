import Article from '../model/article';
import ArticleDatatable from '../component/ArticleDatatable';
import TrashDatatable from '../component/TrashDatatable';
import Datatable from '../component/Datatable';
var alertify = require("imports?this=>window!alertify.js/dist/js/alertify.js");
require("imports?this=>window!alertify.js/dist/css/alertify.css");

class ArticleForm {

    static init() {
        this.bindChosen();
        this.bindDatatables();
        this.bindButtons();
    }

    static bindChosen() {
        $("#categories").chosen({width:"95%"});
    }

    static bindDatatables() {

        // Init articles
        let dtArticles = new ArticleDatatable('#dt-articles', true, true, false);
        dtArticles.show();

        // Init categories
        let dtCategories = new Datatable('#dt-categories', true, false, false);
        dtCategories.show();

        // Init trash
        let dtTrash = new TrashDatatable('#dt-trash', false, false, true);
        dtTrash.show();

    }

    static bindButtons() {

        $('#save').on('click', function(e) {
            e.preventDefault();
            let article = new Article();
            article.save()
                .done(function() {
                    // Show the notification
                    alertify.logPosition("top right");
                    alertify.success('The article has been successfully saved!');
                })
        })

    }

}

export default ArticleForm;