@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="col-12 col-sm-9">
        <div class="tab-content" id="v-pills-tabContent">
            @if (session('response-message'))
                <div class="alert alert-success p-3 mb-2">
                    <p>{{ session('response-message') }}</p>
                </div>
            @endif
            @if (session('user-info-missing'))
                <div class="alert alert-danger p-3 mb-2">
                    <p>{{ session('user-info-missing') }}</p>
                </div>
            @endif
            <div id="success_message"></div>
            <div class="tab-pane fade show {{auth()->user()->role->name == 'administrator' ? 'active' : ''}}" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab">
                <div class="mb-2">
                    <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#createUserModal">Create User</button>
                </div>
                @include('layouts.users.all')
            </div>
            <div class="tab-pane fade" id="v-pills-washing-programs" role="tabpanel" aria-labelledby="v-pills-washing-programs-tab">
                <a href="{{route('programs.show.create')}}" class="btn btn-md btn-primary mb-2">Add Program</a>
                @include('layouts.washingPrograms.all')
            </div>
            <div class="tab-pane fade" id="v-pills-washing-steps" role="tabpanel" aria-labelledby="v-pills-washing-steps-tab">
                <a href="{{route('steps.show.create')}}" class="btn btn-md btn-primary mb-2">Add Step</a>
                @include('layouts.washingSteps.all')
            </div>
            <div class="tab-pane fade show {{auth()->user()->role->name == 'worker' ? 'active' : ''}}" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                @include('layouts.orders.all')
            </div>
            <div class="tab-pane fade show {{auth()->user()->role->name == 'client' ? 'active' : ''}}" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                @include('layouts.profiles.my-profile')
            </div>
            <div class="tab-pane fade" id="v-pills-cars" role="tabpanel" aria-labelledby="v-pills-cars-tab">
                <a href="{{route('cars.show.create')}}" class="btn btn-md btn-primary mb-2">Add Car</a>
                @include('layouts.cars.all')
            </div>
            <div class="tab-pane fade" id="v-pills-my-orders" role="tabpanel" aria-labelledby="v-pills-my-orders-tab">
                @include('layouts.orders.user-orders')
            </div>
        </div>
    </div>
@endsection