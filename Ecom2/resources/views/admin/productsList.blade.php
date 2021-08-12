@extends('admin.layout')

@section('content')
    <div class="container p-2">
        <div>
            <p class="text-center h1">Manage Products</p>
            <div>
                <a href="/tsadmin/insertProductsPage" class="btn btn-warning float-end"> Add New Product</a>
            </div>
        </div>
        <table class="table table-striped text-center bg-light m-2">
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>MRP</td>
                    <td>Discount</td>
                    <td>Quantity</td>
                    <td>Edit</td>
                </tr>
            </thead>
            <tbody class="products">
                @foreach ($items as $item)
                <tr>
                    <td><img src="{{ url('/images/ProductImages/'.$item->image) }}" alt=""></td> 
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->discount }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td><a href="" class="btn btn-warning">Edit</a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

<style>
    .table img{
        height:50px;
    }
    .table thead{
        font-weight: bold;
        font-size: 20px; 
    }
</style>