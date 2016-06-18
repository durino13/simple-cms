// Author:      Juraj Marusiak
// Created:     01.06.2016
// Description: This is the entrance file for all JS on the page ...

// -------------------------------------------------
// Datatables
// -------------------------------------------------

// Weird way to load a datatable JS .. the define=>disable part disables AMD, so datatables will use CommonJS
require('imports?define=>false!datatables.net')(window, $);
require('imports?define=>false!datatables.net-bs' )( window, $ );
require('../../../node_modules/datatables.net-dt/css/jquery.dataTables.css');

// -------------------------------------------------
// Admin LTE
// -------------------------------------------------

// AdminLTE is loaded here .. The $=jquery notation will make jQuery available for AdminLTE, otherwise you will see
// following message: AdminLTE requires jQuery ..
require('../../../node_modules/admin-lte/dist/js/app.min.js');
require('../../../node_modules/admin-lte/plugins/jQueryUI/jquery-ui.js');
require('../../../node_modules/admin-lte/dist/css/AdminLTE.css');
require('../../../node_modules/admin-lte/dist/css/skins/_all-skins.min.css');

// -------------------------------------------------
// TinyMCE
// -------------------------------------------------

require('tinymce/tinymce.js');
require('tinymce/themes/modern/theme.js');
require('tinymce/skins/lightgray/skin.min.css');
require('tinymce/plugins/image/plugin.js');
require('tinymce/plugins/media/plugin.js');
require('tinymce/plugins/fullpage/plugin.js');
require('tinymce/plugins/fullscreen/plugin.js');
require('tinymce/skins/lightgray/fonts/tinymce.ttf');
require('tinymce/skins/lightgray/fonts/tinymce.woff');
require('tinymce/skins/lightgray/fonts/tinymce.eot');
require('tinymce/skins/lightgray/fonts/tinymce.svg');

// -------------------------------------------------
// Chosen
// -------------------------------------------------

// require('../../../node_modules/chosen-npm/public/chosen.jquery.js');
// require('../../../node_modules/chosen-npm/public/chosen.css');

// -------------------------------------------------
// Others
// -------------------------------------------------

// import css
require('../../../node_modules/bootstrap/dist/css/bootstrap.min.css');
require('../../../node_modules/font-awesome/css/font-awesome.min.css');
require('../css/buttons.css');
require('../sass/app.scss');

// Init datatables ..
$('#dt-articles').DataTable();
$('#dt-articles').show();

// TinyMCE
var ed = tinymce.init({
    selector: '#article_text',
    skin: false,
    plugins: ['image','media', 'fullscreen'],
    toolbar: ' forecolor backcolor bold italic underline removeformat | alignleft aligncenter alignright | copy paste | bullist numlist | link image | fullscreen | table ',
    height: 400
});