@extends('layouts.app')
@section('title', 'Mission')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            {{-- <div id="app">
                    @include('')
                </div> --}}
            <div class="card">
                <div class="card-header">{{ __('Mission') }}</div>

                <div class="card-body">
                    @if ($mission)
                    <h3>{{$mission->mission_title}}</h3>
                    <p>{{$mission->mission_description}}</p>
                    <div class="card-foot">
                        <a href="mission/edit">Edit Mission</a>
                    </div>
                    @else
                    <p class="text text-danger">Mission is not Available</p>
                    <a href="/admin/mission/create" class="btn btn-primary">Create an Mission</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection