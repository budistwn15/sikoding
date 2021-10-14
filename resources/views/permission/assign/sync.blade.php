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
    <form action="{{ route('assign.edit', $role) }}" method="post">
        @method('PUT')
    @csrf
        <div class="mb-3">
            <label for="role">Role Name</label>
            <select name="role" id="role" class="form-control">
                <option disabled selected>Choose a role!</option>
                @foreach ($roles as $item)
                    <option {{ $role->id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('role')
                <div class="text-danger mt-2 d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="permissions">Permissions</label>
            <select name="permissions[]" id="permissions" class="form-select selecttwo" multiple="multiple">
                @foreach ($permissions as $permission)
                <option {{ $role->permissions()->find($permission->id) ? "selected" : "" }} value="{{ $permission->id }}">{{ $permission->name }}</option>
                @endforeach
            </select>
            @error('role')
                <div class="text-danger mt-2 d-block">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-secondary">Assign</button>
    </form>
</div>

@endsection
