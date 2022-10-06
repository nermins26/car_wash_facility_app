<div class="card p-4">
    <div class="card-header">
        <h3>
            {{auth()->user()->profile ? 'My Profile' : 'Create a profile'}}
        </h3>
    </div>
    <div class="card-body">
        @include('layouts.profiles.my-profile-form')
        @include('layouts.partials.errors')
    </div>
    <div class="card-footer">
        <p>Want to update change your password?</p>
        <button value="{{auth()->user()->id}}" type="button" class="change_user_password btn btn-sm btn-warning m-1" data-toggle="modal"
        data-target="#updatePasswordUserModal">Change Password</button>
    </div>
</div>




