<!-- Contains all forms for Users CRUD. It displays specific form based on keyword -->

@isset($edit)
    <form method="POST">
        @csrf
        @method('PUT')

        <input type="number" id="user_id_field" hidden>

        <div class="form-group">
            <label for="edit_username_field">Username</label>
            <input type="text" class="form-control" id="edit_username_field"
            name="username">
        </div>
        <div class="form-group">
            <label for="edit_email_field">Email address</label>
            <input type="email" class="form-control" id="edit_email_field"
            name="email">
        </div>
        <div class="form-group">
            <div>
                <label>Role</label>
            </div>
            <ul class="px-0">
                @foreach ($roles as $role)
                    <li>
                        <input class="edit_radio_field" type="radio" id="edit_{{$role->name}}_field"
                        name="role"
                        value="{{$role->name}}">
                        <label for="edit_{{$role->name}}_field">{{$role->name}}</label>
                    </li>
                @endforeach
            </ul>
        </div>
        <button type="submit" class="update_user btn btn-primary">Update</button>
    </form>
@endisset

@isset($create)
    <form method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="create_username_field">Username</label>
            <input type="text" class="form-control" id="create_username_field"
            name="username">
        </div>
        <div class="form-group">
            <label for="create_email_field">Email address</label>
            <input type="email" class="form-control" id="create_email_field"
            name="email">
        </div>
        <div class="form-group">
            <label for="create_password_field">Password</label>
            <input type="password" class="form-control" id="create_password_field"
            name="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation_field">Password</label>
            <input type="password" class="form-control" id="password_confirmation_field" name="password_confirmation">
        </div>
        <div class="form-group">
            <div>
                <label>Role</label>
            </div>
            <ul class="px-0">
                @foreach ($roles as $role)
                    <li>
                        <input class="create_radio_field" type="radio" id="create_{{$role->name}}_field"
                        name="role"
                        value="{{$role->name}}"
                        >
                        <label for="create_{{$role->name}}_field">{{$role->name}}</label>
                    </li>
                @endforeach
            </ul>
        </div>
        <button type="submit" class="btn btn-primary add_user">Create</button>
    </form>
@endisset



@isset($delete)
    <form method="POST">
        @csrf
        @method('DELETE')

        <input type="number" id="delete_user_id" hidden>
          
        <button type="submit" class="delete_user_btn btn btn-danger mt-3">Delete</button>
    </form>
@endisset



@isset($updatePassword)
    <form method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="update_password_id">
        <div class="form-group">
            <label for="current_password_field">Current Password</label>
            <input type="password" class="form-control" id="current_password_field"
            name="current_password">
        </div>
        <div class="form-group">
            <label for="change_password_field">Password</label>
            <input type="password" class="form-control" id="change_password_field"
            name="password">
        </div>
        <div class="form-group">
            <label for="change_password_confirmation_field">Password confirmation</label>
            <input type="password" class="form-control" id="change_password_confirmation_field" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary change_user_password_btn">Update</button>
    </form>
@endisset

   