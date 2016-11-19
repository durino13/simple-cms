import Article from '../model/article';
import ArticleDatatable from '../component/ArticleDatatable';
import ArchiveDatatable from '../component/ArchiveDatatable';
import TrashDatatable from '../component/TrashDatatable';
import Datatable from '../component/Datatable';
import Common from '../common';

class ArticleForm {

    static init() {
        this.bindChosen();
        this.bindDatatables();
        this.bindButtons();
    }

    /**************************************************************************
     * Helper form actions
     **************************************************************************/

    /**
     * Check, if the article is new
     */
    static isNew() {
        return $('input[name="article_id"]').val() === '' ? true : false;
    }

    static getArticleID() {
        return $('input[name="article_id"]').val();
    }

    /**************************************************************************
     * Bind form events here ..
     **************************************************************************/

    static bindChosen() {
        $("#categories").chosen({width:"95%"});
    }

    static bindDatatables() {

        // Init articles
        let dtArticles = new ArticleDatatable('#dt-articles', true, true, false);
        dtArticles.show();

        // Init archive
        let dtArchive = new ArchiveDatatable('#dt-archive', false, false, true);
        dtArchive.show();

        // Init categories
        let dtCategories = new Datatable('#dt-categories', true, false, false);
        dtCategories.show();

        // Init trash
        let dtTrash = new TrashDatatable('#dt-trash', false, false, true);
        dtTrash.show();

    }

    static bindButtons() {

        // Save button
        $('#save').on('click', function(e) {
            e.preventDefault();
            Article.update(ArticleForm.getArticleID())
                .done(function() {
                    // Show the notification
                    Common.notify('success','The article has been successfully saved!');
                })
        });

        // Save and close button
        $('#save_and_close').on('click', function(e) {
            e.preventDefault();

            if (ArticleForm.isNew()) {
                Article.save()
                    .done(function() {
                        // Show the notification
                        Common.redirect(JSON.parse(general_baseURL)+'/administrator/article');
                        Common.notify('success', 'The article has been successfully created!');

                    })
            } else {
                Article.update(ArticleForm.getArticleID())
                    .done(function() {
                        // Show the notification
                        Common.redirect(JSON.parse(general_baseURL)+'/administrator/article');
                        Common.notify('success', 'The article has been successfully saved!');
                    })
            }

        });

    }

}

export default ArticleForm;