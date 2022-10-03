@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row mt-5 mx-3">
        <div class="col-12 col-sm-3 bg-white p-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @if (auth()->user()->role->name == "administrator")
                    <a class="nav-link {{auth()->user()->role->name == 'administrator' ? 'active' : ''}}" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="true">Users</a>
                    <a class="nav-link" id="v-pills-washing-programs-tab" data-toggle="pill" href="#v-pills-washing-programs" role="tab" aria-controls="v-pills-washing-programs" aria-selected="false">Washing Programs</a>
                    <a class="nav-link" id="v-pills-washing-phases-tab" data-toggle="pill" href="#v-pills-washing-phases" role="tab" aria-controls="v-pills-washing-phases" aria-selected="false">Washing Phases</a>
                @endif
                @if (auth()->user()->role->name == "administrator" || auth()->user()->role->name == "worker")
                    <a class="nav-link {{auth()->user()->role->name == 'worker' ? 'active' : ''}}" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab" aria-controls="v-pills-orders" aria-selected="false">Orders</a>
                @endif
                @if (auth()->user()->role->name == "client")
                    <a class="nav-link {{auth()->user()->role->name == 'client' ? 'active' : ''}}" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
                    <a class="nav-link" id="v-pills-cars-tab" data-toggle="pill" href="#v-pills-cars" role="tab" aria-controls="v-pills-cars" aria-selected="false">Cars</a>
                    <a class="nav-link" id="v-pills-my-orders-tab" data-toggle="pill" href="#v-pills-my-orders" role="tab" aria-controls="v-pills-my-orders" aria-selected="false">Orders</a>
                @endif
            </div>
        </div>
            
        <div class="col-12 col-sm-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show {{auth()->user()->role->name == 'administrator' ? 'active' : ''}}" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab">
                    <div class="mb-2">
                        <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#createUserModal">Create User</button>
                    </div>
                    <div id="success_message" class="mt-2"></div>
                    @include('layouts.users.all')
                </div>
                <div class="tab-pane fade" id="v-pills-washing-programs" role="tabpanel" aria-labelledby="v-pills-washing-programs-tab">
                    @include('layouts.washingPrograms.all')
                </div>
                <div class="tab-pane fade" id="v-pills-washing-phases" role="tabpanel" aria-labelledby="v-pills-washing-phases-tab">
                    @include('layouts.washingPhases.all')
                </div>
                <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                    @include('layouts.orders.all')
                </div>
            </div>
        </div>
    </div>
</div>
  
@endsection