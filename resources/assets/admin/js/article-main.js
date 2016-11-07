require('../../../../node_modules/admin-lte/plugins/datepicker/bootstrap-datepicker.js');
require('../../../../node_modules/admin-lte/plugins/datepicker/datepicker3.css');
import General from './form/general';
import ArticleForm from './form/article';
import Vue from 'vue/dist/vue.js';

// ------------------------------------------------------------------------------------
// General stuff
// ------------------------------------------------------------------------------------

$(document).ready(function() {
    // Initialize the application ...
    General.init();
    ArticleForm.init();
});

// Create the batch component ..
Vue.component('batch', {
    template: '#batch-template',
    props: ['count']
});

// Bind the Vue to the left navigation menu, so we can update the counters on the fly ..
new Vue({
    el: '.main-sidebar'
});

// ------------------------------------------------------------------------------------
// Version number
// ------------------------------------------------------------------------------------

var package_json = require('json!../../../../package.json');
$('#version').html(package_json.version);