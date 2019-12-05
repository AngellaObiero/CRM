<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($message = null)
    {
        //
        $permissions=Permission::all();
        return view('permissions.index',compact("permissions",'message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("permissions.create");
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
        $permission= new Permission();
        $permission->name=$request->name;
        $permission->description=$request->description;
        $permission->save();
        // flash("Permission '{$permission->name}' saved successfully");
        return redirect('permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $permission=Permission::find($id);
         return view("permissions.edit",compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $permission=Permission::find($id);
        $permission->name=$request->name;
        $permission->description=$request->description;
        $permission->update();
        // flash("Permission '{$permission->name}' updated successfully");
        return redirect('permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $permission=Permission::find($id);
        $permission->roles()->sync([]);
        $name=$permission->name;
        $permission->delete();
        // flash("Permission '{$permission->name}' has been deleted");
        return redirect('permissions');
    }
}
