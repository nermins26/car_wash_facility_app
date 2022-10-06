@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row mt-5 mx-3">
        <div class="col-12 col-sm-3 bg-white p-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @if (auth()->user()->role->name == "administrator")
                    <a class="nav-link {{auth()->user()->role->name == 'administrator' ? 'active' : ''}}" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="true">Users</a>
                    <a class="nav-link" id="v-pills-washing-programs-tab" data-toggle="pill" href="#v-pills-washing-programs" role="tab" aria-controls="v-pills-washing-programs" aria-selected="true">Washing Programs</a>
                    <a class="nav-link" id="v-pills-washing-steps-tab" data-toggle="pill" href="#v-pills-washing-steps" role="tab" aria-controls="v-pills-washing-steps" aria-selected="false">Washing Steps</a>
                @endif
                @if (auth()->user()->role->name == "administrator" || auth()->user()->role->name == "worker")
                    <a class="nav-link {{auth()->user()->role->name == 'worker' ? 'active' : ''}}" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab" aria-controls="v-pills-orders" aria-selected="true">Orders</a>
                @endif
                @if (auth()->user()->role->name == "client")
                    <a class="nav-link {{auth()->user()->role->name == 'client' ? 'active' : ''}}" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
                    <a class="nav-link" id="v-pills-cars-tab" data-toggle="pill" href="#v-pills-cars" role="tab" aria-controls="v-pills-cars" aria-selected="false">Cars</a>
                    <a class="nav-link" id="v-pills-my-orders-tab" data-toggle="pill" href="#v-pills-my-orders" role="tab" aria-controls="v-pills-my-orders" aria-selected="false">My Orders</a>
                @endif
            </div>
        </div>

        @yield('dashboard-content')
            
    </div>
</div>
  
@endsection