@extends('layouts.app')
@section('title', 'Production')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">{{ __('Add the Product') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/admin/product" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Product's Name</label>
                                <input type="text" class="form-control" placeholder="Enter the Name of Product"
                                    name="product_name">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group">
                                <label>Description of Product</label>
                                <textarea type="file" class="form-control" placeholder="Describe the Product" name="description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="/admin/product" class="btn btn-primary">Back to Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
