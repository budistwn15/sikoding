@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Skills
        </div>
        <div class="card-body">
            <form action="{{ route('skills.edit',$skill) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('skill.partials.form-control')
            </form>
        </div>
    </div>
@endsection
