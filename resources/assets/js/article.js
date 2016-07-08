$(document).ready(function() {
    $('#article-close').on('click', function(e) {
        e.preventDefault();
        if(confirm('Do you really want to close this article?')) {
            window.location.href = '/article';
        } else {
            alert('Not closed');
        }
    })
})
