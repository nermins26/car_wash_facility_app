<div class="card">
    <div class="card-body">
        <table id="usersTable" class="table">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Number of orders</th>
                    <th scope="col">Actions</th>     
                   
                </tr>
            </thead>
            <tbody>
                {{-- populated with AJAX --}}

                {{-- @foreach ($users as $user)
                    <tr>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>#</td>
                        <td>
                            <button class="edit_user btn btn-sm btn-primary m-1" data-toggle="modal" data-target="#editUserModal">Edit</button>

                            <button type="button" class="change_user_password btn btn-sm btn-warning m-1" data-toggle="modal">Change Password</button>
    
                            <button type="button" class="delete_user btn btn-sm btn-danger m-1" data-toggle="modal">Delete</button>
                        </td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
        <div id="usersLinks"></div>
    </div>
</div>

<!-- MODAL SECTION -->

@include('layouts.users.create')
@include('layouts.users.edit')
@include('layouts.users.delete')
@include('layouts.users.change-password')

<!-- END MODAL SECTION -->
