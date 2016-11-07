require('../../../../node_modules/admin-lte/plugins/datepicker/bootstrap-datepicker.js');
require('../../../../node_modules/admin-lte/plugins/datepicker/datepicker3.css');
import General from './form/general';
import ArticleForm from './form/article';

// ------------------------------------------------------------------------------------
// General stuff
// ------------------------------------------------------------------------------------

$(document).ready(function() {
    // Initialize the application ...
    General.init();
    ArticleForm.init();
});

// ------------------------------------------------------------------------------------
// Version number
// ------------------------------------------------------------------------------------

var package_json = require('json!../../../../package.json');
$('#version').html(package_json.version);