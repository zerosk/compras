@extends('theme.backoffice.layouts.admin')

@section('title','User - ' . $user->name)

@section('head')
@endsection

@section('breadcrumbs')
    {{--<li><a href="#"></a></li>--}}
    <li><a href="{{ route('backoffice.user.index') }}">Usuarios del sistema</a></li>
    <li>{{ $user->name }}</li>
@endsection
@section('dropdown_settings')
    {{--<li><a href="#!" class="grey-text text-darken-2"></a></li>--}}
    <li><a href="{{route('backoffice.user.edit', $user)}}" class="grey-text text-darken-2">Editar usuario</a></li>
@endsection

@section('content')

<div class="section">
    <p class="caption"><strong>usuario : </strong> {{ $user->name }}</p>
    <p><strong>Edad: </strong> {{$user->age()}}</p> 
    <div class="divider"></div>

    <div class="section">
        <div class="row">
            <div class="col s12 m8">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">{{$user->name}}</span>
                        <h4>Roles: </h4>
                        <ul>
                        @foreach ($user->roles as $role)
                            <li>{{$role->name}}</li>
                        @endforeach
                        </ul>


                    </div>
                    <div class="card-action">
                        <a href="{{ route('backoffice.user.edit', $user) }}" >Editar</a>
                        <a href="#" style="color:red" onclick="enviar_formulario()">Eliminar</a>
                    
                    </div>
                </div>    
            </div>

            <div class="col s12 m4">
                @include('theme.backoffice.pages.user.includes.user_nav')
            </div>
        </div>

    </div>
</div>

<form method="POST" acction="{{ route('backoffice.user.destroy', $user) }}" name="delete_form">
    <input name="" type="hidden">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}


</form>

@endsection

@section('foot')

<script>
    function enviar_formulario(){
        Swal.fire({
            title: "¿Desas eliminar este usuario?",
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
