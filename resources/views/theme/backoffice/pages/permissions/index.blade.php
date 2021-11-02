@extends('theme.backoffice.layouts.admin')

@section('title','Permisos del sistema')

@section('head')
@endsection

@section('breadcrumbs')
    {{--<li><a href="#"></a></li>--}}
    <li><a href="{{ route('backoffice.permission.index') }}">Permisos</a></li>
@endsection
@section('dropdown_settings')
    {{--<li><a href="#!" class="grey-text text-darken-2"></a></li>--}}
    <li><a href="{{route('backoffice.permission.create')}}" class="grey-text text-darken-2">Crear Permiso</a></li>

@endsection

@section('content')

<div class="section">
    <p class="caption"><strong>Permnisos</strong></p>
    <div class="divider"></div>

    <div id="basic-form" class="section">
        <div class="row">
        <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h4 class="header2">Lista de Permisos</h4>
                
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td><a href="{{ route('backoffice.permission.show', $permission) }}"> {{ $permission->name }}</a></td>
                            <td>{{ $permission->slug }}</td>
                            <td>{{ $permission->description }}</td>
                            <td><a href="{{ route('backoffice.permission.edit', $permission) }}" >Editar </a></td>  
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                
            </div>
        </div>
        </div>
        </div>
    </div>
</div>



@endsection

@section('foot')
@endsection
