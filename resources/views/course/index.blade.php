@extends('layouts.back')

@section('content')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection

<h3 class="fw-bold my-4">Courses</h3>

<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Data Courses</h5>
        <a href="{{ route('course.create') }}" class="btn btn-primary">Add new Course</a>
    </div>
    <p class="lead">Di bawah ini merupakan data semua courses yang ada di SiKoding</p>
    @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
    <div class="table-responsive">
        <table class="table table-stripped table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Thumbnail</th>
                    <th>Skills</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->name_course }}</td>
                        <td>{!! $course->description_course !!}</td>
                        <td>
                            @if ( $course->thumbnail_course )
                            <img src="{{ asset('img/courses/'.$course->thumbnail_course) }}" alt="{{ $course->name_course }}" width="80">
                                @else
                                No Picture
                            @endif
                        </td>
                        <td>
                            {{ Str::upper($course->skill->name) }}
                        </td>
                        <td>
                            <a href="{{ route('courses.detail',$course) }}" class="btn btn-primary">Detail</a>
                            <form action="{{ route('course.delete',$course) }}" method="POST">
                            @method("Delete")
                            @csrf
                            <button type="submit" class="btn btn-danger mt-2">Delete</button>
                            </form>
                            <a href="{{ route('course.edit',$course) }}" class="btn btn-primary mt-2">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
