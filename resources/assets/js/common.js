// Author:      Juraj Marusiak
// Created:     01.06.2016
// Description: This is the entrance file for all JS on the page ...

// ------------------------------------------------------
// -- Load dependencies ..
// ------------------------------------------------------

// Weird way to load a datatable JS .. the define=>disable part disables AMD, so datatables will use CommonJS
require('imports?define=>false!datatables.net')(window, $);
// Let's load CSS for datatables here ..
require('imports?define=>false!datatables.net-bs' )( window, $ );
// AdminLTE is loaded here .. The $=jquery notation will make jQuery available for AdminLTE, otherwise you will see
// following message: AdminLTE requires jQuery ..
require('imports?$=jquery!../../../node_modules/admin-lte/dist/js/app.min.js');
require('imports?$=jquery!../../../node_modules/admin-lte/plugins/jQueryUI/jquery-ui.js');


$('#dt-articles').DataTable();