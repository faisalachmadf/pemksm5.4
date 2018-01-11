var table = '';

$(function() {
    //Flat red color scheme for iCheck
    $('input[type="checkbox"], input[type="radio"]').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass   : 'iradio_flat-blue'
    });

    //Date picker
    $('.datepicker').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
    });

    $(document).on('click', '.thumbnail', function() {
        var src = $(this).data('src');
        var title = $(this).data('title');

        $('#modal-global .modal-title').text(title);
        $('#modal-global .modal-body').html('<img src="'+src+'" class="img-responsive" alt="'+title+'" style="margin:auto;">');
        $('#modal-global').modal('show');
    });

    //Initialize Select2 Elements
    $(".select2").select2({
        tags: true,
        placeholder: 'Masukan Tag',
        tokenSeparators: [',', ' ']
    });

    //Date range picker
    $('.daterange').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        }
    });

    $('button[type="submit"]').on('click', function(e) {
        return confirm('Apakah data ini benar?');
    });
});

function dataTablesResponsive() {
    $('.dataTables_filter').addClass('pull-right');
}

function createDatatables(selector, url, columns, order) {
    if (order == undefined) {
        order = 'asc';
    }

    table = $(selector).DataTable({
        processing: true,
        serverSide: true,
        pagingType: 'full_numbers',
        ajax: url,
        order: [1, order],
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
