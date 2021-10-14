@extends('layouts.back')

@section('content')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
<h3 class="font-weight-bold my-4">Dashboard</h3>

<div class="row">
    <div class="col-md-8">
        <div class="card bg-primary p-4 text-white shadow-sm" style="background-color:#2E4DD4 !important;border-radius: 20px;">
            <h5 class="font-weight-bold">Hello {{ auth()->user()->name }}</h5>
            <p class="lead">Selamat datang di halaman Dashboard</p>
        </div>
    </div>
</div>

@endsection
