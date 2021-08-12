@extends('layout')


@section('content')
    <div class="main container p-2 my-2 border">
        <p class="h1">Change Name</p>
        <hr>
        <form class="form-inline m-1 w-25" method="POST" action="changeName">
            @csrf

            <div class="form-group m-1">
            <label for="newName">Enter New Name :</label>
            <input type="text" class="form-control" name="newName" id="newName" value="{{session('user')}}">
            @error('newName')
                    <p class="alert alert-danger mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="text-center mt-2">
                <button type="submit" class="btn btn-primary m-2">Save Changes</button>
            </div>
        </form>
    </div>
@endsection