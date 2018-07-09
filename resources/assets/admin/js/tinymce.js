// TinyMCE config

var ed = tinymce.init({
    selector: '#article_text',
    skin: false,
    plugins: ['image','media', 'fullscreen','template', 'filemanager', 'link', 'codesample', 'code'],
    toolbar: ' forecolor backcolor bold italic underline removeformat | alignleft aligncenter alignright | copy paste | bullist numlist | link | template | codesample image | fullscreen',
    height: 400,
    content_css : '/assets/admin.all.css',
    templates: [
        {title: 'Readmore', description: 'Insert readmore article section', content: '<hr/>'},
    ],
    external_filemanager_path:"/plugins/filemanager/filemanager/",
    filemanager_title:"Responsive Filemanager" ,
    external_plugins: { "filemanager" : "/plugins/filemanager/filemanager/plugin.min.js"},
    convert_urls: false

});