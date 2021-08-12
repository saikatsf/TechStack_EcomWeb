<link rel="stylesheet" href="{{ URL::asset('css/allProductPage.css') }}">

@extends('layout')

@section('content')
    <div class="main">             
        <img class="w-100" src="{{ url('/images/bannerImages/'.$banner) }}"  alt="">
        
        <div class="products container">
            @foreach ($products as $product)
                <div class="row m-2" style="cursor: pointer;">
                    <div class="col-3 p-3" onclick="window.open('/Product/{{$product->id}}/{{$product->name}}');">
                        <img src="{{ url('/images/ProductImages/'.$product->image) }}" alt="">
                    </div>
                    <div class="col p-3">
                        <div onclick="window.open('/Product/{{$product->id}}/{{$product->name}}');">
                            <h3>{{ $product->name; }}</h3>
                            <div class="productDesc my-2">
                                {{ $product->product_descShort; }}
                            </div>

                            @php
                                $product_price = $product->price -($product->price * $product->discount / 100);
                            @endphp
                            <br>
                            <h4>&#8377; {{ round($product_price) }}</h4>
                            <span class="text-secondary mrp">&#8377; {{ $product->price }}</span>
                            <span class="text-info">{{ $product->discount }}% off</span>
                        </div>
                        <div class="float-end">
                            <a class="btn btn-warning" href="/addtocart/{{$product->id}}" role="button">Add To Cart</a>
                            <a class="btn btn-primary" href="#" role="button">Buy Now</a>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
</div>
@endsection