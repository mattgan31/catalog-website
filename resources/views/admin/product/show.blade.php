@extends('layouts.app')
@section('title', 'Production')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('Detail Product') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('images') }}/{{ $product->image }}" alt="" class="img-fluid">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection