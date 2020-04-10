<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Role::all();
        return Role::with('users')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Role::firstOrCreate($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Role::with('users')->findOrFail($id);
    }

    public function users()
    {
        return Role::with('users')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
       $exist = Role::finfOrFail($id);
        return $exist->update($req->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $exist = Role::finfOrFail($id);
        return $exist->delete();
    }

    public function setUserRole($req){
        $exist_user = User::finfOrFail($id->user_id);
        $exist_role = Role::finfOrFail($req->role_id);

        $exist_user->roles()->sync($exist_role);
        return;
    }
     public function removeUserRole($req){
        $exist_user = User::finfOrFail($id->user_id);
        $exist_role = Role::finfOrFail($req->role_id);

        $exist_user->roles()->detach($exist_role);
        return;
    }
}
