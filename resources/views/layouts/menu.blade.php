<!-- need to remove -->
<div class="nav-item">
    <a href="{{ route('home') }}" class="nav-link ">
        <i class="nav-icon fas fa-home"></i>
        <p>Inicio</p>
    </a>
</div>

<div class="nav-item">
    <a href="{{route('home')}}" class="nav-link">
        <span class="nav-icon fas fa-user" ></span>
        <p>Perfiles</p>
    </a>
</div>



@if(is_employeer())
<div class="nav-item">
    <a href="{{ route('select_name') }}" class="nav-link">
        <span class="nav-icon fas fa-users"></span>
        <p>Usuarios</p>
    </a>
</div>
@endif
