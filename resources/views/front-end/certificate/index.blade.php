@extends('layouts.front')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')

<div class="container mt-5 py-5">
    <div class="row">
        <div class="col-md-4">
            <h3 class="fw-bold">My Certificate</h3>
        <p>Masukkan kode unik sertifikat untuk pemeriksaan lebih lanjut pada sistem kami</p>

        <form action="{{ route('front.certificate.search') }}" method="GET" class="my-5">
            <div class="mb-3">
                <label for="" class="form-label">Kode Unik</label>
                <input type="text" name="search" id="search" placeholder="Kode Unik" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" name="submit" value="Check Now">
            </div>
        </form>
        @if (isset($_GET['submit']))
            @forelse ($certificates as $certificate)
                <div class="alert alert-success">Sertifikat Ditemukan</div>
                <a href="{{ route('front.certificate.print', $certificate) }}" class="btn btn-primary">Cetak Sertifikat</a>
            @empty
            <div class="alert alert-danger">Sertifikat Tidak Ditemukan</div>
            @endforelse
        @endif
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
