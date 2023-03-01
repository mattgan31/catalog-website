@extends('layouts.app')
@section('title', 'About')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            {{-- <div id="app">
                    @include('')
                </div> --}}
            <div class="card">
                <div class="card-header">{{ __('About') }}</div>

                <div class="card-body">
                    @if ($about)
                    <h3>{{$about->about_title}}</h3>
                    <p>{{$about->about_description}}</p>
                    <div class="card-foot">
                        <a href="about/edit">Edit About</a>
                    </div>
                    @else
                    <p class="text text-danger">About is not Available</p>
                    <a href="/admin/about/create" class="btn btn-primary">Create an About</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection