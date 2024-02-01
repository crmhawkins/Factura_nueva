<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{asset('assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item active ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-title">Empresa</li>

                <li class="sidebar-item  ">
                    <a href="{{route('users.index')}}" class='sidebar-link'>
                        <i class="fa-solid fa-user-group"></i>
                        <span>Usuarios</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="{{route('clientes.index')}}" class='sidebar-link'>
                        <i class="fa-solid fa-people-group"></i>
                        <span>Clientes</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="{{route('presupuestos.index')}}" class='sidebar-link'>
                        <i class="fa-solid fa-file-invoice-dollar fs-5"></i>
                        <span>Presupuestos</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="{{route('campania.index')}}" class='sidebar-link'>
                        <i class="fa-solid fa-diagram-project fs-5"></i>
                        <span>Campañas</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
