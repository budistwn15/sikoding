<?php

namespace App\Http\Controllers\Front;

use App\Models\Tool;
use App\Models\Course;
use App\Models\Theory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course_Project;
use App\Models\Project;

class FrontCourseController extends Controller
{
    public function all()
    {
        $courses = Course::get();
        return view('front-end.courses.all', compact('courses'));
    }
    public function index(Course $course, Theory $theory, Tool $tool)
    {
        $courses = Course::get();
        return view('front-end.courses.index', compact(
            'course',
            'theory',
            'courses',
            'tool'
        ));
    }


    public function theories(Course $course, Theory $theory)
    {
        $courses = Course::get();
        $theories = Theory::get();
        return view('front-end.courses.theory', compact('course', 'theory', 'courses', 'theories'));
    }

    public function detail(Course $course, Theory $theory)
    {
        $theories = Theory::get();
        return view('front-end.courses.detail', compact('theory', 'course', 'theories'));
    }

    public function projects(Course $course, Project $project, Course_Project $course_project)
    {
        $projects = Project::get();
        $course_projects = Course_Project::get()->first();
        return view('front-end.projects.index', compact(
            'course',
            'project',
            'projects',
            'course_project',
            'course_projects',
        ));
    }

    public function projectsCreate()
    {
        request()->validate([
            'name_projects' => 'required',
            'description_projects' => 'required',
            'file_projects' => 'required|mimes:zip,rar',
        ]);

        if (request()->hasFile('file_projects')) {
            $file = request()->file('file_projects');
            $nama_file = time() . '-' . $file->getClientOriginalName();
            $tujuan_upload = 'file/projects/';
            $file->move($tujuan_upload, $nama_file);
        }

        Course_Project::create([
            'user_id' => request('user_id'),
            'course_id' => request('course_id'),
            'name_projects' => request('name_projects'),
            'description_projects' => request('description_projects'),
            'file_projects' => $nama_file,
        ]);
        return redirect()->back()->with('success', 'Project hass been addedd');
    }
}
