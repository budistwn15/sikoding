@extends('layouts.front')
@section('title',$theory->title.' | SiKoding')
@section('background','navbar-dark bg-dark border-bottom border-secondary')
@section('img')
<img src="{{ asset('img/logo/sikoding-dark.png') }}" alt="">
@endsection

@section('content')
<div class="hero bg-dark text-white">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="ratio ratio-16x9 my-2">
                    <iframe src="{{ str_replace('&','?', $theory->video['video_theory']) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-primary p-4 text-white my-3 shadow">
                <h3 class="font-weight-bold text-center">{{ $theory->title }}</h3>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card p-3 shadow-sm border-0">
                <div class="card-body">
                    <h4 class="font-weight-bold">{{ $theory->title }}</h4>
                    <p class="lead">{!! $theory->theory !!}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <span>{{ $theory->created_at->diffForHumans() }}</span>
                        <span>{{ $course->user->name }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="list-group">
                @foreach ($theories as $index => $row)
                <a href="{{ route('front.theories.detail',['course' => $course,'theory' => $row]) }}" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $row->title }}</h5>
                  </div>
                  <small class="text-muted">Episode {{ $index+1 }}</small>
                </a>
                @endforeach
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
