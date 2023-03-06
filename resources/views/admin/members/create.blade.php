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
                    <form action="/admin/members" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Member's Name</label>
                            <input type="text" class="form-control" placeholder="Enter the Name of Member" name="member_name">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="CEO">CEO</option>
                                <option value="CTO">CTO</option>
                                <option value="Developer">Developer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Motto</label>
                            <textarea type="file" class="form-control" placeholder="Describe the Motto" name="motto"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="/admin/members" class="btn btn-primary">Back to Members</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection