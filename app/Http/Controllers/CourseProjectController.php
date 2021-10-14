<?php

namespace App\Http\Controllers;

use App\Mail\SikodingEmail;
use App\Models\Certificate;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Course_Project;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CourseProjectController extends Controller
{
    public function index(Certificate $certificate)
    {
        $course_projects = Course_Project::get();
        $certificates = Certificate::get()->first();
        return view('course_project.index', compact(
            'course_projects',
            'certificate',
            'certificates'
        ));
    }

    public function store()
    {
        request()->validate([
            'certificate_code' => 'required',
            'name_certificate' => 'required',
            'email_certificate' => 'required',
            'course_certificate' => 'required',
            'mentor_certificate' => 'required',
            'point_certificate' => 'required'
        ]);

        Certificate::create([
            'certificate_code' => request('certificate_code'),
            'name_certificate' => request('name_certificate'),
            'email_certificate' => request('email_certificate'),
            'course_certificate' => request('course_certificate'),
            'mentor_certificate' => request('mentor_certificate'),
            'point_certificate' => request('point_certificate'),
            'course_id' => request('course_id')
        ]);

        Mail::to(request('email_certificate'))->send(new SikodingEmail(request('certificate_code')));

        return redirect()->back()->with('success', 'Score hass been addedd');
    }
}
