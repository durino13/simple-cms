var alertify = require("imports?this=>window!alertify.js/dist/js/alertify.js");
require("imports?this=>window!alertify.js/dist/css/alertify.css");

class Common {

    /**
     * Show the notification
     * @param type
     * @param msg
     */
    static notify(type, msg) {
        // All messages goes to the top right position
        alertify.logPosition("top right");

        switch (type) {
            case 'success':
                alertify.success(msg);
                return;
            case 'error':
                alertify.error(msg);
                return;
            default:
                alertify.success(msg);
        }
    }

    static redirect(url) {
        window.location.href = url;
    }

}

export default Common;