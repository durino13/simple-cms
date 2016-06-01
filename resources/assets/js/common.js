// var $ = require('jquery');
require('imports?define=>false!datatables.net')(window, $);  // divny sposob, ako naloadovat datatables.net, no disablovat AMD a pouzit CommonJS module style ..
require('imports?define=>false!datatables.net-bs' )( window, $ );
require('imports?$=jquery!../../../node_modules/admin-lte/dist/js/app.min.js');

$(document).ready(function() {

    $('#dt-articles').DataTable();

});