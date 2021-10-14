@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Role & Permission</h3>

<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Sync Role for {{ $user->name }}</h5>
    </div>
    @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('assign.user.edit',$user) }}" method="post">
                @method('PUT')
            @csrf
                <div class="mb-3">
                    <label for="user" class="form-label">User</label>
                    <input type="text" name="email" id="user" value="{{ $user->email }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="roles" class="form-label">Pick Roles</label>
                    <select name="roles[]" id="roles" class="form-control selecttwo" multiple>
                        @foreach ($roles as $role)
                            <option {{ $user->roles()->find($role->id) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary">Assign</button>
            </form>
</div>
@endsection
