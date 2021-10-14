@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Navigation</h3>
<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Edit Navigation</h5>
    </div>
    <p class="lead">Silahkan untuk mengubah data navigation</p>
    <form action="{{ route('navigation.edit', $navigation) }}" method="post">
        @method("PUT")
        @include('navigation.partials.form-control')
    </form>

    @include('navigation.delete',['navigation' => $navigation])
</div>
@endsection
