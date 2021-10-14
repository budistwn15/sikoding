<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillFrontController extends Controller
{
    public function index(Skill $skill)
    {
        $skills = Skill::get();
        return view('front-end.skills.index', compact('skill', 'skills'));
    }
}
