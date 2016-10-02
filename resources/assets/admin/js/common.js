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

// Configuration for datatables can be found on the server in config/app.php file ..

$('#dt-articles').DataTable(
    {
        "initComplete": function () {
            this.api().columns(datatables_filterColumnsIndexes).every( function () {
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

        // TODO Text to icon conversion not working ..

        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            if (aData[datatables_articleStatusColumnIndex] === '1') {
                $('td:eq('+datatables_articleStatusColumnIndex+')', nRow).html( '<i class="fa fa-check-circle-o text-success"></i>' );
            } else {
                $('td:eq('+datatables_articleStatusColumnIndex+')', nRow).html( '<i class="fa fa-close text-danger"></i>' );
            }
        },
        order: [[datatables_articleSortColumnIndex,'desc']]
    }
);
$('#dt-articles').show();

// Categories datatables

$('#dt-categories').DataTable({
    order: [[datatables_categorySortColumnIndex,'desc']]
});
$('#dt-categories').show();

// Trash datatables

$('#dt-trash').DataTable();
$('#dt-trash').show();

// ------------------------------------------------------------------------------------
// Datepickers
// ------------------------------------------------------------------------------------

// Datepicker
$('.datepicker').datepicker();

// ------------------------------------------------------------------------------------
// Datepickers
// ------------------------------------------------------------------------------------

var package_json = require('json!../../../../package.json');
$('#version').html(package_json.version);