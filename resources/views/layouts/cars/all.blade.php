<div class="card">
    <div class="card-body">
        @isset($cars)
        <table id="carsTable" class="table">
            <thead>
                <tr>
                    <th scope="col">Brend</th>
                    <th scope="col">Model</th>
                    <th scope="col">Color</th>
                    <th scope="col">Year</th>
                    <th scope="col">Actions</th>     
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{$car->brend}}</td>
                        <td>{{$car->model}}</td>
                        <td>{{$car->color}}</td>
                        <td>{{$car->year}}</td>
                        <td>
                            <a href="{{route('cars.edit', ['id'=>$car->id])}}" class="btn btn-sm btn-primary m-1">Edit</a>
                            <button id="car_{{$car->id}}"
                            data-toggle="modal"
                            data-target="#deleteItemModal"
                            class="delete_item_btn btn btn-sm btn-danger m-1">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $cars->links() }}
        @else
            You don't have any cars
        @endisset
    </div>
</div>
