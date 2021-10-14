<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;
use Spatie\Permission\Models\Role;

class Navigation extends Component
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
        $roles = Role::get();
        return view('components.layouts.navigation', compact('roles'));
    }
}
