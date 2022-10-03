require('./bootstrap');

window.submitForm = formId => {
    document.querySelector(`#${formId}`).submit();
}


//ajax form managing

$(document).ready(function() {

    fetchUsers(1);

    function fetchUsers(page=1) {
        $.ajax({
            type: "GET",
            url: `users/show/?page=${page}`,
            dataType: "json",
            success: function(response) {
                // console.log(response.users)
                $('#usersLinks').html("");
                $.each(response.users.links, function(key, link) {
                    $('#usersLinks').append(
                        `<a class="mx-3 userPagLinks" href="${link.url}" active="${link.active}">${link.label}</a>`
                    )
                })

                $('#usersTable tbody').html("");
                $.each(response.users.data, function(key, item){
                    $('#usersTable tbody').append(
                        `<tr>
                        <td>${item.username}</td>
                        <td>${item.email}</td>
                        <td>${item.role.name}</td>
                        <td>#</td>
                        <td>
                            <button value="${item.id}" class="edit_user btn btn-sm btn-primary m-1" data-toggle="modal" data-target="#editUserModal">Edit</button>

                            <button value="${item.id}" type="button" class="change_user_password btn btn-sm btn-warning m-1" data-toggle="modal"
                            data-target="#updatePasswordUserModal">Change Password</button>
    
                            <button value="${item.id}" type="button" class="delete_user btn btn-sm btn-danger m-1" data-toggle="modal"
                            data-target="#deleteUserModal">Delete</button>
                        </td>
                    </tr>`
                    )
                })
            }
        });
    }


    $(document).on('click', '.change_user_password', function(e) {
        
        e.preventDefault();
        var user_id = $(this).val();
        $('#update_password_id').val(user_id);

    })


    $(document).on('click', '.change_user_password_btn', function(e) {
        e.preventDefault();

        var user_id = $('#update_password_id').val();

        var data = {
            'current_password' : $('#current_password_field').val(), 
            'password' : $('#change_password_field').val(), 
            'password_confirmation' : $('#change_password_confirmation_field').val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "PUT",
            url: `users/password-update/${user_id}`,
            data: data,
            dataType: "json",
            success: function(response){
                if (response.status == 200) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#updatePasswordUserModal').modal('hide')
                    fetchUsers();
                } else {
                    $('#changePassFormErrList').html("");
                    $('#changePassFormErrList').addClass('alert alert-danger')
                    $.each(response.errors, function(key, err_values){
                        $('#changePassFormErrList').append(
                            `<li>${err_values}</li>`
                        )
                    })
                }
                
            }
        })

    })








    $(document).on('click', '.delete_user', function(e) {
        e.preventDefault();
        var user_id = $(this).val();
        $('#delete_user_id').val(user_id);
        // alert(user_id);
    })


    $(document).on('click', '.delete_user_btn', function(e) {
        e.preventDefault();

        var user_id = $('#delete_user_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "DELETE",
            url: `users/delete/${user_id}`,
            dataType: "json",
            success: function(response){
                if (response.status == 404) {
                    $('#success_message').html("");
                    $('#success_message').addClass('alert alert-danger');
                    $('#success_message').text(response.message);
                } else {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#deleteUserModal').modal('hide')
                    fetchUsers();
                }
                // console.log(response);
            }
        })

       
    })


    $(document).on('click', '.userPagLinks', function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#usersLinks').html("");
        fetchUsers(page);
    })


    $(document).on('click', '.edit_user', function(e) {
        e.preventDefault();
        var user_id = $(this).val();
        // console.log(user_id);

        $.ajax({
            type: "GET",
            url: `users/edit/${user_id}`,
            dataType: "json",
            success: function(response) {
                console.log(response)

                if(response.status == 404) {
                    $('#success_message').html("");
                    $('#success_message').addClass('alert alert-danger');
                    $('#success_message').text(response.message);
                } else {
                    $('#edit_username_field').val(response.user.username)
                    $('#edit_email_field').val(response.user.email)
                    $(`#edit_${response.user.role.name}_field`).prop('checked', true);
                    $('#user_id_field').val(user_id)
                }
            }
        })

    })


    $(document).on('click', '.update_user', function(e) {

        e.preventDefault();

        var user_id = $('#user_id_field').val();
        var data = {
            'username' : $('#edit_username_field').val(),
            'email' : $('#edit_email_field').val(), 
            'role' : $("input[class='edit_radio_field']:checked").val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "PUT",
            url: `users/edit/${user_id}`,
            data: data,
            dataType: "json",
            success: function(response) {
                if(response.status == 400) {
                    $('#editFormErrList').html("");
                    $('#editFormErrList').addClass('alert alert-danger')
                    $.each(response.errors, function(key, err_values){
                        $('#editFormErrList').append(
                            `<li>${err_values}</li>`
                        )
                    })
                } else if(response.status == 404) {
                    $('#editFormErrList').html("");
                    $('#success_message').addClass('alert alert-danger')
                    $('#success_message').text(response.message)
                } else {
                    $('#editFormErrList').html("");
                    $('#success_message').html("");
                    $('#success_message').addClass('alert alert-success')
                    $('#success_message').text(response.message)
                    $('#editUserModal').modal('hide');
                    $('#editUserModal').find('input').val("");
                    fetchUsers()
                }
            }
        })

    })


    $(document).on('click', '.add_user', function(e){

        e.preventDefault();

        var data = {
            'username' : $('#create_username_field').val(),
            'email' : $('#create_email_field').val(), 
            'password' : $('#create_password_field').val(), 
            'password_confirmation' : $('#password_confirmation_field').val(), 
            'role' : $("input[class='create_radio_field']:checked").val(),  
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "users/create",
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status == 400) {
                    $('#createFormErrList').html("");
                    $('#createFormErrList').addClass('alert alert-danger')
                    $.each(response.errors, function(key, err_values){
                        $('#createFormErrList').append(
                            `<li>${err_values}</li>`
                        )
                    })
                } else {
                    $('#createFormErrList').html("");
                    $('#success_message').addClass('alert alert-success')
                    $('#success_message').text(response.message)
                    $('#createUserModal').modal('hide');
                    $('#createUserModal').find('input').val("");
                    fetchUsers()
                }
            }
        })

        // console.log(data);

    });

});