@extends('layout')


@section('content')
    <div class="main container py-2">
        <div class="row text-center">
            <div class="col opts" onclick="window.location.href='/profileLoginDetails'">Login & Security</div>
            <div class="col opts">Your Orders</div>
        </div>
        <div class="row text-center">
            <div class="col opts">Your Addresses</div>
            <div class="col opts">Payment Methods</div>
        </div>
    </div>
@endsection


<style>
    .opts{
        border: 4px solid #F05538;
        border-radius: 10px; 
        padding: 30px 0;
        margin: 10px 100px;

        color: #F05538;
        font-size: 20px;

        cursor: pointer;
    }
</style>