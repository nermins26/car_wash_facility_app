
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto my-5">
            <div class="card p-4">
                <div class="card-header">
                    <h3>Preview you Order</h3>
                </div>
                <div class="card-body">
                    <h4>Order info</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Customer</td>
                                <td>{{auth()->user()->profile->first_name . " " . auth()->user()->profile->last_name}}</td>
                            </tr>
                            <tr>
                                <td>Car</td>
                                <td>{{$car->brend . " " . $car->model}}</td>
                            </tr>
                            <tr>
                                <td>Program</td>
                                <td>{{$program->name}}</td>
                            </tr>
                            <tr>
                                <td>Total Order nbr. </td>
                                <td>
                                    @if(auth()->user()->orderCount)
                                    {{auth()->user()->orderCount->count}}
                                    @else
                                        0
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Price </td>
                                <td>
                                    @if(auth()->user()->orderCount->count % 10 == 9)
                                        <del>{{$program->price}}$</del><br>
                                        {{round($program->price - (($program->price / 100)*20), 2)}}$<br>
                                        20% discount on every tenth order
                                    @elseif(auth()->user()->orderCount->count % 5 == 4)
                                        <del>{{$program->price}}$</del><br>
                                        {{round($program->price - (($program->price / 100)*10), 2)}}$<br>
                                        10% discount on every fifth order
                                    @elseif (auth()->user()->orderCount->count == 0)
                                        <del>{{$program->price}}$</del><br>
                                        {{round($program->price - (($program->price / 100)*5), 2)}}$<br>
                                        5% discount on first order
                                    @else
                                        {{$program->price}}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @include('layouts.partials.errors')
                </div>
                <div class="card-footer">
                    <button onclick="submitForm('newOrderForm')" class="submitOrderBtn btn btn-primary btn-md">Pay and submit order</button>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="newOrderForm" action="{{route('orders.create')}}" method="POST" hidden>
    @csrf
    <input type="number" name="program" value="{{$program->id}}">
    <input type="number" name="car" value="{{$car->id}}">
</form>

@endsection