@extends('admin.layout')

@section('content')
    <div class="container p-2">
        <div>
            <p class="text-center h1">Manage Admins</p>
            <div>
                <a href="/tsadmin/registerAdmin" class="btn btn-warning float-end">Register New Admin</a>
            </div>
        </div>
        <table class="table table-striped text-center bg-light m-2">
            <thead>
                <tr>
                    <td>Full Name</td>
                    <td>Email</td>
                    <td>Username</td>
                    <td>Edit</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->full_name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->username }}</td>
                    <td><a href="" class="btn btn-warning">Edit</a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

<style>
    .table thead{
        font-weight: bold;
        font-size: 20px; 
    }
</style>