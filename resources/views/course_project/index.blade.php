@extends('layouts.back')

@section('content')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection

<h3 class="fw-bold my-4">Courses Project</h3>

<div class="card bg-white shadow-sm p-4 border-0">
    <div class="d-flex justify-content-between">
        <h5 class="fw-bold">Data Courses Project</h5>
    </div>
    @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
    <div class="table-responsive">
        <table class="table table-stripped table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th rowspan="2" class="align-middle">Name</th>
                    <th rowspan="2" class="align-middle">Email</th>
                    <th rowspan="2" class="align-middle">Course</th>
                    <th colspan="3" class="text-center">Project</th>
                    <th rowspan="2" class="align-middle">Act</th>
                </tr>
                <tr>
                    <th>Name Project</th>
                    <th>Description Project</th>
                    <th>File Project</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($course_projects as $course_project)
                    <tr>
                        <td>{{ $course_project->user->name }}</td>
                        <td>{{ $course_project->user->email }}</td>
                        <td>{{ $course_project->course->name_course }}</td>
                        <td>{{ $course_project->name_projects }}</td>
                        <td>{{ $course_project->description_projects }}</td>

                        <td>
                            <a href="{{ asset('file/projects'.$course_project->file_projects) }}" download>{{ $course_project->file_projects }}</a>
                        </td>
                        <td>
                                @if ($course_project->information == "Scored")
                                Scored
                                    @else
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#certificateModal" class="btn btn-primary">Score</a>
                                @endif
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">Empty</div>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Score</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('course_project.create') }}" method="POST">
                @csrf
                <input type="hidden" name="course_id" value="{{ $course_project->course_id }}">
                <div class="form-floating mb-3">
                    <input type="text" name="certificate_code" id="certificate_code" placeholder="Certificate Code" class="form-control" value="{{ Str::random(10) }}" readonly>
                    <label for="certificate_code">Certificate Code</label>
                    @error('certificate_code')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="name_certificate" id="name_certificate" placeholder="Name" class="form-control" value="{{ $course_project->user->name }}" readonly>
                    <label for="name_certificate">Name</label>
                    @error('name_certificate')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email_certificate" id="email_certificate" placeholder="Name" class="form-control" value="{{ $course_project->user->email }}" readonly>
                    <label for="email_certificate">Email</label>
                    @error('email_certificate')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="course_certificate" id="course_certificate" placeholder="Name" class="form-control" value="{{ $course_project->course->name_course }}" readonly>
                    <label for="course_certificate">Course</label>
                    @error('course_certificate')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="mentor_certificate" id="mentor_certificate" placeholder="Name" class="form-control" value="{{ $course_project->course->user->name }}" readonly>
                    <label for="mentor_certificate">Mentor</label>
                    @error('mentor_certificate')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="point_certificate" id="point_certificae" placeholder="Name" class="form-control">
                    <label for="point_certificate">Point</label>
                    @error('point_certificate')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>

      </div>
    </div>
  </div>

@endsection
