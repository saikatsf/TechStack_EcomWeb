@extends('admin.layout')

@section('content')
    <div class="container w-50 p-2">
        <div class="text-center h1">Insert Products</div>
        <hr class="mb-5">
        <form action="productinsert" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="categorySelect" class="form-label">Select Category :</label>
                <select class="form-select" aria-label="categorySelect" name="productCategory"  required>
                    <option selected disabled>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="mb-3">
                <label for="productName" class="form-label">Product Name :</label>
                <input type="text" class="form-control" id="productName" name="productName" required>
            </div>

            <div class="mb-3">
                <label for="productBrand" class="form-label">Product Brand :</label>
                <input type="text" class="form-control" id="productBrand" name="productBrand" required>
            </div>

            <div class="mb-3">
                <label for="productImage" class="form-label">Product Image :</label>
                <input type="file" class="form-control" id="productImage" name="productImage" required>
            </div>

            <div class="mb-3">
                <label for="productPrice" class="form-label">Product MRP :</label>
                <div class="input-group">
                    <span class="input-group-text"> &#8377; </span>
                    <input type="text" class="form-control" id="productPrice" name="productPrice" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="productDiscount" class="form-label">Product Discount :</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="productDiscount" name="productDiscount" required>
                    <span class="input-group-text"> % </span>
                </div>
            </div>

            <div class="mb-3">
                <label for="productShortDesc" class="form-label">Short Description :</label>
                <textarea rows="2" class="form-control" id="productShortDesc" name="productShortDesc" required></textarea>
            </div>

            <div class="mb-3">
                <label for="productMainDesc" class="form-label">Main Desription :</label>
                <textarea rows="3" class="form-control" id="productMainDesc" name="productMainDesc" required></textarea>
            </div>

            <div class="text-center">
                <button class="btn btn-primary" type="submit">Insert</button>
            </div>

        </form>
    </div>
@endsection