@extends('layout')

@php
 $total_price = 0;   
@endphp

@section('content')
    <div class="main">             
        <div class="container h1">Shopping Cart</div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="products col-10">
                    @if ($items->count() == 0)
                         <div class="alert alert-info">
                            Your Cart is empty
                        </div> 
                    @endif
        
                    @foreach ($items as $item)
                        <div class="row m-2" style="cursor: pointer;">
                            <div class="col-3 p-3" onclick="window.open('/Product/{{$item->getProducts->id}}/{{$item->getProducts->name}}');">
                                <img src="{{ url('/images/ProductImages/'.$item->getProducts->image) }}" alt="">
                            </div>
                            <div class="col p-3">
                                <div>
                                    <span class="h6 text-primary" onclick="window.open('/Product/{{$item->getProducts->id}}/{{$item->getProducts->name}}');"> {{ $item->getProducts->name; }} </span>
        
                                    @php
                                        $product_price = $item->getProducts->price -($item->getProducts->price * $item->getProducts->discount / 100);
                                        $total_price = $total_price + $product_price;
                                    @endphp
                                    
                                    <h4>&#8377; {{ round($product_price) }}</h4>
                                    <div class="row w-50 text-center">
                                        <div class="col border-end">Quantity :
                                        
                                            <div class="input-group">
                                                <a class="input-group-text" href="/increaseCartQuantity/{{$item->id}}">+</a>
                                                <input type="text" class="form-control text-center bg-light" value="{{$item->quantity}}" disabled>
                                                <a class="input-group-text" href="/decreaseCartQuantity/{{$item->id}}">-</a>
                                              </div>
                                            
                                        </div>
                                        <div class="col">
                                            <a href="removeCartProduct/{{$item->id}}" class="text-secondary">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
                            
                <div class="col-2 border-start text-center">
                    <h3>Subtotal :</h3> &#8377; {{ $total_price }}
                    <div class="text-center p-2">
                        <button href="" class="btn bg-warning rounded-pill p-3">Proceed to Buy</button>
                    </div>
                </div>

            </div>
        </div>      
    </div>
@endsection

<style>
    .main img{
        height: 100px;
    }
</style>