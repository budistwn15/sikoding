@extends('layouts.back')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
@section('content')
<h3 class="fw-bold my-4">Courses {{ $course->name_course }}</h3>
@if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<div class="card bg-white shadow-sm p-4 border-0 my-4">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">List Theory</h5>
        <a href="{{ route('theories.create',['course' => $course,'theories' => $theory]) }}" class="btn btn-primary">Add Theory</a>
    </div>

    <div class="table-responsive my-4">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Url Video</th>
                    <th>Created At</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course->theory as $index => $theories)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td><a class="text-decoration-none" href="{{ route('theories.detail',$theories) }}">{{ $theories->title }}</a></td>
                    <td>
                        @if ( $theories->video['video_theory'])
                            <a class="text-decoration-none" href="{{ route('videos.detail',$theories->video['id']) }}">{{ Str::limit($theories->video['video_theory'], 30, '...') }}</a>
                        @else
                            <a href="{{ route('videos.create',$theories) }}" class="btn btn-primary">Add Video</a>
                        @endif
                    </td>
                    <td>{{ $theories->created_at }}</td>
                    <td>
                        <a href="{{ route('theories.edit', ['course' => $course, 'theories' => $theories]) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<div class="row mb-3">
    <div class="col-md-6">
        <div class="card bg-white shadow-sm p-4 border-0">
            <div class="d-flex justify-content-between">
                <h5 class="fw-bold">List Tools</h5>
                <a href="{{ route('tools.create',$course) }}" class="btn btn-primary">Add Tools</a>
            </div>
            <div class="table-responsive my-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Thumbnail</th>
                            <th>Act</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($course->tool as $index => $tools)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $tools->name_tool }}</td>
                                <td>
                                    <img src="{{ asset('img/tool/'.$tools->thumbnail_tool) }}" alt="{{ $tools->name_tool }}" width="50" class="img-fluid">
                                </td>
                                <td>
                                    <a href="{{ route('tools.edit',['course' => $course,'tools' => $tools]) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('tools.delete',['course' => $course, 'tools' => $tools]) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger mt-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="card bg-white shadow-sm p-4 border-0">
            <div class="d-flex justify-content-between">
                <h5 class="fw-bold">List Projek</h5>

            </div>
            <div class="table-responsive my-4">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Point</th>
                            <th>Act</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($course->id == $project['course_id'])
                            @foreach ($course->project as $projects)
                                <tr>
                                    <td>{{ $projects->name_projects }}</td>
                                    <td>{{ $projects->point_projects }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="3"><a href="{{ route('projects.create',$course) }}" class="btn btn-primary">Add Projects</a></td>

                                </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
