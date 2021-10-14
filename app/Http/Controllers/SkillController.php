<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Skill;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::get();
        return view('skill.index', compact('skills'));
    }

    public function create()
    {
        $skill = new Skill();
        $submit = "Create";
        return view('skill.create', compact('skill', 'submit'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'picture' => 'required|file|image|mimes:png,jpg|max:2048'
        ]);

        if (request()->hasFile('picture')) {
            $file = request()->file('picture');
            $nama_file = time() . '-' . $file->getClientOriginalName();
            $tujuan_upload = 'img/skills/';
            $file->move($tujuan_upload, $nama_file);
        }

        Skill::create([
            'name' => request('name'),
            'description' => request('description'),
            'picture' => $nama_file,
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill has been added');
    }

    public function edit(Skill $skill)
    {
        $skills = Skill::get();
        $submit = "Edit";
        return view('skill.edit', compact('skill', 'skills', 'submit'));
    }

    public function update(Skill $skill)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'picture' => 'required|file|image|mimes:png,jpg|max:2048'
        ]);

        Storage::disk('local')->delete('img/skills/' . $skill->image);

        if (request()->hasFile('picture')) {
            $file = request()->file('picture');
            $nama_file = time() . '-' . $file->getClientOriginalName();
            $tujuan_upload = 'img/skills/';
            $file->move($tujuan_upload, $nama_file);
        }

        $skill->update([
            'name' => request('name'),
            'description' => request('description'),
            'picture' => $nama_file,
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill has been updated');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Skill has been deleted');
    }

    // public function detail(Skill $skill)
    // {
    //     $skills = Skill::get();
    //     $courses = Course::get();
    //     return view('front-end.skills.index', compact('skill', 'skills', 'courses'));
    // }
}
