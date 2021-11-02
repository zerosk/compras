<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $fillable =[
        "name", "slug", "description", "role_id",
    ];

    //RELACIONES

       
       public function users(){
           return $this->belongsToMany("App\User")->withTimestamps();;
       }

       public function role()
       {
           return $this->belongsTo('App\Role');
           
       }


    //ALMACENAMIENTO

    public function store($request)
    {
        $slug = str_slug($request->name, '-');
        toast('El permiso se ha guardado','success');
        return self::create($request->all() + [ 
            'slug' => $slug,
        ]);

    }

    public function my_update($request)
    {
        $slug = str_slug($request->name, '-');
        toast('El Permiso se ha actualizado','success');
        self::update($request->all() + [
            'slug' => $slug,
        ]);
    }

    //VALIDACION

    //RECUPERACION DE INFORMACION

    //OTRAS OPERACIONES

}
