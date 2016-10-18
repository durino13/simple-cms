class Datatable {

    constructor(selector) {
        this.selector = selector;
        this.init();
    }

    init() {
        $(this.selector).DataTable(
            {
                // Enable the select plugin
                select: true,

                dom: 'Blfrtip',

                buttons: [
                    {
                        text: 'Trash all',
                        action: function ( e, dt, node, config ) {
                            let ids = dt.rows('.selected').ids().toArray();
                            for (let id of ids) {
                                let article = new Article(id);
                                article.trashArticle();
                            }
                        }
                    }
                ],

                columnDefs: [ {
                    orderable: false,
                    className: 'select-checkbox',
                    targets:   0
                } ],

                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                },

                // Add the select selectboxes at the bottom of the Datatables table ..
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

                "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                    if (aData[datatables_articleStatusColumnIndex] === '1') {
                        $('td:eq('+datatables_articleStatusColumnIndex+')', nRow).html( '<i class="fa fa-check-circle-o text-success"></i>' );
                    } else {
                        $('td:eq('+datatables_articleStatusColumnIndex+')', nRow).html( '<i class="fa fa-close text-danger"></i>' );
                    }
                },

                // order: [[datatables_articleSortColumnIndex,'desc']]
            }
        );
    }

    show() {
        $(this.selector).show();
    }

}

export default Datatable;