<link rel="stylesheet" href="{{ URL::asset('css/homepage.css') }}">

@extends('layout')

@section('content')

    <div class="main">
                
        <img class="w-100" src="{{ url('/images/adv1.jpg') }}"  alt="">
        <div class="container mx-auto my-5 p-2 border">
            <div class="categoryHeading">
                <span class="categoryName">
                    Mobiles
                </span>
                <a href="products/1" class="text-secondary">Show More&#x3e;&#x3e;</a>
            </div>
            <hr>

            <div class="products row">
                @foreach ($category1Products as $category1Product)
                    <div class="col border m-3">
                        <div onclick="window.open('/Product/{{$category1Product->id}}/{{$category1Product->name}}');" style="cursor:pointer">
                            <div class="productImg d-flex">
                                <img class="mx-auto mt-auto" src="{{ url('/images/ProductImages/'.$category1Product->image) }}"  alt="">
                            </div>
                            <span class="productName">{{ $category1Product->name }}</span>
                            <br>
                            <span class="mrp text-secondary">&#8377; {{ $category1Product->price }}</span>
                            <span class="text-info" style="font-size: 12px">{{ $category1Product->discount }}% off</span>
                            <br>
                            @php
                                $product_price = $category1Product->price -($category1Product->price * $category1Product->discount / 100);
                            @endphp
                            <span class="actualPrice text-success">&#8377; {{ round($product_price) }}</span>
                        </div>
                        <div>
                            <a href="/addtocart/{{$category1Product->id}}" class="btn btn-warning text-center m-1 w-100">Add To Cart</a>
                            <a href="" class="btn btn-primary text-center m-1 w-100">Buy Now</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection