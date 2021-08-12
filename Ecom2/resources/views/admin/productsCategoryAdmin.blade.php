@extends('admin.layout')

@section('content')
    <div class="container p-2">
        <div>
            <p class="text-center h1">Manage Categories</p>
            <div>
                <a href="/tsadmin/insertProductCategory" class="btn btn-warning float-end"> Add New Category</a>
            </div>
        </div>
        <table class="table table-striped text-center bg-light m-2">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Total Products</td>
                    <td>Banner</td>
                    <td>Edit</td>
                </tr>
            </thead>
            <tbody class="categories">
                @foreach ($categories as $item)
                <tr> 
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td><img src="{{ url('/images/bannerImages/'.$item->banner) }}" alt=""></td>
                    <td><a href="" class="btn btn-warning">Edit</a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection


<style>
    .table img{
        height: 50px;
    }
</style>

