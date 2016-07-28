// TinyMCE config

var ed = tinymce.init({
    selector: '#article_text',
    skin: false,
    plugins: ['image','media', 'fullscreen','template'],
    toolbar: ' forecolor backcolor bold italic underline removeformat | alignleft aligncenter alignright | copy paste | bullist numlist | link image | fullscreen | table | template',
    height: 400,
    content_css : '/public/assets/admin.all.css',
    templates: [
        {title: 'Readmore', description: 'Insert readmore article section', content: '<hr/>'},
    ],
    file_picker_callback: function(callback, value, meta) {
        tinyMCE.activeEditor.windowManager.open({
            title: 'Media manager',
            // TODO Hardcoded url
            url: 'http://cms.local.d/administrator/media/embedded',
            width: 700,
            height: 600
        });
    }

});