$(document).ready(function(){
    $('.datatable').DataTable();

    $('.selectpicker').selectpicker({
        style: 'btn-default',
        noneSelectedText: 'Aucun élément sélectionné',
        // size: 4
        liveSearch: true
    });

    setTimeout(function(){
        $('.alert').fadeOut();
    }, 3000);
});