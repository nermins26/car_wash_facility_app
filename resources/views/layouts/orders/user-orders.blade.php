
<div class="card">
    <div class="card-body">
        <table id="stepsTable" class="table">
            <thead>
                <tr>
                    <th scope="col">Order number</th>
                    <th scope="col">Program</th>
                    <th scope="col">Price</th>
                    <th scope="col">Order phase</th>
                    <th scope="col">Car</th>
                    <th scope="col">Actions</th>     
                </tr>
            </thead>
            <tbody>
                @if (!$orders)
                    <h4>No orders at this moment.</h4>
                @else
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            #{{$order->number}}
                        </td>
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
                            @if ($order->phase->name == "waiting to accept") 
                                <button
                                id="order_{{$order->id}}"
                                data-toggle="modal"
                                data-target="#deleteItemModal"
                                class="delete_item_btn btn btn-sm btn-danger m-1">Cancel order</button>
                            @elseif($order->phase->name == "order accepted")
                                Order accepted. Call our Service to cancel the order as soon as possible
                            @else
                                <p class="bg-warning p-2">
                                    Order in progress. Can not cancel the order now. Call our Service for more info.
                                </p>
                            @endif
                            
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
</div>
