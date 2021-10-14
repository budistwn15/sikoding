@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Skills</h3>
<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Add Skills</h5>
    </div>
    <p class="lead">Silahkan untuk menambah data skills</p>
    <form action="{{ route('skills.create') }}" method="POST" enctype="multipart/form-data">
        @include('skill.partials.form-control')
    </form>
</div>
@endsection
