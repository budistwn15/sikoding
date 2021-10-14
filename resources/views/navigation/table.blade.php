@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Navigation</h3>

<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Data Table Navigation</h5>
    </div>
    <p class="lead">Di bawah ini merupakan semua data Navigation yang ada di SiKoding
    </p>
    @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Parent</th>
                <th>Name</th>
                <th>Url</th>
                <th>Permission Name</th>
                <th>Act</th>
            </tr>
            @foreach ($navigations as $navigation)
                <tr>
                    <td><strong>{{ $navigation->parent->name }}</strong></td>
                    <td>{{ $navigation->name }}</td>
                    <td>{{ $navigation->url ?? "It's a parent" }}</td>
                    <td>{{ $navigation->permission_name }}</td>
                    <td>
                        <a class="text-decoration-none" href="{{ route('navigation.edit',$navigation) }}">Edit or remove</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
