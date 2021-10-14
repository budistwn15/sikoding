@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Skills</h3>

<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Data Table Skills</h5>
    </div>
    <p class="lead">Di bawah ini merupakan semua data Skill yang ada di SiKoding
    </p>
    @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Picture</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skills as $index => $skill)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $skill->name }}</td>
                        <td>{!! $skill->description !!}</td>
                        <td>
                            <img width="80" src="{{ url('/img/skills/'.$skill->picture) }}" alt="{{ $skill->name }}">
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('skills.edit',$skill) }}" class="btn btn-primary me-2">Edit</a>
                                <form action="{{ route('skills.delete', $skill) }}" method="POST">
                                    @csrf
                                    @method("Delete")
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
