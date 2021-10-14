@extends('layouts.front')
@section('content')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
<div class="container">
    <div class="row my-4">
        <div class="col-md-12">
            <div class="card p-4 bg-white shadow-sm border-0">
                <h3>Testimoni</h3>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('testimoni.create') }}" method="POST" class="my-4">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama....">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email...">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="asal" class="form-label">Asal</label>
                        <input type="text" name="asal" id="asal" class="form-control" placeholder="Masukkan asal....">
                        @error('asal')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="testimoni" class="form-label">Testimoni</label>
                        <textarea name="testimoni" id="summernote" class="form-control"></textarea>
                        @error('testimoni')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
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
