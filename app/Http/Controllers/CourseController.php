<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Video;
use App\Models\Course;
use App\Models\Theory;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        // $courses = Course::all();
        $courses = Auth::user()->course;
        return view('course.index', compact('courses'));
    }

    public function detail(Course $course, Theory $theory, Video $video)
    {
        $courses = Course::get();
        $theories = Theory::get();
        $videos = Video::get();
        $project = Project::get()->first();
        return view('course.detail', compact('course', 'courses', 'theory', 'theories', 'videos', 'video', 'project'));
    }

    public function create()
    {
        $course = new Course();
        $skills = Skill::get();
        $submit = "Create Course";
        return view('course.create', compact('skills', 'submit', 'course'));
    }

    public function store()
    {
        request()->validate([
            'name_course' => 'required',
            'description_course' => 'required',
            'thumbnail_course' => 'required|file|image|mimes:png,jpg|max:2048',
            'skill_id' => 'required',
        ]);

        if (request()->hasFile('thumbnail_course')) {
            $file = request()->file('thumbnail_course');
            $nama_file = time() . '-' . $file->getClientOriginalName();
            $tujuan_upload = 'img/courses/';
            $file->move($tujuan_upload, $nama_file);
        }

        $slug = Str::slug(request('name_course'));

        Course::create([
            'name_course' => request('name_course'),
            'description_course' => request('description_course'),
            'thumbnail_course' => $nama_file,
            'slug' => $slug,
            'skill_id' => request('skill_id'),
            'user_id' => request('user_id'),
        ]);

        return redirect()->route('courses.index')->with('success', 'Course has been addedd');
    }

    public function edit(Course $course)
    {
        $skills = Skill::get();
        $submit = "Edit";
        return view('course.edit', compact('course', 'skills', 'submit'));
    }

    public function update(Course $course)
    {

        request()->validate([
            'name_course' => 'required',
            'description_course' => 'required',
            'thumbnail_course' => 'required|file|image|mimes:png,jpg',
            'skill_id' => 'required',
        ]);

        Storage::disk('local')->delete('img/course/' . $course->thumbnail_course);

        if (request()->hasFile('thumbnail_course')) {
            $file = request()->file('thumbnail_course');
            $nama_file = time() . '-' . $file->getClientOriginalName();
            $tujuan_upload = 'img/courses/';
            $file->move($tujuan_upload, $nama_file);
        }

        $slug = Str::slug(request('name_course'));

        $course->update([
            'name_course' => request('name_course'),
            'description_course' => request('description_course'),
            'thumbnail_course' => $nama_file,
            'slug' => $slug,
            // 'skill_id' => request('skill_id'),
            // 'user_id' => request(Auth::user()->course),
        ]);

        return redirect()->route('courses.index')->with('success', 'courses has been edited');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course has been deleted');
    }
}
