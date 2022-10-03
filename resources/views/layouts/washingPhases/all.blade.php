<div class="card">
    <div class="card-body">
        <table id="stepsTable" class="table">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">Actions</th>     
                </tr>
            </thead>
            <tbody>
                @foreach ($steps as $step)
                    <tr>
                        <td>{{$step->name}}</td>
                        <td>
                            <button class="btn btn-sm btn-primary m-1">Edit</button>
                            <button class="btn btn-sm btn-danger m-1">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $steps->links() }}
    </div>
</div>

