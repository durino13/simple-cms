class General {

    static init() {
        this.bindCloseButton();
        this.bindDatepicker();
        this.bindAjax();
    }

    // Handle here AJAX requests to the server
    static bindAjax() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', 'a.jquery-postback', function(e) {
            e.preventDefault(); // does not go through with the link.

            var $this = $(this);
            var redirect = $this.attr('data-redirect');

            $.post({
                type: $this.data('method'),
                url: $this.attr('href'),
                redirect: redirect
            }).done(function (data) {
                if (data.result === true) {
                    window.location.href = redirect;
                } else {
                    alert('The document can not be deleted.');
                }
            });
        });
    }

    static bindCloseButton() {
        // Bind the form close button ..
        $('#form-close').on('click', function(e) {
            e.preventDefault();
            var redirectUrl = e.target.dataset.redirect;

            if(confirm('Do you really want to close this form?')) {
                window.location.href = redirectUrl;
            }
        })
    }

    static bindDatepicker() {
        $('.datepicker').datepicker();
    }

}

export default General;