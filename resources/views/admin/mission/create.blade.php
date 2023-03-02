@extends('layouts.app')
@section('title', 'Mission')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('Add the Mission') }}</div>

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
                    <form action="/admin/mission" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Mission's Title</label>
                            <input type="text" class="form-control" placeholder="Enter the Title of Mission" name="mission_title">
                        </div>
                        <div class="form-group">
                            <label>Mission's Description</label>
                            <textarea type="file" class="form-control" placeholder="Describe the Mission" name="mission_description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="/admin/mission" class="btn btn-primary">Back to Mission</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection