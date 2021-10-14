<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Theory;
use Illuminate\Http\Request;

class TheoryController extends Controller
{
    public function create(Course $course)
    {
        return view('course.theories.create', compact('course'));
    }

    public function detail(Theory $theories)
    {
        $submit = "Add";
        return view('course.theories.detail', compact('theories', 'submit'));
    }

    public function store()
    {
        request()->validate([
            'course_id' => "required",
            'title' => 'required|min:15',
            'theory' => 'required'
        ]);

        Theory::create([
            'title' => request('title'),
            'theory' => request('theory'),
            'course_id' => request('course_id'),
        ]);

        return redirect()->back()->with('success', 'Theory has been addedd');
    }

    public function edit(Course $course, Theory $theories)
    {
        $submit = "Edit";
        return view('course.theories.edit', compact('course', 'theories', 'submit'));
    }

    public function update(Course $course, Theory $theories)
    {
        request()->validate([
            'course_id' => "required",
            'title' => 'required|min:15',
            'theory' => 'required'
        ]);

        $theories->update([
            'course_id' => request('course_id'),
            'title' => request('title'),
            'theory' => request('theory')
        ]);

        return redirect()->route('courses.detail', $course)->with('success', 'Theory has been edited');
    }
}
