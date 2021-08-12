@extends('admin.layout')

@section('content')
    <div class="container">
        <p class="text-center p-2 h1">Dashboard</p>

    </div>
@endsection

    {{-- <div class="row p-2 text-center">
        <a class="col" href="">
            Manage Admins
        </a>
        <a class="col" href="registerAdmin">
            Register New Admin
        </a>
    </div> --}}




<style>
    .col{
        border-radius: 10px; 
        cursor: pointer;
        text-decoration: none;
        color: white;
        background: black;
        margin: 50px 150px;
        padding: 50px 0;
        
    }
    .col:hover{
        color: white;
    }
</style>