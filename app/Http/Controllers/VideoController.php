<?php

namespace App\Http\Controllers;

use App\Models\Theory;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function detail(Video $videos)
    {
        return view('course.video.detail', compact('videos'));
    }

    public function create(Theory $theories)
    {
        return view('course.video.create', compact('theories'));
    }

    public function store()
    {
        request()->validate([
            'title_video' => 'required',
            'video_theory' => 'required|url'
        ]);

        $video_url = str_replace('watch?v=', 'embed/', request('video_theory'));

        Video::create([
            'title_video' => request('title_video'),
            'video_theory' => $video_url,
            'theory_id' => request('theory_id'),
        ]);

        return redirect()->back()->with('success', 'video has been added');
    }
}
