require('../../../../node_modules/admin-lte/plugins/datepicker/bootstrap-datepicker.js');
require('../../../../node_modules/admin-lte/plugins/datepicker/datepicker3.css');

// ------------------------------------------------------------------------------------
// Application logic
// ------------------------------------------------------------------------------------

// Close form alert

$(document).ready(function() {
    $('#form-close').on('click', function(e) {
        e.preventDefault();
        var redirectUrl = e.target.dataset.redirect;

        if(confirm('Do you really want to close this form?')) {
            window.location.href = redirectUrl;
        }
    })
});

// Handle here AJAX requests to the server

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

// ------------------------------------------------------------------------------------
// Chosen
// ------------------------------------------------------------------------------------

$("#categories").chosen({width:"95%"});

// ------------------------------------------------------------------------------------
// Datatables
// ------------------------------------------------------------------------------------


// TODO Refaktorovat poradie stlpcov ..

$('#dt-articles').DataTable(
    {
        "initComplete": function () {
            this.api().columns([2,3,4]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty())
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            // Bold the grade for all 'A' grade browsers
            if (aData[5] === '1') {
                $('td:eq(5)', nRow).html( '<i class="fa fa-check-circle-o text-success"></i>' );
            } else {
                $('td:eq(5)', nRow).html( '<i class="fa fa-close text-danger"></i>' );
            }
        },
        order: [[6,'desc']]
    }
);
$('#dt-articles').show();
$('#dt-categories').DataTable({
    order: [[3,'desc']]
});
$('#dt-categories').show();

// ------------------------------------------------------------------------------------
// Datepickers
// ------------------------------------------------------------------------------------

// Datepicker
$('.datepicker').datepicker();