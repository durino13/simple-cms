// TinyMCE config

var ed = tinymce.init({
    selector: '#article_text',
    skin: false,
    plugins: ['image','media', 'fullscreen','template'],
    toolbar: ' forecolor backcolor bold italic underline removeformat | alignleft aligncenter alignright | copy paste | bullist numlist | template | link image | fullscreen',
    height: 400,
    content_css : '/public/assets/admin.all.css',
    templates: [
        {title: 'Readmore', description: 'Insert readmore article section', content: '<hr/>'},
    ],
    file_picker_callback: function(callback, value, meta) {
        if (meta.filetype == 'image') {
            $("#fileUploader").unbind( "change" );
            $("#fileUploader").change(function(event) {
                    onFileChosen(event,callback);
                });
            $("#fileUploader").click();
        }
    },
    convert_urls: false,
    // file_picker_callback: function(callback, value, meta) {
    //     tinyMCE.activeEditor.windowManager.open({
    //         title: 'Media manager',
    //         // TODO Hardcoded url
    //         url: 'http://cms.local.d/administrator/media/embedded',
    //         width: 700,
    //         height: 600,
    //         buttons: [{
    //             text: 'Insert',
    //             onclick: function () {
    //                 //.. do some work
    //                 tinymce.activeEditor.windowManager.close();
    //             }
    //         }, {
    //             text: 'Close',
    //             onclick: 'close'
    //         }]
    //     });
    //
    //  //   win.document.getElementById('mceu_37-inp').value = 'my browser value';
    // }

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