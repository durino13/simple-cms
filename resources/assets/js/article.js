$(document).ready(function() {
    $('#form-close').on('click', function(e) {
        e.preventDefault();
        var redirectUrl = e.target.dataset.redirect;

        if(confirm('Do you really want to close this form?')) {
            window.location.href = redirectUrl;
        }
    })
})
