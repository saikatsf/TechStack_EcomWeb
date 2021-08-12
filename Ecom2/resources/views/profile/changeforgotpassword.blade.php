@extends('layout')


@section('content')
    <div class="main container p-2 my-2 border">
        <p class="h1">Change Password</p>
        <hr>
        <form class="form-inline m-1 w-25" method="POST" action="changeForgotPass">
            @csrf
            <input type="text" class="form-control" name="forgotPemail" value="{{session('forgotPassEmail')}}" hidden>
            <div class="form-group m-1">
            <label for="forgotPasswordNew">Enter New Password :</label>
            <input type="text" class="form-control" name="forgotPasswordNew" id="forgotPasswordNew">
            @error('forgotPasswordNew')
                    <p class="alert alert-danger mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="text-center mt-2">
                <button type="submit" class="btn btn-primary m-2">Change Password</button>
            </div>
        </form>
    </div>
@endsection