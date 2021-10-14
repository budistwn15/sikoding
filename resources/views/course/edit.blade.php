@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="font-weight-bold my-4">Courses</h3>
<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="font-weight-bold">Edit Courses</h5>
    </div>
    <p class="lead">Silahkan untuk mengubah data courses</p>
    <form action="{{ route('course.edit',$course) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('course.partials.form-control')
    </form>
</div>
@endsection
