@extends('layout')


@section('content')
    <div class="main container py-2">
        <p class="h1">Forgot Password</p>
        <hr>
        <form class="form-inline m-1 w-25" method="POST" action="forgotPassword">
            @csrf

            <div class="form-group m-1">
            <label for="forgotPemail">Enter Your Email :</label>
            <input type="text" class="form-control" name="forgotPemail" id="forgotPemail">
            @error('forgotPemail')
                    <p class="alert alert-danger mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-primary m-2">Go</button>
            </div>
        </form>
    </div>
@endsection