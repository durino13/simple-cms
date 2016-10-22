// Trash the article ..

class Article {

    constructor(id) {
        this.id = id;
    }

    trashArticle(id) {
        return $.ajax({
            url: "http://dev.yuma.sk/administrator/article/"+this.id,
            type: 'DELETE'
        });
    }

}

export default Article;
