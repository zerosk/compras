@extends('theme.backoffice.layouts.admin')

@section('title', 'Crear usuario')

@section('head')
@endsection

@section('breadcrumbs')
    {{--<li><a href="#"></a></li>--}}
    <li><a href="{{ route('backoffice.user.index') }}">Usuarios</a></li>
    <li>Crear Usuario</li>
@endsection
@section('dropdown_settings')
    {{--<li><a href="#!" class="grey-text text-darken-2"></a></li>--}}
    <li><a href="{{route('backoffice.user.create')}}" class="grey-text text-darken-2">Crear usuario</a></li>
@endsection


@section('content')

<div class="section">
    <p class="caption">Crear un nuevo usuario.</p>
    <div class="divider"></div>

    <div class="section">
        <div class="row">
        <div class="col s12 m8 offset-m2">
        <div class="card">
            <div class="card-content">
            <span class="card-title">Crear Usuario</span>
            <div class="row">
                <form class="col s12" method="post" action="{{ route('backoffice.user.store') }}">

                {{ csrf_field() }}

                    <div class="row">
                        <div class="input-field col s12">
                            <select id="role" name="role" required>
                                <option disabled selected>-- Seleciona un Rol --</option>
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $message }}</strong>
                                </span>
                            @enderror
                            {{--<label for="name">Selecciona un rol</label> --------}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" type="text" name="name">
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
                            <input id="dob" type="date" name="dob">
                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" name="email">
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
                            <input id="password" type="password" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="password">Contraseña</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password-confirm" type="password" name="password_confirmation">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="password-confirm">Confirmar Contraseña</label>
                        </div>
                    </div>

                    <div class="row">
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light right" type="submit">Guardar
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
