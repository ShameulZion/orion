<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('role.index');
        $data['roles'] = Role::withCount('permissions')->latest()->get();
        return view('admin.role.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('role.create');
        $data['modules'] = Module::get();
        return view('admin.role.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('role.create');
        $request->validate([
            'name' => 'required|unique:roles|max:255',
            'permissions.*' => 'integer',
            'permissions' => 'required|array',
        ]);
        Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ])->permissions()->sync($request->input('permissions', []));
        notify()->success('Role Successfully Added.', 'Added');
        return redirect()->route('role.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('role.edit');
        $modules = Module::get();
        return view('admin.role.form')->with(compact('role','modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        Gate::authorize('role.edit');
        $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
            'permissions.*' => 'integer',
            'permissions' => 'required|array',
        ]);

        $role->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        $role->permissions()->sync($request->input('permissions', []));
        notify()->success('Role Successfully Updated.', 'Updated');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Gate::authorize('role.destroy');
        if ($role->deletable) {
            $role->delete();
            notify()->success("Role Successfully Deleted", "Deleted");
        } else {
            notify()->error("You can\'t delete system role.", "Error");
        }
        return back();
    }
}
