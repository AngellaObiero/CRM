<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($message=null)
    {
        //
        $roles=Role::all();
      return view('roles.index',compact("roles",'message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions=Permission::all();
        return view("roles.create",compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $role= new Role();
        $role->name=$request->name;
        $role->description=$request->description;
        $role->landing_page=$request->landing_page;
        $role->save();
        $role->permissions()->sync($request->permission_id);
        // flash("New role '{$role->name}' saved successfully");
        return redirect('roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $permissions=Permission::all();
        $role=Role::find($id);
        return view("roles.edit",compact('role','permissions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $role=Role::find($id);
        $role->name=$request->name;
        $role->description=$request->description;
        $role->landing_page=$request->landing_page;
        $role->update();
        $role->permissions()->sync($request->permission_id);
        // var_dump($request->permission_id);
        // flash("Role '{$role->name}' updated successfully");
        return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $role=Role::find($id);
        $role->permissions()->sync([]);
        $name=$role->name;
        $role->delete();
        // flash("Role '{$role->name}' has been deleted");
        return redirect('roles');
    }
}
