@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto my-5">
            <div class="card p-4">
                <div class="card-header">
                    <h3>Add a Car</h3>
                    @if (session('user-info-missing'))
                        <div class="alert alert-danger p-3 mb-2">
                            <p>{{ session('user-info-missing') }}</p>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    @include('layouts.cars.cars-form', ['create' => true])
                    @include('layouts.partials.errors')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection