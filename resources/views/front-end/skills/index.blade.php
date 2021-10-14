@extends('layouts.front')
@section('title',$skill->name.' | SiKoding')
@section('background','navbar-dark bg-dark border-bottom border-secondary')
@section('img')
<img src="{{ asset('img/logo/sikoding-dark.png') }}" alt="">
@endsection

@section('content')
<div class="hero bg-dark text-white">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-8">
                    <h1 class="display-4 mt-4 font-weight-bold">{{ Str::upper($skill->name) }}</h1>
                    <p class="lead">{!! $skill->description !!}</p>
                        @foreach ($skills as $d)
                            <a href="{{ route('front.skill.index', $d) }}" class="btn btn-primary my-4 me-2">{{ Str::upper($d->name) }}</a>
                        @endforeach
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">

        @forelse ($skill->course as $index => $courses)
            <div class="col-md-4">
                <div class="card p-4 border-0 shadow-sm" style="width: 18rem;">
                    <a href="{{ route('front.course.index', $courses) }}">
                        <img src="{{ asset('img/courses/'.$courses->thumbnail_course) }}" class="img-fluid my-2" width="100" alt="{{ $courses->name_course }}">
                    </a>
                    <div class="card-body">
                      <h5>
                          <a class="text-decoration-none" style="font-weight: 700;font-size:22px;color:#34364a" href="{{ route('front.course.index',$courses) }}">{{ $courses->name_course }}</a>
                        </h5>
                      <div class="d-flex justify-content-between">
                          <small>{{ $courses->theory->count() }} episode</small>
                          <small>{{ $courses->user->name }}</small>
                      </div>
                    </div>
                  </div>
            </div>
            @empty
            <div class="alert alert-danger">Tidak ada data...</div>
        @endforelse

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
