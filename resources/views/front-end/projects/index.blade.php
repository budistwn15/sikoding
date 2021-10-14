@extends('layouts.front')
@section('title',$course->name_course.' | SiKoding')
@section('background','navbar-dark bg-dark border-bottom border-secondary')
@section('img')
<img src="{{ asset('img/logo/sikoding-dark.png') }}" alt="">
@endsection

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success my-3">{{ session('success') }}</div>
                @endif
                <div class="d-flex justify-content-between">
                   <h3 class="my-3 border-bottom"> Projects</h3>
                </div>
                    @forelse ($course->project as $projects)
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-bold">{{ $projects->name_projects }}</h5>
                            <p><strong>{{ $projects->point_projects }}</strong> / 100</p>
                        </div>
                        <div class="card p-4 shadow-sm border-0">
                            <p>{!! $projects->description_projects !!}</p>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#projectModal" class="btn btn-primary">Upload Project</a>
                        </div>
                        @empty
                        <div class="alert alert-danger">Projects Doesn't Exist </div>
                    @endforelse

            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Project</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('front.project.create',['course' => $course,'project' => $project]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id }}">
              <input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">

              <div class="form-floating mb-3">
                  <input type="text" name="name_projects" id="name_projects" class="form-control" placeholder="Name">
                  <label for="name_projects">Name Projects</label>
                  @error('name_projects')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>
              <div class="form-floating mb-3">
                  <textarea type="text" name="description_projects" id="description_projects" class="form-control" placeholder="Description"></textarea>
                  <label for="description_projects">Description Projects</label>
                  @error('description_projects')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>
              <div class="form-floating mb-3">
                  <input type="file" name="file_projects" id="file_projects" class="form-control" placeholder="File">
                  <label for="projects">Projects</label>
                  <small class="text-dark">File .zip | .rar</small><br>
                  @error('file_projects')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection
@section('footer')
<section class="footer border-top mt-5">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-4">
                <img src="{{ asset('img/logo/sikoding.png') }}" alt="">
                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, odit. Enim ratione, eveniet inventore necessitatibus vitae, culpa minima fugiat possimus praesentium suscipit, voluptatum impedit ex nihil nostrum assumenda libero sapiente.</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold mb-2">Location</h5>
                <p>PT SiKoding Membangun Indonesia
                    <br>
                    Jln Syeh Quro No 103
                    <br>
                    Karawang, Indonesia
                </p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold mb-2">Say Hello</h5>
                <p>info@sikoding.com</p>
            </div>
        </div>
        <div class="row">
            <p class="text-center">
                Copyright 2021 All Right Reserved | By <span class="text-primary">Sikoding</span>
            </p>
        </div>
    </div>
</section>
@endsection
