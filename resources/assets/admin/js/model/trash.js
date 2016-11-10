// Trash the article ..

class Trash {

    static restoreItem(id) {
        return $.ajax({
            // TODO Hardcoded URL
            url: "http://dev.yuma.sk/administrator/trash/"+id+'/restore',
            type: 'POST'
        })
    }

    static wipeItem(id, csrf_token) {
        return $.ajax({
            url: "http://dev.yuma.sk/administrator/trash/"+id+"/destroy?csrf_token=" + csrf_token,
            type: 'DELETE',
            data: {
                "_token":csrf_token
            }
        })
    }

}

export default Trash;
