<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        "name", "slug", "description"
    ];


    //RELACIONES

    public function permissions()
    {
        return $this->hasMany('App\Permission');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
        
    }

    // ALMACENAMIENTO

    public function store($request)
    {
        $slug = str_slug($request->name, '-');
        //alert()->success('SuccessAlert','El rol se ha guardado')->showConfirmButton();
        toast('El rol se ha guardado','success');
        return self::create($request->all() + [ 
            'slug' => $slug,
        ]);

    }
    public function my_update($request)
    {
        $slug = str_slug($request->name, '-');
        //alert('Exito',  'El rol se ha actualizado', 'success');
        //alert()->success('SuccessAlert','El rol se ha actualizado');
        toast('El rol se ha actualizado','success');
        self::update($request->all() + [
            'slug' => $slug,
        ]);
        //return false;
    }
    //VALIDACION
    //RECUPERACION DE INF
    //OTRAS OPERACIONES 

 
}
