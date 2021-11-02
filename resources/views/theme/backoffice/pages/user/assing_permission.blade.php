@extends('theme.backoffice.layouts.admin')

@section('title', 'Asignar roles')

@section('head')
@endsection

@section('breadcrumbs')
{{--<li><a href="#"></a></li>--}}
<li><a href="{{ route('backoffice.user.index') }}">Usuarios de sistema</a></li>
<li><a href="{{ route('backoffice.user.show', $user) }}">{{$user->name}}</a></li>
<li>Asignar Permisos</li>
@endsection
@section('dropdown_settings')
{{--<li><a href="#!" class="grey-text text-darken-2"></a></li>--}}
<li><a href="{{route('backoffice.role.create')}}" class="grey-text text-darken-2">Crear rol</a></li>
@endsection


@section('content')

<div class="section">
    <p class="caption">Selecciona los permisos que deseas asignar</p>
    <div class="divider"></div>

    <div class="section">
        <div class="row">
            <div class="col s12 m8">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Agregar Permisos</span>
                        <div class="row">
                            <form class="col s12" method="post" action="{{ route('backoffice.user.permission_assingment', $user) }}">
                                {{ csrf_field() }}


                                @foreach ($roles as $role)
                                <p>{{$role->name}}</p>
                                    @foreach ($role->permissions as $permission)
                                        <p>
                                        <input type="checkbox" id="{{$permission->id}}" name="permissions[]" value="{{$permission->id}}" @if ($user->has_permission($permission->id)) checked @endif />
                                        <label for="{{$permission->id}}">{{$permission->name}}</label>
                                        </p>
                                        
                                    @endforeach
                                @endforeach

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

            <div class="col s12 m4">
                @include('theme.backoffice.pages.user.includes.user_nav')
            </div>

        </div>
    </div>
</div>

@endsection

@section('foot')
@endsection
