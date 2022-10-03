<div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nbr.</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                @auth
                <th scope="col">Permissions</th>
                <th scope="col">Actions</th>     
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        {{ ($counter+=1) + ((($paginator->currentPage()) - 1) * 10) }}
                    </td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->user_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>
                    @auth
                    @foreach ($user->role->permissions as $permission)
                    <span class="btn btn-sm btn-secondary m-1">{{ $permission->description }}</span>   
                    @endforeach
                    @endauth
                    </td>
                    <td>
                        @auth
                        <a class="btn btn-sm btn-primary m-1" href="{{ route('users.edit', ['user' => $user]) }}">Edit</a>

                        <a class="btn btn-sm btn-success m-1" href="{{ route('role.show.assign', ['user'=>$user]) }}">Assign</a>

                        <button type="button" class="btn btn-sm btn-danger m-1" data-toggle="modal" onclick="showModal('{{$user->id}}')">Delete</button>

                        <form id="deleteForm{{$user->id}}" action="{{ route('users.destroy', ['user'=>$user->id]) }}" method="POST" hidden>
                            @csrf
                            @method('delete')
                        </form>

                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>