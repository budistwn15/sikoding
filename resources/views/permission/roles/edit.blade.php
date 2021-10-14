@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Role & Permission</h3>

<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Edit Roles</h5>
    </div>

    <form action="{{ route('roles.edit',$role) }}" method="post">
        @csrf
        @method('PUT')
        @include('permission.roles.partials.form-control')
        </form>
</div>

@endsection
