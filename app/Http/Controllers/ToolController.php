<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToolController extends Controller
{
    public function create(Course $course)
    {
        $submit = "Add";
        return view('course.tools.create', compact('course', 'submit'));
    }
    public function store(Course $course)
    {
        request()->validate([
            'name_tool' => 'required',
            'url_tool' => 'required',
            'thumbnail_tool' => 'required', 'file', 'image', 'mimes:png,jpg', 'max:2048',
        ]);

        if (request()->hasFile('thumbnail_tool')) {
            $file = request()->file('thumbnail_tool');
            $nama_file = time() . '-' . $file->getClientOriginalName();
            $tujuan_upload = 'img/tool/';
            $file->move($tujuan_upload, $nama_file);
        }

        Tool::create([
            'name_tool' => request('name_tool'),
            'url_tool' => request('url_tool'),
            'thumbnail_tool' => $nama_file,
            'course_id' => request('course_id'),
        ]);

        return redirect()->route('courses.detail', $course)->with('success', 'Tools has been addedd');
    }

    public function edit(Course $course, Tool $tools)
    {
        $submit = "Edit";
        return view('course.tools.edit', compact('course', 'tools', 'submit'));
    }

    public function update(Course $course, Tool $tools)
    {
        request()->validate([
            'name_tool' => 'required',
            'url_tool' => 'required',
            'thumbnail_tool' => 'required', 'file', 'image', 'mimes:png,jpg', 'max:2048',
        ]);

        Storage::disk('local')->delete('img/tool/' . $tools->thumbnail_tool);

        if (request()->hasFile('thumbnail_tool')) {
            $file = request()->file('thumbnail_tool');
            $nama_file = time() . '-' . $file->getClientOriginalName();
            $tujuan_upload = 'img/tool/';
            $file->move($tujuan_upload, $nama_file);
        }

        $tools->update([
            'name_tool' => request('name_tool'),
            'url_tool' => request('url_tool'),
            'thumbnail_tool' => $nama_file,
            'course_id' => request('course_id'),
        ]);

        return redirect()->route('courses.detail', $course)->with('success', 'Tools has been edited');
    }

    public function destroy(Course $course, Tool $tools)
    {
        $tools->delete();
        return redirect()->route('courses.detail', $course)->with('success', 'Tools has been deleted');
    }
}
