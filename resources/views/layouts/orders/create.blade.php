
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto my-5">
            <div class="card p-4">
                <div class="card-header">
                    <h3>Make an Order</h3>
                </div>
                <div class="card-body">
                    @include('layouts.orders.orders-form', ['create' => true])
                    @include('layouts.partials.errors')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection