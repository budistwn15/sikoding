@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Role & Permission</h3>

<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Create New Permission</h5>
    </div>
    @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('permissions.create') }}" method="post">
                @csrf
                @include('permission.permissions.partials.form-control', ['submit' => 'Create'])
                </form>
</div>

<div class="card bg-white shadow-sm p-4 border-0 my-3">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Table of Permission</h5>
    </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Guard Name</th>
                        <th>Create At</th>
                        <th>Act</th>
                    </tr>
                    <tr>
                        @foreach ($permissions as $index => $permission)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>{{ $permission->created_at->format("d F Y") }}</td>
                                <td>
                                    <a href="{{ route('permissions.edit',$permission) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('permissions.delete',$permission) }}" class="btn btn-primary btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tr>
                </table>
            </div>
</div>
@endsection
