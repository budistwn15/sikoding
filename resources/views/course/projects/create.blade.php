@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Courses {{ $course->name_course }}</h3>
<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Add Project</h5>
    </div>
    @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('projects.create',$course) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="text" name="course_id" id="course_id" class="form-control" value="{{ old('course_id') ?? $course->id }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="name_projects" class="form-label">Name</label>
                    <input type="text" name="name_projects" id="name_projects" class="form-control" placeholder="Enter name...">
                    @error('name_projects')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description_projects" class="form-label">Description</label>
                    <textarea name="description_projects" class="form-control" id="summernote" placeholder="Enter name...">
                        <strong>Deskripsi Projek</strong> <br>....<br><br>
                        <strong>Ketentuan Projek</strong> <br>....<br><br>
                        <strong>Penilaian Projek</strong> <br>....<br><br>
                    </textarea>
                    @error('description_projects')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="point_projects" class="form-label">Point</label>
                    <input type="number" min="1" max="100" name="point_projects" id="point_projects" class="form-control" placeholder="Enter point 1-100 ...">
                    @error('point_projects')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
</div>


@endsection
