@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            {{ $theories->title }}
        </div>
        <div class="card-body">
            {!! $theories->theory !!}
        </div>
        <div class="card-footer">
            {{ $theories->created_at }}
        </div>
    </div>
@endsection
