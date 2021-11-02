@extends('theme.backoffice.layouts.admin')

@section('title','Editar Permiso - ' . $permission->name)

@section('head')
@endsection

@section('breadcrumbs')
    {{--<li><a href="#"></a></li>--}}
    <li><a href="{{ route('backoffice.role.index') }}">Roles del sistema</a></li>
    <li><a href="{{ route('backoffice.role.show', $permission->role) }}">Rol: {{$permission->role->name}}</a></li>
    <li>Permiso: {{ $permission->name }}</li>
@endsection
@section('dropdown_settings')
    {{--<li><a href="#!" class="grey-text text-darken-2"></a></li>--}}
    <li><a href="{{route('backoffice.permission.create')}}" class="grey-text text-darken-2">Crear permiso</a></li>

@endsection


@section('content')

<div class="section">
    <p class="caption">Editar permiso {{ $permission->name }}</p>
    <div class="divider"></div>

    <div id="basic-form" class="section">
        <div class="row">
        <div class="col s12 m8 offset-m2">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Editar Rol</span>
                <div class="row">
                    <form class="col s12" method="post" action="{{ route('backoffice.permission.update', $permission) }}">

                    {{ csrf_field() }}
                    {{method_field('PUT')}}

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" type="text" name="name" value="{{$permission->name}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="name">Nombre del Permiso</label>
                            </div>
                        </div>

                        <div class="row">
                        <div class="input-field col s12">
                            <select type="select" name="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}" @if($permission->role_id == $role->id) selected="" @endif>{{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="name">Selecciona un Rol</label>
                        </div>
                    </div>
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="description" class="materialize-textarea" name="description">{{$permission->description}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="description">Descripcion del Permiso</label>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn waves-effect waves-light right" type="submit">Actualizar
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>

@endsection

@section('foot')
@endsection
