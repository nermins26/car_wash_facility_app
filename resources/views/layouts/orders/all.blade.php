<div class="card">
    <div class="card-body">
        <table id="stepsTable" class="table">
            <thead>
                <tr>
                    <th scope="col">User</th>
                    <th scope="col">Program</th>
                    <th scope="col">Price</th>
                    <th scope="col">Order phase</th>
                    <th scope="col">Car</th>
                    <th scope="col">Actions</th>     
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->user->username}}</td>
                        <td>{{$order->program->name}}</td>
                        <td>{{$order->program->price}}$</td>
                        <td>{{$order->phase->name}}</td>
                        <td>
                            {{$order->car->brend}},
                            {{$order->car->model}},
                            {{$order->car->color}},
                            {{$order->car->year}}
                        </td>
                        <td>
                            <button class="btn btn-sm btn-primary m-1">Edit</button>
                            <button class="btn btn-sm btn-danger m-1">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
</div>
