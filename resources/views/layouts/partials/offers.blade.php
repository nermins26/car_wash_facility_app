<div class="container text-center py-5">
    <div class="row">
        @if (session('new-order-created'))
            <div class="col-12 alert alert-success p-3 mb-2">
                <p>{{ session('new-order-created') }}</p>
            </div>
        @endif
        @foreach ($washingPrograms as $program)
            <div class="col-12 col-md-6 col-lg-4 my-2">
                <div class="card">
                    <div class="card-header">
                        <h3>{{$program->name}}</h3>
                    </div>
                    <div class="card-body">
                        <p>{{$program->description}}</p>
                        <hr>
                        <h5>Program includes:</h5>
                        <ul class="px-0">
                            @foreach ($program->washingSteps as $step)
                                <li>- {{$step->name}}</li>
                            @endforeach
                        </ul>
                        <hr>
                        <h4>{{$program->price}}$</h4>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('orders.show.create', ['program' => $program->id])}}" class="btn btn-md btn-primary">Order</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>