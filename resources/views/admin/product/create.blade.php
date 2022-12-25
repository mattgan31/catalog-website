@extends('layouts.app')
@section('title', 'Production')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">{{ __('Add the Product') }}</div>

                    <div class="card-body">
                        <form action="/admin/product">
                            <div class="form-group">
                                <label>Product's Name</label>
                                <input type="text" class="form-control" placeholder="Enter the Name of Product">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description of Product</label>
                                <textarea type="file" class="form-control" placeholder="Describe the Product"></textarea>
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
