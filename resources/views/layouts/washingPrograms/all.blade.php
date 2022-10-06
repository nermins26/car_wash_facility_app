<div class="card">
    <div class="card-body">
        @isset($programs)
        <table id="programsTable" class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Descritpion</th>
                    <th scope="col">Includes</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programs as $program)
                    <tr>
                        <td>{{$program->name}}</td>
                        <td>{{$program->description}}</td>
                        <td>
                            <ul class="px-0">
                                @foreach ($program->washingSteps as $step)
                                    <li>- {{$step->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{$program->price}}</td>
                        <td>
                            <a href="{{route('programs.show.edit', ['id' => $program->id])}}" class="btn btn-sm btn-primary m-1">Edit</a>
                            <button
                            id="program_{{$program->id}}"
                            data-toggle="modal"
                            data-target="#deleteItemModal"
                            class="delete_item_btn btn btn-sm btn-danger m-1">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$programs->links()}}
        @else
            You don't have any Washing Programs yet.
        @endisset
    </div>
</div>


