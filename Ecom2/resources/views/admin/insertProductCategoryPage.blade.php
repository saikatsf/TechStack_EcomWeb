@extends('admin.layout')


@section('content')
    <div class="container w-50 p-2">
        <div class="text-center h1">Insert Category</div>
        <hr class="mb-5">
        <form action="categoryinsert" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="categoryName" class="form-label">Category Name :</label>
                <input type="text" class="form-control" id="categoryName" name="categoryName" required>
            </div>

            <div class="mb-3">
                <label for="bannerImage" class="form-label">Banner Image :</label>
                <input type="file" class="form-control" id="bannerImage" name="bannerImage" required>
            </div>

            <div class="text-center">
                <button class="btn btn-primary" type="submit">Add Category</button>
            </div>

        </form>
    </div>
@endsection
