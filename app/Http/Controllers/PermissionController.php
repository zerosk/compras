<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Http\Requests\Permission\StoreRequest;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('theme.backoffice.pages.permissions.index', [
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('theme.backoffice.pages.permissions.create', [
            'roles' => \App\Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Permission $permission)
    {
        $permission->store($request);
        return redirect()->route('backoffice.permission.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('theme.backoffice.pages.permissions.show', [
            'permission' => $permission,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $roles = \App\Role::All();
        return view('theme.backoffice.pages.permissions.edit', [
            'permission' => $permission,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->my_update($request);
        return redirect()->route('backoffice.permission.show', $permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete($permission);
        toast('El permiso se ha eliminado','success')->buttonsStyling(false)->autoClose(50000);
        return redirect()->route('backoffice.permission.index');
    }
}
