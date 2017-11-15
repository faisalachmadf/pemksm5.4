var table = '';

$(function() {
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    });
});

function dataTablesResponsive() {
    $('.dataTables_filter').addClass('pull-right');
}

function createDatatables(selector, url, columns) {
    table = $(selector).DataTable({
        processing: true,
        serverSide: true,
        pagingType: 'full_numbers',
        ajax: url,
        order: [1, 'asc'],
        columns: columns,
        initComplete: function() {
            dataTablesResponsive();
        }
    });

    table.on('draw', function() {
        laravel.initialize();
    });
}

function reloadDatatables() {
    table.draw();
}
