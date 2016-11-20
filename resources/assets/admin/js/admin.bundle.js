// Author:      Juraj Marusiak
// Created:     01.06.2016
// Description: This is the entrance file for all JS on the page ...

// -------------------------------------------------
// Datatables
// -------------------------------------------------

// Weird way to load a datatable JS .. the define=>disable part disables AMD, so datatables will use CommonJS
require('imports?define=>false!datatables.net')(window, $);
require('imports?define=>false!datatables.net-bs' )( window, $ );
require('imports?define=>false!datatables.net-select' )( window, $ );
require('datatables.net-dt/css/jquery.dataTables.css');
require('datatables-select/dist/js/dataTables.select.js');
require('datatables-select/dist/css/select.bootstrap.css');
require('datatables.net-buttons/js/buttons.html5.js');
require('datatables.net-buttons/js/buttons.print.js');
require('datatables.net-buttons/js/buttons.colVis.js');
require('datatables.net-buttons/js/buttons.flash.js');
require('datatables.net-buttons/js/dataTables.buttons.js');
require('datatables.net-buttons-bs');

// -------------------------------------------------
// TinyMCE
// -------------------------------------------------

// TODO Load minified stuff in production ..

require('tinymce/tinymce.js');
require('tinymce/themes/modern/theme.js');
require('tinymce/skins/lightgray/skin.min.css');
require('tinymce/plugins/image/plugin.js');
require('tinymce/plugins/media/plugin.js');
require('tinymce/plugins/fullpage/plugin.js');
require('tinymce/plugins/fullscreen/plugin.js');
require('tinymce/plugins/template/plugin.js');
require('tinymce/plugins/link/plugin.js');
// require('tinymce/plugins/codesample/css/prism.css');
require('tinymce/plugins/codesample/plugin.js');
require('tinymce/plugins/code/plugin.js');
require('tinymce/skins/lightgray/fonts/tinymce.ttf');
require('tinymce/skins/lightgray/fonts/tinymce.woff');
require('tinymce/skins/lightgray/fonts/tinymce.eot');
require('tinymce/skins/lightgray/fonts/tinymce.svg');

// -------------------------------------------------                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <
// Others
// -------------------------------------------------

// import js & css
require('bootstrap/dist/css/bootstrap.min.css');
require('bootstrap/dist/js/bootstrap.min.js');
require('font-awesome/css/font-awesome.min.css');
require('../sass/app.scss');
require('./article-main.js');
require('../js/tinymce.js');
require('../images/dots.png');

// -------------------------------------------------
// Admin LTE
// -------------------------------------------------

// AdminLTE is loaded here .. The $=jquery notation will make jQuery available for AdminLTE, otherwise you will see
// following message: AdminLTE requires jQuery ..
require('admin-lte/dist/js/app.min.js');
require('admin-lte/plugins/jQueryUI/jquery-ui.js');
require('admin-lte/dist/css/AdminLTE.css');
require('admin-lte/dist/css/skins/_all-skins.min.css');

// -------------------------------------------------
// Non modules
// -------------------------------------------------

// This script will be loaded as if we have put it in the <script> tag ..
require('script!./global.js');