@extends('admin.layout')

@section('content')
    <div class="container-fluid w-50 registerDiv">
        <div class="text-center h1">Register New Admin</div>
        <hr class="mb-5">
        <form class="form-inline" method="POST" action="adminRegistration">
            @csrf

            <div class="form-group m-1">
                <label for="aFullname">Full Name :</label>
                <input type="text" class="form-control" name="aFullName" id="aFullname">
                @error('aFullName')
                    <p class="alert alert-danger mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group m-1">
                <label for="aUsername">Username :</label>
                <input type="text" class="form-control" name="aUsername" id="aUsername">
                @error('aUsername')
                    <p class="alert alert-danger mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group m-1">
                <label for="aEmail">Email :</label>
                <input type="text" class="form-control" name="aEmail" id="aEmail">
                @error('aEmail')
                    <p class="alert alert-danger mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group m-1">
                <label for="aPwd">Password :</label>
                <input type="password" class="form-control" name="aPwd" id="aPwd">
                @error('aPwd')
                    <p class="alert alert-danger mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-primary m-2">Add Admin</button>
            </div>
        </form>
    </div>
@endsection

    