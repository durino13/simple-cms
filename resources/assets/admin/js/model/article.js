// Trash the article ..

class Article {

    constructor(id) {
        this.id = id;
    }

    trashArticle(id) {
        $.ajax({
            url: "http://dev.yuma.sk/administrator/article/"+this.id,
            type: 'DELETE'
        }).done(function() {
            console.log('Done')
        });
    }

}

export default Article;
