<div class="card">
    <div class="card-body">
        <table id="programsTable" class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Descritpion</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programs as $program)
                    <tr>
                        <td>{{$program->name}}</td>
                        <td>{{$program->description}}</td>
                        <td>{{$program->price}}</td>
                        <td>
                            <button class="btn btn-sm btn-primary m-1">Edit</button>
                            <button class="btn btn-sm btn-danger m-1">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$programs->links()}}
    </div>
</div>

