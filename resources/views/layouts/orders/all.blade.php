<div class="card">
    <div class="card-body">
        @isset($cars)
        <table id="stepsTable" class="table">
            <thead>
                <tr>
                    <th scope="col">Order number</th>
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
                        <td>
                            #{{$order->number}}
                        </td>
                        <td>{{$order->user->profile->first_name . " " . $order->user->profile->last_name}}</td>
                        <td>{{$order->program->name}}</td>
                        <td>{{$order->price}}$</td>
                        <td>
                            <form id="order_status_change_form_{{$order->id}}" action="{{ route('orders.edit', ['id' => $order->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select class="status_option form-control" name="order_phase_id" 
                                id="select_{{$order->id}}" required>
                                    @foreach ($orderPhases as $phase)
                                        <option class="status_option" value="{{$phase->id}}"
                                        @if ($order->phase->id == $phase->id)
                                            selected
                                        @endif>    
                                        {{$phase->name}}</option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td>
                            {{$order->car->brend}},
                            {{$order->car->model}},
                            {{$order->car->color}},
                            {{$order->car->year}}
                        </td>
                        <td>
                            <button
                            id="order_{{$order->id}}"
                            data-toggle="modal"
                            data-target="#deleteItemModal"
                            class="delete_item_btn btn btn-sm btn-danger m-1">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
        @else
            You don't have any orders yet.
        @endisset
    </div>
</div>
