@extends('layouts.base')
@section('bungkus','container')
@section('background','navbar-light bg-white shadow-sm')

@section('body')
<x-layouts.navigation></x-layouts.navigation>
    <div class="container">
        <div class="py-3">
            <div class="row">
                <div class="col-md-3">
                    <x-layouts.sidebar></x-layouts.sidebar>
                </div>
                <div class="col-md-9">
                    <div class="mt-4">
                    @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
