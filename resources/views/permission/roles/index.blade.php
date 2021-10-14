@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Role & Permission</h3>

<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Create New Roles</h5>
    </div>
    @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
    <form action="{{ route('roles.create') }}" method="post">
        @csrf
        @include('permission.roles.partials.form-control', ['submit' => 'Create'])
        </form>
</div>

<div class="card bg-white shadow-sm p-4 border-0 my-3">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Table of Roles</h5>
    </div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Guard Name</th>
                    <th>Create At</th>
                    <th>Act</th>
                </tr>
                <tr>
                    @foreach ($roles as $index => $role)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->guard_name }}</td>
                            <td>{{ $role->created_at->format("d F Y") }}</td>
                            <td>
                                <a href="{{ route('roles.edit',$role) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('roles.delete',$role) }}" class="btn btn-primary btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tr>
            </table>
</div>

@endsection
