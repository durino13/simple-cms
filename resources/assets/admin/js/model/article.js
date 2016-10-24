// Trash the article ..

class Article {

    constructor(id = null) {
        this.id = id;
    }

    save() {
        return $.ajax({
            url: 'http://dev.yuma.sk/administrator/article',
            type: 'POST',
            data: $('#article-form').serialize()
        })
    }

    trash() {
        return $.ajax({
            url: 'http://dev.yuma.sk/administrator/article/'+ this.id,
            type: 'DELETE'
        });
    }

}

export default Article;
