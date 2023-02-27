@extends('layouts.app')
@section('title', 'Product')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            {{-- <div id="app">
                    @include('')
                </div> --}}
            <div class="card">
                <div class="card-header">{{ __('Product') }}</div>

                <div class="card-body">
                    @if (count($products) > 0)
                    <table class="table ">
                        <thead>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $p)
                            <tr>
                                <td>
                                    <img src="{{ asset('images') }}/{{ $p->image }}" alt="{{ $p->product_name }}" class="img-thumbnail" style="width:200px">
                                </td>
                                <td>
                                    <p class="">{{ $p->product_name }}</p>
                                </td>
                                <td>
                                    <a href="/admin/product/{{ $p->id }}" class="btn btn-success">Show
                                        Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>The product is not available</p>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="/admin/product/create" class="btn btn-primary">Add New Product</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection