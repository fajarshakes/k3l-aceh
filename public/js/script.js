$('#user_view').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid')
    var unit = button.data('myunit') 
    var email = button.data('myemail') 
    var name = button.data('myname') 
    var group = button.data('mygroup') 
    var gname = button.data('mygname') 
    var create = button.data('create') 
    var expire = button.data('expire') 
    var modal = $(this)
    modal.find('.modal-body #u_id').val(id);
    modal.find('.modal-body #u_unit').val(unit);
    modal.find('.modal-body #u_email').val(email);
    modal.find('.modal-body #u_name').val(name);
    modal.find('.modal-body #u_group').val(group);
    modal.find('.modal-body #u_gname').val(gname);
    modal.find('.modal-body #u_create').val(create);
    modal.find('.modal-body #u_expire').val(expire);
})

$('#user_edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid')
    var unit = button.data('myunit') 
    var email = button.data('myemail') 
    var name = button.data('myname') 
    var modal = $(this)
    modal.find('.modal-body #u_id').val(id);
    modal.find('.modal-body #u_unit').val(unit);
    modal.find('.modal-body #u_email').val(email);
    modal.find('.modal-body #u_name').val(name);
})

$('#user_delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid')
    var unit = button.data('myunit') 
    var email = button.data('myemail') 
    var modal = $(this)
    modal.find('.modal-body #u_id').val(id);
    modal.find('.modal-body #u_unit').val(unit);
    modal.find('.modal-body #u_email').val(email);
})

$(document).ready(function(){

    // Format mata uang rupiah.
    $( '.rupiah' ).mask('000,000,000', {reverse: true});

})