@extends('layouts.base')

@section('body')
    <x-layouts.navigation></x-layouts.navigation>
        @yield('content')
        @yield('footer')
    @endsection


