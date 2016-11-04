// Trash the article ..

class Trash {

    static restoreItem(id) {
        return $.ajax({
            // TODO Hardcoded URL
            url: "http://dev.yuma.sk/administrator/trash/"+id+'/restore',
            type: 'POST'
        })
    }

    static wipeItem(id) {
        return $.ajax({
            url: "http://dev.yuma.sk/administrator/trash/"+id+"/wipe",
            type: 'DELETE'
        })
    }

}

export default Trash;
