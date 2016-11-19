// Trash the article ..

class Article {

    /**
     * Save the article
     * @param type Use POST to create NEW article, use PUT to update an existing article
     * @param id ID of an article you want to update
     * @returns {*}
     */
    static save(type = 'POST', id = '') {

        let url = JSON.parse(general_baseURL)+'/administrator/article';
        (type === 'PUT') ? url += '/'+id : '';

        return $.ajax({
            url: url,
            type: type,
            data: $('#article-form').serialize()
        })
    }

    /**
     * Update an existing article
     * @param id ID of an article you want to update
     * @returns {*}
     */
    static update(id) {
        return Article.save('PUT', id)
    }

    /**
     * Send the article into trash
     * @returns {*}
     */
    static trash(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        return $.ajax({
            url: JSON.parse(general_baseURL)+'/administrator/article/'+ id,
            type: 'DELETE'
        });
    }

    /**
     * Archive the article
     * @param id
     * @returns {*}
     */
    static archive(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        return $.ajax({
            url: JSON.parse(general_baseURL)+'/administrator/article/'+ id +'/archive/archive',
            type: 'POST'
        })
    }

    /**
     * Restore the article from the archive
     * @param id
     * @returns {*}
     */
    static restore(id) {
        return $.ajax({
            url: JSON.parse(general_baseURL)+'/administrator/article/'+ id +'/archive/restore',
            type: 'POST'
        })
    }

}

export default Article;
