@extends('layouts.app')
@section('title', 'Members')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            {{-- <div id="app">
                    @include('')
                </div> --}}
            <div class="card">
                <div class="card-header">{{ __('Members') }}</div>

                <div class="card-body">
                    @if (count($members) > 0)
                    <table class="table ">
                        <thead>
                            <th>Image</th>
                            <th>Members Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($members as $p)
                            <tr>
                                <td>
                                    <img src="{{ asset('images') }}/{{ $p->image }}" alt="{{ $p->members_name }}" class="img-thumbnail" style="width:200px">
                                </td>
                                <td>
                                    <p class="">{{ $p->member_name }}</p>
                                </td>
                                <td>
                                    <a href="/admin/members/{{ $p->id }}" class="btn btn-success">Show
                                        Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>The members is not available</p>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="/admin/members/create" class="btn btn-primary">Add New Members</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection