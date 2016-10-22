import Article from '../model/article';
import ArticleDatatable from '../component/ArticleDatatable';
import TrashDatatable from '../component/TrashDatatable';
import Datatable from '../component/Datatable';

class ArticleForm {

    static init() {
        this.bindChosen();
        this.bindDatatables();
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

}

export default ArticleForm;