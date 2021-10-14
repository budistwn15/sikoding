@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Role & Permission</h3>

<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Assign Permission</h5>
    </div>
    @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('assign.create') }}" method="post">
                @csrf
                    <div class="mb-3">
                        <label for="role" class="form-label">Role Name</label>
                        <select name="role" id="role" class="form-control">
                            <option disabled selected>Choose a role!</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="text-danger mt-2 d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="permissions" class="form-label">Permissions</label>
                        <select name="permissions[]" id="permissions" class="form-select selecttwo" multiple="multiple">
                            @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="text-danger mt-2 d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-secondary">Assign</button>
                </form>
</div>

<div class="card bg-white shadow-sm p-4 border-0 my-3">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Table of Roles & Permission</h5>
    </div>
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Created</th>
            <th>The Permissions</th>
            <th>act</th>
        </tr>

        @foreach ($roles as $index => $role)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->guard_name }}</td>
                <td>{{ implode(', ', $role->getPermissionNames()->toArray()) }}</td>
                <td>
                    <a class="text-decoration-none" href="{{ route('assign.edit', $role) }}">Sync</a>
                </td>
            </tr>
        @endforeach

    </table>
</div>
@endsection
