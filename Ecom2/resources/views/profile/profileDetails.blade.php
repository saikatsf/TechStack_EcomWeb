@extends('layout')


@section('content')
    <div class="main container py-2">
        <p class="h1 text-center">Profile Details</p>
        <hr>
        <div class="detailContainer border p-2 ">
            <div class="row p-3">
                <div class="col-10">
                    <p class="h5"> Name :</p>
                    {{$user->name}}
                </div>
                <div class="col-2 float-end">
                    <a href="changeNamePage" class="btn btn-warning ms-5">Edit</a>
                </div>
            </div>
            <hr>
            <div class="row p-3">
                <div class="col-10">
                    <p class="h5"> Email :</p> 
                    {{$user->email}}
                </div>
                @if ($user->provider_id == NULL)
                    <div class="col-2 float-end">
                        <a href="" class="btn btn-warning ms-5">Edit</a>
                    </div>
                @endif
            </div>
            @if ($user->provider_id == NULL)
                <hr>
                <div class="p-3">
                    <p class="h5"> Password :</p>
                    <a href="changePasswordPage" class="btn btn-info">Change Password</a>
                </div>            
            @endif

        </div>
    </div>
@endsection
