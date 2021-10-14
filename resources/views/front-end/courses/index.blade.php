@extends('layouts.front')
@section('title',$course->name_course.' | SiKoding')
@section('background','navbar-dark bg-dark border-bottom border-secondary')
@section('img')
<img src="{{ asset('img/logo/sikoding-dark.png') }}" alt="">
@endsection

@section('content')
<div class="hero bg-dark text-white">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-8">
                <a href="{{ route('front.skill.index',$course->skill) }}" class="btn btn-sm btn-secondary shadow mt-4 rounded-pill">{{ $course->skill->name }}</a>
                    <h1 class="display-4 mt-4 font-weight-bold">{{ $course->name_course }}</h1>
                    <p class="lead">{!! $course->description_course !!}</p>
                            <a href="{{ route('front.theories.index', $course,$theory) }}" class="btn btn-primary">Belajar</a>
            </div>
        </div>
        <div class="row border-top border-secondary">
            <div class="col-md-8">
                <div class="btn-group my-3">
                    <a href="#" class="btn text-white">{{ $course->theory->count() }} Episode</a>
                    <a href="#" class="btn text-white">Completed</a>
                    <a href="#" class="btn text-white">Beginner</a>
                    <a href="#" class="btn text-white">{{ $course->user->name }}</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-8 my-4">
            <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="about-tab" data-bs-toggle="pill" data-bs-target="#pills-about" role="tab" aria-controls="pills-about" aria-selected="true">About</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-lesson-tab" data-bs-toggle="pill" data-bs-target="#pills-lesson" role="tab" aria-controls="pills-lesson" aria-selected="false">Lessons</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-tools-tab" data-bs-toggle="pill" data-bs-target="#pills-tools" role="tab" aria-controls="pills-tools" aria-selected="false">Tools</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-projects-tab" data-bs-toggle="pill" data-bs-target="#pills-projects" role="tab" aria-controls="pills-projects" aria-selected="false">Projects</button>
                </li>
              </ul>
              <div class="tab-content mt-3" id="pills-tabContent">
                {{-- about --}}
                <div class="tab-pane fade show active" id="pills-about" role="tabpanel" aria-labelledby="about-tab">
                    <p class="lead">{!! $course->description_course !!}</p>
                </div>

                <div class="tab-pane fade" id="pills-lesson" role="tabpanel" aria-labelledby="pills-lesson-tab">
                    <div class="list-group">
                        @foreach ($course->theory as $index => $theories)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <h5 class="mb-1">{{ $theories->title }}</h5>
                              <small class="text-muted">Episode {{ $index+1 }}</small>
                            </div>
                            <small class="text-muted">{{ $theories->created_at->diffForHumans() }}</small>
                          </a>
                        @endforeach
                      </div>
                </div>
                <div class="tab-pane fade" id="pills-tools" role="tabpanel" aria-labelledby="pills-tools-tab">
                    <div class="container">
                        <div class="row my-5">
                            @foreach ($course->tool as $tools)
                            <div class="col-md-3">
                                <div class="card p-4 border-0 shadow-sm" style="width: 18rem;">
                                    <img src="{{ asset('img/tool/'.$tools->thumbnail_tool) }}" class="img-fluid my-2" alt="..." width="100">
                                    <div class="card-body">
                                      <h2>
                                        <a class="text-decoration-none" href="{{ $tools->url_tool }}" style="font-weight: 700;font-size:22px;color:#34364a" target="_blank">{{ $tools->name_tool }}</a>
                                    </h2>
                                    </div>
                                  </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-projects" role="tabpanel" aria-labelledby="pills-projects-tab">...</div>
              </div>
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
