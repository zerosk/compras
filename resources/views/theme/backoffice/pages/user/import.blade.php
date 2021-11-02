@extends('theme.backoffice.layouts.admin')

@section('title', '>Importar ususarios')

@section('head')
@endsection

@section('breadcrumbs')
    {{--<li><a href="#"></a></li>--}}
    <li><a href="{{ route('backoffice.user.index') }}">Usuarios</a></li>
    <li>Crear Usuario</li>
@endsection
@section('dropdown_settings')
    {{--<li><a href="#!" class="grey-text text-darken-2"></a></li>--}}
    <li><a href="{{route('backoffice.user.create')}}" class="grey-text text-darken-2">Importar Usuarios</a></li>
@endsection


@section('content')

<div class="section">
    <p class="caption">importar usuarios.</p>
    <div class="divider"></div>

    <div class="section">
        <div class="row">
        <div class="col s12 m8 offset-m2">
        <div class="card">
            <div class="card-content">
            <span class="card-title">Crear Usuario</span>
            <div class="row">
                <form class="col s12" method="post" action="{{ route('backoffice.user.make_import') }}" enctype="multipart/form-data">

                {{ csrf_field() }}


                    <div class="row">
                        <div class="file-field col s12">
                            <div class="btn">
                                <span>Importar Usuarios</span>
                                <input type="file" name="excel">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                            
                            @error('excel')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light right" type="submit">Importar
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
