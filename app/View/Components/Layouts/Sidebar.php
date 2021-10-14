<?php

namespace App\View\Components\Layouts;

use App\Models\Navigation;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $navigations = Navigation::with('children')->where('url', null)->get();
        return view('components.layouts.sidebar', compact('navigations'));
    }
}
