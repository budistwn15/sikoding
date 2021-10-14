@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
           {{   $videos->title_video  }}
        </div>
        <div class="card-body">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ str_replace('&','?', $videos->video_theory) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>

        </div>
    </div>
@endsection


