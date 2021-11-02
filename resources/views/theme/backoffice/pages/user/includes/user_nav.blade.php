               
<div class="collection">
    {{--<a href="#!" class="collection-item active">Alvin</a> --}}
    <a href="#!" class="collection-item active">Menu</a>
    <a href="{{ route('backoffice.user.assing_role', $user) }}" class="collection-item">Asignar rol</a>
    <a href="{{ route('backoffice.user.assing_permission', $user) }}" class="collection-item">Asignar permisos</a>

</div>