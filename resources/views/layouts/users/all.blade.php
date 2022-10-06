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
            </tbody>
        </table>
        <div id="usersLinks"></div>
    </div>
</div>

<!-- MODAL SECTION -->

@include('layouts.users.create')
@include('layouts.users.edit')
@include('layouts.users.delete')

<!-- END MODAL SECTION -->
