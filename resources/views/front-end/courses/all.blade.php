@extends('layouts.front')
@section('title','Course | SiKoding')
@section('background','navbar-dark bg-dark border-bottom border-secondary')
@section('img')
<img src="{{ asset('img/logo/sikoding-dark.png') }}" alt="">
@endsection
@section('content')

<div class="container">
    <div class="row my-5">
        @foreach ($courses as $course)
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <img src="{{ asset('img/courses/'.$course->thumbnail_course) }}" class="img-fluid my-2" alt="..." width="100">
                <div class="card-body">
                  <h2>
                <a class="text-decoration-none" href="{{ route('front.course.index',$course) }}" style="font-weight: 700;font-size:22px;color:#34364a">{{ $course->name_course }}</a>
                </h2>
                  <div class="d-flex justify-content-between">
                      <small>{{ $course->theory->count() }} Episode</small>
                      <small>{{ Str::upper($course->skill->name) }}</small>
                  </div>
                </div>
              </div>
        </div>
        @endforeach
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
