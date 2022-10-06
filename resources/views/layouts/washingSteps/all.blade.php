<div class="card">
    <div class="card-body">
        @isset($steps)
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
                            <a href="{{route('steps.edit', ['id' => $step->id])}}" class="btn btn-sm btn-primary m-1">Edit</a>
                            <button
                            id="step_{{$step->id}}"
                            data-toggle="modal"
                            data-target="#deleteItemModal"
                            class="delete_item_btn btn btn-sm btn-danger m-1">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $steps->links() }}
        @else
            You don't have any Washing Steps (Services) yet.
        @endisset
    </div>
</div>

