// TinyMCE config

var ed = tinymce.init({
    selector: '#article_text',
    skin: false,
    plugins: ['image','media', 'fullscreen','template', 'filemanager', 'link'],
    toolbar: ' forecolor backcolor bold italic underline removeformat | alignleft aligncenter alignright | copy paste | bullist numlist | link | template | image | fullscreen',
    height: 400,
    content_css : '/public/assets/admin.all.css',
    templates: [
        {title: 'Readmore', description: 'Insert readmore article section', content: '<hr/>'},
    ],
    external_filemanager_path:"/plugins/filemanager/filemanager/",
    filemanager_title:"Responsive Filemanager" ,
    external_plugins: { "filemanager" : "/plugins/filemanager/filemanager/plugin.min.js"},
    convert_urls: false

});

function onFileChosen(event,callback)
{
    //Detach any current submit handlers
    $("#fileUploadForm").unbind("submit");
    $("#fileUploadForm").submit(function(e) {

        e.stopPropagation(); // Stop stuff happening
        e.preventDefault(); // Totally stop stuff happening

        //Prepare file in form for transmission via ajax call
        var formData = new FormData();
        $.each(event.target.files, function(i, file) {
            formData.append('file-'+i, file);
        });

        // Add the token to the request
        formData.append('_token', $('input[name=_token]').val());

        //The url that will handle the file upload
        var url = "/administrator/media/upload"

        //Do ajax call
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
        }).done(function(data) {
            if(data.result === true)
            {
                //This is the important part. This callback will tell TinyMCE the path of the uploaded image
                // TODO Hardcoded URL
                callback('http://cms.local.d/administrator/media/download?path='+ data.newPath, {});
            }
            else{
                alert("The image upload was not successful. Reason:" + data.status);
            }
        }).fail(function(data) {
            alert('An error occured while uploading an image into the repository')
        });

    });
    $("#fileUploadForm").submit();
}