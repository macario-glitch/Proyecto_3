<div>
    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item"> <!-- Principal -->
                <a class="nav-link {{ request()->routeIs('inicio') ? '' : 'collapsed' }}" href="/inicio">
                    <i class="bi bi-cake2-fill"></i>
                    <span>Página Principal</span>
                </a>
            </li>

            <li class="nav-item"> <!-- Pedidos -->
                <a class="nav-link {{ request()->routeIs('pedidos.*') ? '' : 'collapsed' }}" href="/pedidos">
                    <i class="bi bi-bag-fill"></i>
                    <span>Pedidos</span>
                </a>
            </li>

            <li class="nav-item"> <!-- Quejas -->
                <a class="nav-link {{ request()->routeIs('quejas.index') ? '' : 'collapsed' }}" href="/quejas">
                    <i class="bi bi-envelope-arrow-up"></i>
                    <span>Quejas</span>
                </a>
            </li>

            <!-- Opciones para administrador -->

            @if (auth()->user() && auth()->user()->role == 'Admin') <!-- Solo se mostrarán las opciones si está autenticado y su rol es ADMIN -->
            <hr />
            <li class="nav-item"> <!-- Usuarios -->
                <a class="nav-link {{ request()->routeIs('user.index') ? '' : 'collapsed' }}" href="/user">
                    <i class="bi bi-emoji-grin-fill"></i>
                    <span>Clientes</span>
                </a>
            </li>

            <li class="nav-item"> <!-- Pedidos -->
                <a class="nav-link {{ request()->routeIs('pedidos.index') ? '' : 'collapsed' }}" href="/pedidos">
                    <i class="bi bi-pci-card"></i>
                    <span>Pedidos-Info</span>
                </a>
            </li>

            <li class="nav-item"> <!-- Productos -->
                <a class="nav-link {{ request()->routeIs('productos.index') ? '' : 'collapsed' }}" href="/productos">
                    <i class="bi bi-clipboard"></i>
                    <span>Productos</span>
                </a>
            </li>
            @endif
        </ul>
    </aside>
</div>