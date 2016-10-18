import Article from '../model/article';
import Datatable from '../component/datatable';

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
        let dtArticles = new Datatable('#dt-articles');
        dtArticles.show();

        // Init categories
        let dtCategories = new Datatable('#dt-categories');
        dtCategories.show();

        // Init trash
        let dtTrash = new Datatable('#dt-trash');
        dtTrash.show();

        // Init select all

        // $('th.select-checkbox').on('click', function(){
        //     var table = $('#dt-articles').DataTable();
        //     // var cells = table.cells().select();
        //     table.cell( ':eq(0)', null, {page: 'current'} ).select();
        //     // $( cells ).find(':checkbox').prop('checked', $(this).is(':checked'));
        // });
    }

}

export default ArticleForm;