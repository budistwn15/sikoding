<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create(Course $course)
    {
        return view('course.projects.create', compact('course'));
    }

    public function store(Course $course)
    {
        request()->validate([
            'name_projects' => 'required',
            'description_projects' => 'required',
            'point_projects' => 'required',
        ]);



        Project::create([
            'name_projects' => request('name_projects'),
            'description_projects' => request('description_projects'),
            'point_projects' => request('point_projects'),
            'course_id' => request('course_id')
        ]);

        return redirect()->route('courses.detail', $course)->with('success', 'Project has been added');
    }
}
