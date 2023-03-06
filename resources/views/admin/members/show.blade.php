@extends('layouts.app')
@section('title', 'Member')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('Detail Member') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('images') }}/{{ $member->image }}" alt="" class="img-fluid">
                        </div>
                        <div class="col">
                            <p><b>Member Name:</b> {{ $member->member_name }}</p>
                            <p><b>Motto:</b> {{ $member->motto }}</p>
                            <p><b>Role:</b> {{ $member->role }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/admin/members" class="btn btn-primary">Back to Members</a>
                    <a href="/admin/members/{{$member->id}}/edit" class="btn btn-success">Edit</a>
                    <form action="/admin/members/{{$member->id}}" method="post" class="d-inline">
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