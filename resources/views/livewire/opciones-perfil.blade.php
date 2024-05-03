<div>
    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="d-none d-md-block dropdown-toggle ps-2">{{ $name }}</span>
    </a>
    <!-- Opciones -->
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header"> <!-- Nombre y Rol -->
            <h6>{{ $name }}</h6>
            <span>{{ $role }}</span>
        </li>
        <li> <!-- Divisor -->
            <hr class="dropdown-divider">
        </li>
        <li> <!-- Ver perfil -->
            <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.show') }}"> <!-- show.blade.php -->
                <i class="bi bi-person"></i>
                <span>Ver perfil</span>
            </a>
        </li>
        <li> <!-- Divisor -->
            <hr class="dropdown-divider">
        </li>
        <li> <!-- Cerrar Sesión -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item d-flex align-items-center">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Cerrar sesión</span>
                </button>
            </form>
        </li>
    </ul>
</div>