<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Course;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $skills = Skill::get();
        $courses = Course::get();
        $testimonies = Testimoni::limit(3)->orderBy('id', 'desc')->get();
        return view('front-end.home', compact('skills', 'courses', 'testimonies'));
    }
}
