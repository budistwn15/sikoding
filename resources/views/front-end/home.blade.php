@extends('layouts.front')
@section('content')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
<div class="container">
    <div class="row mb-3">
        <div class="col-md-8 m-auto">
            <div class="jumbotron bg-white text-center">
                <img src="{{ asset('img/logo/logo.png') }}" alt="" class="img-responsive" width="100">
                <h1 class="display-4 mt-4">Belajar Coding.</h1>
                <h1 class="display-4">Perluas Wawasan Anda.</h1>
                <p class="lead">Tingkatkan kemampuan anda dengan SiKoding untuk mendorong keterampilan anda ketingkat berikutnya, melalui course yang ada disini seperti <span class="text-blue font-weight-bold">HTML</span>, <span class="text-blue font-weight-bold">CSS</span>, <span class="text-blue font-weight-bold">Javascript</span> dan masih <span class="text-blue font-weight-bold">banyak lagi</span></p>
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg my-4">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</div>

<h2 class="display-5 text-center">Explore SiKoding</h2>
<p class="lead text-center">Mulai perjalanan anda dari pemula hingga menjadi mahir.</p>

<div class="container">
    <div class="row my-5">
        @foreach ($skills as $skill)

        <div class="col-md-3">
            <div class="card mb-3">
                <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="img/skills/{{ $skill->picture }}" alt="..." width="50" class="img-fluid m-3">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h5 class="card-title"><a class="text-decoration-none" href="{{ route('front.skill.index', $skill) }}">{{ Str::upper($skill->name) }}</a></h5>

                    <p class="card-text">{{ $skill->course->count() }} Series</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<h2 class="display-5 text-center">Why Choose us</h2>
<p class="lead text-center">Platform Belajar Online Berkurikulum Internasional.</p>
<div class="container">
    <div class="row my-5">
        <div class="col-md-3">
            <div class="card p-4 border-0 shadow-sm" style="width: 18rem;">
                <img src="{{ asset('img/bg/ic_studikasus.svg') }}" class="img-fluid my-2" alt="..." width="100">
                <div class="card-body">
                  <h2 style="font-weight: 700;font-size:22px;color:#34364a">Studi Kasus</h2>
                  <p class="mt-3" style="font-size: 16px;font-weight:400;color:#34364a;line-height:30px">Kita akan belajar membangun sebuah real-world project di bidang IT</p>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="card p-4 border-0 shadow-sm" style="width: 18rem;">
                <img src="{{ asset('img/bg/ic_access.svg') }}" class="img-fluid my-2" alt="..." width="100">
                <div class="card-body">
                  <h2 style="font-weight: 700;font-size:22px;color:#34364a">Lifetime Access</h2>
                  <p class="mt-3" style="font-size: 16px;font-weight:400;color:#34364a;line-height:30px">Mempelajari dan memahami materi kelas lebih santai tanpa batasan waktu</p>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="card p-4 border-0 shadow-sm" style="width: 18rem;">
                <img src="{{ asset('img/bg/ic_project.svg') }}" class="img-fluid my-2" alt="..." width="100">
                <div class="card-body">
                  <h2 style="font-weight: 700;font-size:22px;color:#34364a">Portfolio</h2>
                  <p class="mt-3" style="font-size: 16px;font-weight:400;color:#34364a;line-height:30px">Pelajari dan miliki hasil karya untuk membangun karir masa depan</p>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="card p-4 border-0 shadow-sm" style="width: 18rem;">
                <img src="{{ asset('img/bg/ic_sertifikat.svg') }}" class="img-fluid my-2" alt="..." width="100">
                <div class="card-body">
                  <h2 style="font-weight: 700;font-size:22px;color:#34364a">Sertifikat</h2>
                  <p class="mt-3" style="font-size: 16px;font-weight:400;color:#34364a;line-height:30px">Selesaikan projek yang ada di kelas dan dapatkan sertifikat dari SiKoding</p>
                </div>
              </div>
        </div>
    </div>
</div>

<h2 class="display-5 text-center">Top Featured</h2>
<p class="lead text-center">Mari Kita Tingkatkan Keahlian Desain dan Kode</p>
<div class="container">
    <div class="row my-5">
        @foreach ($courses as $course)
        <div class="col-md-3 mx-3 my-2">
            <div class="card p-4 border-0 shadow-sm" style="width: 18rem;">
                <a href="{{ route('front.course.index',$course) }}">
                    <img src="{{ asset('img/courses/'.$course->thumbnail_course) }}" class="img-fluid my-2" alt="..." width="100"></a>
                <div class="card-body">
                  <h2 style="font-weight: 700;font-size:22px;color:#34364a">
                        <a href="{{ route('front.course.index',$course) }}" class="text-decoration-none" style="font-weight: 700;font-size:22px;color:#34364a">{{ $course->name_course }}</a>
                    </h2>
                  <p class="mt-3" style="font-size: 16px;font-weight:400;color:#34364a;line-height:30px">{!! Str::limit($course->description_course, 100, '...') !!}</p>
                  <div class="d-flex justify-content-between">
                      <small>{{ $course->user->name }}</small>
                      <small>{{ $course->created_at->diffForHumans() }}</small>
                  </div>
                </div>
              </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-4 m-auto">
            <p class="text-center">Ingin lebih banyak ? <a href="{{ route('front.course.all') }}" class="text-decoration-none fw-bold">Lihat Disini</a></p>
        </div>
    </div>
</div>

<div class="testimoni mt-3" style="background-color: #4674B5">
    <div class="container">
        <h2 class="text-white fw-bold text-center py-4 display-4">Kisah Sukses</h2>
        <p class="text-center text-white lead">Bacalah kisah penuh inspirasi tentang kesuksesan para pelajar kami</p>
        <div class="row p-4">
            @foreach ($testimonies as $testimoni)
            <div class="col-md-4 my-2">
                <div class="card">
                    <div class="card-body">
                        <p class="lead">{!! $testimoni->testimoni !!}</p>
                        <h5 class="text-muted">{{ $testimoni->name }}</h5>
                        <h6 class="text-muted">{{ $testimoni->asal }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container my-5 py-4">
        <h2 class="text-center font-weight-bold">Raihlah Potensi Kreatif Anda Sepenuhnya</h2>
        <p class="text-muted text-center mt-4">Jangan berkecil hati walaupun anda adalah seorang pemula! <br>Anda memiliki potensi untuk menguasai kemampuan yang diperlukan untuk menjadi seorang kreator.</p>
        <p class="text-muted text-center mb-5">Di SiKoding, kami berkomitmen untuk membantu memenuhi potensi keahlian programming Anda.<br>Mulai dari awal pembelajaran, kami akan mendukung penuh perjalanan Anda di dalam dunia programming.</p>
        <h3 class="text-center">Mulai Belajar</h3>
        <p class="text-muted text-center">Dunia koding yang seru menunggu anda.</p>
        <div class="d-flex justify-content-center">
            <a href="{{ route('register') }}" class="btn btn-primary my-3">Daftar Gratis Sekarang</a>
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
