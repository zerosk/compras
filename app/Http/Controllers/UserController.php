<?php

namespace App\Http\Controllers;
use App\User;


use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('theme.backoffice.pages.user.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.backoffice.pages.user.create', [
            'roles' => \App\Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = new User;
        $user->store($request);

        toast('Se han asignado los roles','success')->buttonsStyling(false);
        return redirect()->route('backoffice.user.show', $user);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('theme.backoffice.pages.user.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('theme.backoffice.pages.user.edit',[
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user->my_update($request);
        
        toast('Se han actualizado los datos correctamente','success')->buttonsStyling(false);
        return redirect()->route('backoffice.user.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        toast("Se eliminado el usuario {$user->name} ." ,'success');
        return redirect()->route('backoffice.user.index');
    }

    /**
     * Mostrar formulario para asignar rol
     * 
     */

    public function assing_role(User $user)
    {
        return view('theme.backoffice.pages.user.assing_role', [
            'user' => $user,
            'roles' => \App\role::all(),
        ]);

    }
    
    /**
     * Asignar los roles en la base de datos
     * 
     */
    public function role_assignment(Request $request, User $user)
    {
        
        $user->role_assignment($request);
        toast('Se han asignado los roles','success')->buttonsStyling(false);
        return redirect()->route('backoffice.user.show', $user);

    }

    /**
     * Mostrar formulario para asignar permisos
     * 
     */
    public function assing_permission(User $user)
    {
        return view('theme.backoffice.pages.user.assing_permission', [
            'user' => $user,
            'roles' => $user->roles,
        ]);

    }
    public function permission_assignment(Request $request, User $user)
    {
        //dd($request->permission);
        $user->permissions()->sync($request->permissions);
        toast('Se han asignado los permisos', 'success');
        return redirect()->route('backoffice.user.show', $user);

    }

    public function import()
    {
        return view('theme.backoffice.pages.user.import');
    }

    public function make_import(Request $request)
    {
        Excel::import(new UsersImport, $request->file('excel'));
        return redirect()->route('backoffice.user.index');
        
    }
}
