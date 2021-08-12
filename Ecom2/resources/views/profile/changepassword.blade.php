@extends('layout')


@section('content')
    <div class="main container p-2 my-2 border">
        <p class="h1">Change Password</p>
        <hr>
        <form class="form-inline m-1 w-25" method="POST" action="changePassword">
            @csrf

            <div class="form-group m-1">
            <label for="oldPass">Old Password :</label>
            <input type="password" class="form-control" name="oldPass" id="oldPass">
            @error('oldPass')
                    <p class="alert alert-danger mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="form-group m-1">
                <label for="newPass">New Password :</label>
                <input type="password" class="form-control" name="newPass" id="newPass">
                @error('newPass')
                    <p class="alert alert-danger mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group m-1">
                <label for="confirmNewPass">Re - Enter New Password :</label>
                <input type="password" class="form-control" name="confirmNewPass" id="confirmNewPass">
                @error('confirmNewPass')
                    <p class="alert alert-danger mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="text-center mt-2">
                <button type="submit" class="btn btn-primary m-2">Save Changes</button>
            </div>
        </form>
    </div>
@endsection