var table = '';

function dataTablesIndex() {
    table.on('order.dt search.dt', function() {
        var pageIndex = table.page() * table.page.len();
        table.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = pageIndex + i + 1;
        });
    }).draw();
}

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
            dataTablesIndex();
            dataTablesResponsive();
            laravel.initialize();
        }
    });

    $('.dataTables_length select').on('change', function() {
        dataTablesIndex();
    });

    $('.dataTables_filter input').on('keyup',function(){
        dataTablesIndex();
    });
}

function reloadDatatables() {
    table.draw();
}
