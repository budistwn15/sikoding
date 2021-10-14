<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        return view('front-end.testimoni.index');
    }

    public function store()
    {
        request()->validate([
            'name' => "required",
            'email' => "required",
            'asal' => "required",
            'testimoni' => "required",
        ]);

        Testimoni::create([
            'name' => request('name'),
            'email' => request('email'),
            'asal' => request('asal'),
            'testimoni' => request('testimoni'),
        ]);

        return redirect()->back()->with('success', 'Testimoni has been addedd');
    }
}
