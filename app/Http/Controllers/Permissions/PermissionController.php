<?php

namespace App\Http\Controllers\Permissions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        $permission = new Permission;
        return view('permission.permissions.index', compact('permissions', 'permission'));
    }

    public function store()
    {

        request()->validate([
            'name' => 'required'
        ]);

        Permission::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        return back();
    }

    public function edit(Permission $permission)
    {
        return view('permission.permissions.edit', [
            'permission' => $permission,
            'submit' => 'Update'
        ]);
    }

    public function update(Permission $permission)
    {
        request()->validate([
            'name' => 'required'
        ]);

        $permission->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        return redirect()->route('permissions.index');
    }

    public function delete(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index');
    }
}
