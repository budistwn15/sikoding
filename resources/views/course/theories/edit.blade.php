@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Courses {{ $course->name_course }}</h3>
<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Add Thoery</h5>
    </div>
    <form action="{{ route('theories.edit',['course' => $course,'theories' => $theories]) }}" method="POST">
        @method("PUT")
        @csrf
        <div class="mb-3">
            <input type="hidden" name="course_id" id="course_id" class="form-control" value="{{ old('course_id') ?? $course->id }}" readonly>
            @error('course_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter a title..." value="{{ old('title') ?? $theories->title }}">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="theory" class="form-label">Theory</label>
            <textarea name="theory" id="summernote" class="ckeditor form-control">{{ old('theory') ?? $theories->theory }}</textarea>
            @error('theory')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>

    </form>

</div>


@endsection
