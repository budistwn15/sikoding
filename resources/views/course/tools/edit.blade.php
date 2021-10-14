@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Courses {{ $course->name_course }}</h3>
<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Edit Tool</h5>
    </div>
            <form action="{{ route('tools.edit',['course' => $course, 'tools' => $tools]) }}" method="POST" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <div class="mb-3">
                    <input type="hidden" name="course_id" id="course_id" class="form-control" value="{{ old('course_id') ?? $course->id }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="name_tool" class="form-label">Name</label>
                    <input type="text" name="name_tool" id="name_tool" class="form-control" placeholder="Enter name..." value="{{ old('name_tool') ?? $tools->name_tool }}">
                    @error('name_tool')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="url_tool" class="form-label">URL</label>
                    <input type="url" name="url_tool" id="url_tool" class="form-control" placeholder="Enter url..." value="{{ old('url_tool') ?? $tools->url_tool }}">
                    @error('url_tool')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    @if (old('thumbnail_tool') ?? $tools->thumbnail_tool)
                        <img src="{{ url('img/tool/'.$tools->thumbnail_tool) }}" alt="{{ $tools->name_tool }}" width="250">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="thumbnail_tool" class="form-label">Thumbnail</label>
                    <input type="file" name="thumbnail_tool" id="thumbnail_tool" class="form-control">
                    @error('thumbnail_tool')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Edit</button>

            </form>
</div>


@endsection
