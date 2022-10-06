@isset($edit)
<form action="{{ route('orders.edit', ['id' => $order->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="status">Order status</label>
        <select class="form-control" name="status" id="status" required>
            @foreach ($orderPhases as $phase)
                <option value="{{$phase->name}}">{{$phase->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endisset


@isset($create)
<form action="{{ route('orders.show.new')}}" method="GET">
    @csrf
    <div class="form-group">
        <label for="car">Select a car</label>
        <select class="form-control" name="car" id="car" required>
            @foreach ($cars as $car)
                <option value="{{$car->id}}">{{$car->brend . " " . $car->model}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="paymentMethod">Select a payment method</label>
        <select class="form-control" name="payment_method" id="paymentMethod" required>
            @foreach ($paymentMethods as $paymentMethod)
                <option value="{{$paymentMethod->id}}">{{$paymentMethod->name}}</option>
            @endforeach
        </select>
    </div>
    <input type="hidden" value="{{$program}}" name="program">
    <button type="submit" class="btn btn-primary">Next</button>
</form>
@endisset
