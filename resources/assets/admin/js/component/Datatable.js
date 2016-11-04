import Article from '../model/article';

class Datatable {

    constructor(selector, trash, archive, recycle) {
        this.selectedItems = new Set();
        this.hasTrash = trash;
        this.hasArchive = archive;
        this.hasRecycle = recycle;
        this.selector = selector;
        this.dt = this.init();
        this.bindEvents();
    }

    init() {
        return $(this.selector).DataTable(
            {
                // Enable the select plugin
                select: true,

                dom: 'Blfrtip',

                buttons: this.initButtons(),

                columnDefs: [
                    {
                        "targets": 0,
                        "orderable": false,
                        "className": 'select-checkbox',
                    }
                ],

                fixedColumns: true,

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

            }
        );
    }

    /**
     * Display the datatable
     */
    show() {
        $(this.selector).show();
    }

    /**
     * By default, datatables will have no buttons assigned ..
     */
    initButtons() {

        return [];

    }

    /**
     * Bind datatable select events ..
     */
    bindEvents() {

        var self = this;

        this.dt.on('select', function (e, dt, type, indexes) {
            let selCount = dt.rows({selected:true}).count();
            $(self.selector).trigger('repaint', [selCount]);
        } );

        this.dt.on('deselect', function (e, dt, type, indexes) {
            let selCount = dt.rows({selected:true}).count();
            $(self.selector).trigger('repaint', [selCount]);
        } );

        this.dt.on('repaint', function(event, selCount) {
            self.dt.buttons(['.trashButton','.archiveButton','.recycleButton','.wipeButton']).enable(selCount > 0);
        })

    }

}

export default Datatable;