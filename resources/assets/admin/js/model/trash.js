// Trash the article ..

class Trash {

    constructor(id) {
        this.id = id;
    }

    restoreItem() {
        return $.ajax({
            // TODO Hardcoded URL
            url: "http://dev.yuma.sk/administrator/trash/"+this.id+'/restore',
            type: 'POST'
        })
    }

}

export default Trash;
