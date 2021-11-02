@extends('theme.backoffice.layouts.admin')

@section('title', 'Crear rol')

@section('head')
@endsection

@section('breadcrumbs')
    {{--<li><a href="#"></a></li>--}}
    <li><a href="{{ route('backoffice.role.index') }}">Roles de sistema</a></li>
    <li>Crear Rol</li>
@endsection
@section('dropdown_settings')
    {{--<li><a href="#!" class="grey-text text-darken-2"></a></li>--}}
    <li><a href="{{route('backoffice.role.create')}}" class="grey-text text-darken-2">Crear rol</a></li>
@endsection


@section('content')

<div class="section">
    <p class="caption">Crear un nuevo Rol.</p>
    <div class="divider"></div>

    <div class="section">
        <div class="row">
        <div class="col s12 m8 offset-m2">
        <div class="card">
            <div class="card-content">
            <span class="card-title">Crear Rol</span>
            <div class="row">
                <form class="col s12" method="post" action="{{ route('backoffice.role.store') }}">

                {{ csrf_field() }}

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" type="text" name="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="name">Nombre del Rol</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="description" class="materialize-textarea" name="description"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="description">Descripcion del Rol</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light right" type="submit">Guardar
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
