@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Role & Permission</h3>

<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Pick User by Email Address</h5>
    </div>
    @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('assign.user.create') }}" method="post">
                @csrf
                    <div class="mb-3">
                        <label for="user">User</label>
                        <input type="text" name="email" id="user" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="roles">Pick Roles</label>
                        <select name="roles[]" id="roles" class="form-select selecttwo" multiple>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-secondary">Assign</button>
                </form>
</div>

<div class="card bg-white shadow-sm p-4 border-0 my-3">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Table of Role & Permission</h5>
    </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>The Roles</th>
                        <th>act</th>
                    </tr>

                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                            <td>
                                <a class="text-decoration-none" href="{{ route('assign.user.edit', $user) }}">Sync</a>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
</div>


@endsection
