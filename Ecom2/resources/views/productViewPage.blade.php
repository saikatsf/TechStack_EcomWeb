<link rel="stylesheet" href="{{ URL::asset('css/productViewPage.css') }}">

@extends('layout')

@section('content')

    <div class="main">
       <div class="row product container-fluid m-4">
           <div class="col-3 productImage">
                <img src="{{ url('/images/ProductImages/'.$item->image) }}" alt="">
           </div>
           <div class="col productDetails py-4 px-5">
                <h1>{{ $item->name }}</h1>
                By {{ $item->brand }}
                <hr>
                <span style="font-size: 20px">{{ $item->shortDesc }}</span>
                <hr>
                @php
                    $product_price = $item->price -($item->price * $item->discount / 100);
                    $discount_price = $item->price - $product_price; 
                @endphp

                M.R.P : <span class="text-secondary mrp">&#8377; {{ $item->price }}</span>
                <br>
                Offer Price : <span class="productPrice text-danger">&#8377;{{ $product_price }}</span>
                <br>
                You Save : <span class="productDiscount text-danger">&#8377;{{ $discount_price }} ( {{ $item->discount }}% off )</span>
                <br>
                <div class="p-2">
                    <a class="btn btn-warning" href="/addtocart/{{$item->id}}" role="button">Add To Cart</a>
                    <a class="btn btn-primary" href="#" role="button">Buy Now</a>
                </div> 
           </div>
       </div>
       <hr>
       <div class="productDesc container">
           <h1>Description</h1>
           {{ $item->mainDesc }}
       </div>
       <hr>
    </div>

@endsection