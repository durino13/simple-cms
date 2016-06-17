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

// import css
require('../../../node_modules/bootstrap/dist/css/bootstrap.min.css')
require('../../../node_modules/admin-lte/dist/css/AdminLTE.css')
require('../../../node_modules/admin-lte/dist/css/skins/_all-skins.min.css')
require('../../../node_modules/font-awesome/css/font-awesome.min.css')
require('../../../node_modules/datatables.net-dt/css/jquery.dataTables.css')

// Require font-awesome ..
require('font-awesome/css/font-awesome.css');

// Import TinyMCE
require('tinymce/tinymce.js')
require('tinymce/themes/modern/theme.js')
require('tinymce/skins/lightgray/skin.min.css')
require('tinymce/skins/lightgray/content.min.css')
require('tinymce/skins/lightgray/skin.min.css')
require('tinymce/plugins/image/plugin.js')
require('tinymce/plugins/media/plugin.js')
require('tinymce/plugins/fullpage/plugin.js')
require('tinymce/plugins/fullscreen/plugin.js')
require('tinymce/skins/lightgray/fonts/tinymce.ttf');
require('tinymce/skins/lightgray/fonts/tinymce.woff');
require('tinymce/skins/lightgray/fonts/tinymce.eot');
require('tinymce/skins/lightgray/fonts/tinymce.svg');


// Custom styles .
require('../sass/app.scss')

// Init datatables ..
$('#dt-articles').DataTable();
$('#dt-articles').show();


// Init intro text
tinymce.init({
    selector: '#intro_text',
    skin: true,
    plugins: ['image','media', 'fullscreen']
});

// Init article text
tinymce.init({
    selector: '#article_text',
    skin: false,
    plugins: ['image','media', 'fullscreen']
})