<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'dob', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates =['dob'];



    //RELACIONES

    public function permissions(){
        return $this->belongsToMany("App\Permission")->withTimestamps();
    }
    public function roles() {
        
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    //Almacenamiento

    public function store($request)
    {
        /*
        $user = self::create($request->all());
        $usar->update(['password' => Hash::make($request->password)]);
        */
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'dob' => $request->dob,
            'password' => Hash::make($request->password),
        ]);

        $role = [$request->role];
        $user->role_assignment($role);
        return $user;
    }

    /*
    * Function to update in DB the objet User from $request
    */
    public function my_update($request) 
    {
        self::update($request->all());
    }

    public function role_assignment($role) {

        $roles = (is_object($role) ? $role->role : $role);
        $this->permission_mass_assignment($roles);
        $this->roles()->sync($roles);
        $this->verify_permission_integrity($roles);

    }

    //Validaciones
    public function is_admin()
    {
        $admin = config('app.admin_role');
        if($this->has_role($admin)){
            return true;
        }
        else {
            return false;
        }

    }

    public function has_role($id)
    {
        foreach ($this->roles as $role) {
            if($role->id == $id || $role->slug == $id)
                return true;
        }
        return false;
    }

    public function has_permission($id)
    {
        foreach ($this->permissions as $permission) {
            if($permission->id == $id || $permission->slug == $id)
             return true;
        }
        return false;
    }

    //RECUPERACION DE INFORMACION

    public function age()
    {
        if(!is_null($this->dob)) {
            $age = $this->dob->age;
            $years = ($age == 1 ) ? 'año' : 'años';
            $msj = $age . ' ' . $years;
        } else {
            $msj = 'indefinido';
        }
        return $msj;
    }

    //OTRAS OPERACIONES

    public function verify_permission_integrity(array $roles)
    {

        $permissions = $this->permissions;
        
        foreach ($permissions as $permission) {
            if( !in_array($permission->role->id, $roles) ){
                $this->permissions()->detach($permission->id);
            }
        }
    }

    public function permission_mass_assignment(array $roles)
    {
        foreach ($roles as $role) {
            if( !$this->has_role($role) ) {
                $role_obj = \App\Role::findorfail($role);
                $permission = $role_obj->permissions;
                $this->permissions()->syncWithoutDetaching($permission); 
            }

        }
    }


}


