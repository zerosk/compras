@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar usuario' . $user->name)

@section('head')
@endsection

@section('breadcrumbs')
    {{--<li><a href="#"></a></li>--}}
    <li><a href="{{ route('backoffice.user.index') }}">Usuarios</a></li>
    <li>Editar Usuario</li>
    <li>{{$user->name}}</li>
@endsection
@section('dropdown_settings')
    {{--<li><a href="#!" class="grey-text text-darken-2"></a></li>--}}
    <li><a href="{{route('backoffice.user.create')}}" class="grey-text text-darken-2">Crear usuario</a></li>
@endsection


@section('content')

<div class="section">
    <p class="caption">Editar usuario.</p>
    <div class="divider"></div>

    <div class="section">
        <div class="row">
        <div class="col s12 m8 offset-m2">
        <div class="card">
            <div class="card-content">
            <span class="card-title"></span>
            <div class="row">
                <form class="col s12" method="post" action="{{ route('backoffice.user.update', $user) }}">

                {{ csrf_field() }}
                {{method_field('PUT')}}

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" type="text" name="name" value="{{$user->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="name">Nombre de Usuario</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="dob" type="date" name="dob" value="{{$user->dob}}">
                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" name="email" value="{{$user->email}}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="email">Correo Electronico</label>
                        </div>
                    </div>

                    <div class="row">
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light right" type="submit">Actualizar
                                    <i class="material-icons right">send</i>
                                </button>
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
