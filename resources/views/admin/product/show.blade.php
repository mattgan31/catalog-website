@extends('layouts.app')
@section('title', 'Product')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('Detail Product') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('images/products') }}/{{ $product->image }}" alt="" class="img-fluid">
                        </div>
                        <div class="col">
                            <p><b>Product Name:</b> {{ $product->product_name }}</p>
                            <p><b>Description:</b> {{ $product->description }}</p>
                            <p><b>Created By:</b> {{ $product->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/admin/product" class="btn btn-primary">Back to Products</a>
                    <a href="/admin/product/{{$product->id}}/edit" class="btn btn-success">Edit</a>
                    <form action="/admin/product/{{$product->id}}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
