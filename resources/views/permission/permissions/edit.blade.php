@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Role & Permission</h3>

<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Edit Permission</h5>
    </div>
    @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('permissions.edit',$permission) }}" method="post">
                @csrf
                @method('PUT')
                @include('permission.permissions.partials.form-control')
                </form>
</div>
@endsection
