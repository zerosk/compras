@extends('theme.backoffice.layouts.admin')

@section('title','Permiso - ' . $permission->name)

@section('head')
@endsection

@section('breadcrumbs')
    {{--<li><a href="#"></a></li>--}}
    <li>Roles del sistema</li>
    <li><a href="{{ route('backoffice.role.show', $permission->role) }}">Rol: {{$permission->role->name}}</a></li>
    <li>{{ $permission->name }}</li>
@endsection
@section('dropdown_settings')
    {{--<li><a href="#!" class="grey-text text-darken-2"></a></li>--}}
    <li><a href="{{route('backoffice.permission.create')}}" class="grey-text text-darken-2">Crear permiso</a></li>

@endsection

@section('content')

<div class="section">
    <p class="caption"><strong>Permiso : </strong> {{ $permission->name }}</p>
    <div class="divider"></div>

    <div class="section">
        <div class="row">
        <div class="col s12 m8 offset-m2">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Usuarios con el permiso de {{$permission->name}}</span>


                <p><strong>Slug: </strong> {{ $permission->slug }}</p>
                <p><strong>Descripcion: </strong>{{ $permission->description }}</p>
                <p><strong>Rol: </strong>{{ $permission->role->name }}</p>
            </div>
            <div class="card-action">
                <a href="{{ route('backoffice.permission.edit', $permission) }}" >Editar</a>
                <a href="#" style="color:red" onclick="enviar_formulario()">Eliminar</a>    
            </div>
        </div>    
        </div>
        </div>
    </div>
</div>

<form method="POST" acction="{{ route('backoffice.permission.destroy', $permission) }}" name="delete_form">
    <input name="" type="hidden">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}


</form>

@endsection

@section('foot')

<script>
    function enviar_formulario(){
        Swal.fire({
            title: "¿Desas eliminar este permiso?",
            text:   "Esta accion no se puede deshacer",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, continuar',
            cancelButtonText: 'No, cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.delete_form.submit()
            } else {
                Swal.fire(
                    'Operacion cancelada',
                    'Registro no eliminado',
                    'error'
                )
             }
            })      
    }
</script>

@endsection
