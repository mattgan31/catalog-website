@extends('layouts.app')
@section('title', 'Member')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('Add the Member') }}</div>

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
                    <form action="/admin/members/{{$member->id}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Member's Name</label>
                            <input type="text" class="form-control" placeholder="Enter the Name of Member" name="member_name" value="{{$member->member_name}}">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" value="{{$member->image}}">
                            @if ($member->image)
                            <img src="{{ asset('images') }}/{{ $member->image }}" alt="" class="img-fluid">
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="CEO" @if ($member->role == 'CEO')
                                    selected
                                    @endif >CEO</option>
                                <option value="CTO" @if ($member->role == 'CTO')
                                    selected
                                    @endif >CTO</option>
                                <option value="Developer" @if ($member->role == 'Developer')
                                    selected
                                    @endif>Developer</option>
                            </select>
                        </div>
                        <div class=" form-group">
                            <label>Description of Member</label>
                            <textarea type="file" class="form-control" placeholder="Describe the Member" name="motto">{{$member->motto}}</textarea>
                        </div>
                        <button type=" submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="/admin/member" class="btn btn-primary">Back to Members</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection