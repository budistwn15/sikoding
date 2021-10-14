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
                <div class="d-flex justify-content-between">
                   <h3 class="my-3 border-bottom"> Theory List</h3>
                </div>
                @forelse ($course->theory as $index => $theories)

                <div class="list-group my-3">
                    <a href="{{ route('front.theories.detail',['course' => $course,'theory' => $theories]) }}" class="list-group-item list-group-item-action border-0 shadow-sm p-3 my-3">
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $theories->title }}</h5>
                        <small class="text-muted">Episode {{ $index+1 }}</small>
                      </div>
                      <small class="text-muted">{{ $theories->created_at->diffForHumans() }}</small>
                    </a>
                  </div>
                  @empty
                  <div class="alert alert-danger">Theory Doesn't Exist </div>
              @endforelse

            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-between">
                   <h3 class="my-3 border-bottom"> Project</h3>
                </div>
                @forelse ($course->project as $index => $projects)

                <div class="list-group my-3">
                    <a href="{{ route('front.project.index',['course' => $course,'project' => $projects]) }}" class="list-group-item list-group-item-action shadow-sm p-3 my-3">
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $projects->name_projects }}</h5>
                      </div>
                      <small class="text-muted">{{ $projects->created_at->diffForHumans() }}</small>
                    </a>
                  </div>
                  @empty
                  <div class="alert alert-danger">Theory Doesn't Exist </div>
              @endforelse

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
