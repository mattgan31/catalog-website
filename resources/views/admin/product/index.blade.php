@extends('layouts.app')
@section('title', 'Production')

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
                            <table>
                                @foreach ($products as $p)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('images') }}/{{ $p->image }}" alt="{{ $p->product_name }}"
                                                class="img-thumbnail">
                                        </td>
                                        <td>
                                            <p class="">{{ $p->product_name }}</p>
                                        </td>
                                    </tr>
                                @endforeach
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
