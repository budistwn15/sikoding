@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Theory {{ $theories->title }}</h3>
<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Add Video</h5>
    </div>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('videos.create',$theories) }}" method="POST">
        @csrf
        <input type="hidden" name="theory_id" id="theory_id" value="{{ $theories->id }}">
        <div class="mb-3">
            <label for="title_video" class="form-label">Title Video</label>
            <input type="text" name="title_video" id="title_video" class="form-control">
            @error('title_video')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="video_theory" class="form-label">Video</label>
            <input type="url" name="video_theory" id="video_theory" class="form-control">
            @error('video_theory')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Video</button>
    </form>

</div>
@endsection
