<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="/dashboard"><img src={{ asset('assets/images/logo/logo.png') }} alt="Logo" srcset="" style="width: 200px"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill fs-5"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-title">Empresa</li>

                @php
                    $clientesActive = request()->routeIs('clientes.index') || request()->routeIs('clientes.create') || request()->routeIs('clientes.show') || request()->routeIs('cliente.createFromBudget') || request()->routeIs('clientes.edit');
                    $presupuestoActive = request()->routeIs('presupuestos.index') || request()->routeIs('presupuesto.create') || request()->routeIs('presupuesto.show');
                    $dominiosActive = request()->routeIs('dominios.index') || request()->routeIs('dominios.create') || request()->routeIs('dominios.edit');
                    $projectActive = request()->routeIs('campania.*') ;
                    $servicesActive = request()->routeIs('servicios.*') || request()->routeIs('serviciosCategoria.*');
                    $peticionesActive = request()->routeIs('peticion.*');
                    $personalActive = request()->routeIs('users.*') ;
                    $tareaActive = request()->routeIs('tareas.*') ;
                    $vacacionesActive = request()->routeIs('holiday.admin.*') ;
                    $nominasActive = request()->routeIs('nominas.*') ;
                    $contratosActive = request()->routeIs('contratos.*') ;
                    $poveedoresActive= request()->routeIs('proveedores.*');
                    $actasActive= request()->routeIs('reunion.*');
                    $cargoActive= request()->routeIs('cargo.*');
                    $departamentoActive= request()->routeIs('departamento.*');
                    $tesoreriaActive = request()->routeIs('ingresos.*') || request()->routeIs('gastos.*') || request()->routeIs('gasto-asociado.*') || request()->routeIs('gasto-sin-clasificar.*');
                @endphp

                <li class="sidebar-item has-sub {{ $clientesActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-people-group fs-5"></i>
                        <span>Clientes</span>
                    </a>
                    <ul class="submenu" style="{{ $clientesActive ? 'display:block;' : 'display:none' }}">
                        <li class="submenu-item {{ request()->routeIs('clientes.index') ? 'active' : '' }} ">
                            <a href="{{route('clientes.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver todos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('clientes.create') ? 'active' : '' }} {{ request()->routeIs('cliente.createFromBudget') ? 'active' : ''}}">
                            <a href="{{route('clientes.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Crear cliente
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub {{ $presupuestoActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-file-invoice-dollar fs-5"></i>

                        <span>Presupuestos</span>
                    </a>
                    <ul class="submenu" style="{{ $presupuestoActive ? 'display:block;' : 'display:none;' }}">
                        <li class="submenu-item {{ request()->routeIs('presupuestos.index') ? 'active' : '' }}">
                            <a href="{{route('presupuestos.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver todos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('presupuesto.create') ? 'active' : '' }}">
                            <a href="{{route('presupuesto.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Crear presupuesto
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub {{ $peticionesActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-clipboard fs-5"></i>
                        <span>Peticiones</span>
                    </a>
                    <ul class="submenu" style="{{ $peticionesActive ? 'display:block;' : 'display:none;' }}">
                        <li class="submenu-item {{ request()->routeIs('peticion.index') ? 'active' : '' }}">
                            <a href="{{route('peticion.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver todos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('peticion.create') ? 'active' : '' }}">
                            <a href="{{route('peticion.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Crear petición
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ request()->routeIs('facturas.index') ? 'active' : '' }}">
                    <a href="{{route('facturas.index')}}" class='sidebar-link'>
                        <i class="fa-solid fa-file-invoice-dollar fs-5"></i>
                        <span>Facturas</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub {{ $projectActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-diagram-project fs-5"></i>
                        <span>Campañas</span>
                    </a>
                    <ul class="submenu" style="{{ $projectActive ? 'display:block;' : 'display:none;' }}">
                        <li class="submenu-item {{ request()->routeIs('campania.index') ? 'active' : '' }}">
                            <a href="{{route('campania.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver todos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('campania.create') ? 'active' : '' }}">
                            <a href="{{route('campania.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Crear campaña
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub {{ $servicesActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-sliders fs-5"></i>
                        <span>Servicios</span>
                    </a>
                    <ul class="submenu" style="{{ $servicesActive ? 'display:block;' : 'display:none;' }}">
                        <li class="submenu-item {{ request()->routeIs('servicios.index') ? 'active' : '' }}">
                            <a href="{{route('servicios.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver todos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('servicios.create') ? 'active' : '' }}">
                            <a href="{{route('servicios.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Crear servicio
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('serviciosCategoria.index') ? 'active' : '' }}">
                            <a href="{{route('serviciosCategoria.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver Categorias
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('serviciosCategoria.create') ? 'active' : '' }}">
                            <a href="{{route('serviciosCategoria.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Crear categoria de servicio
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub {{ $tareaActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-list-check fs-5"></i>
                        <span>Tareas</span>
                    </a>
                    <ul class="submenu" style="{{ $tareaActive ? 'display:block;' : 'display:none;' }}">
                        <li class="submenu-item {{ request()->routeIs('tareas.index') ? 'active' : '' }}">
                            <a href="{{route('tareas.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver todos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('tareas.asignar') ? 'active' : '' }}">
                            <a href="{{route('tareas.asignar')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Por Asignar
                                </span>
                            </a>
                        </li>
                        {{-- <li class="submenu-item {{ request()->routeIs('tareas.cola') ? 'active' : '' }}">
                            <a href="{{route('tareas.cola')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    En Cola
                                </span>
                            </a>
                        </li> --}}
                        <li class="submenu-item {{ request()->routeIs('tareas.revision') ? 'active' : '' }}">
                            <a href="{{route('tareas.revision')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    En Revisión
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub {{ $departamentoActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-user-group fs-5"></i>
                        <span>Departamentos</span>
                    </a>
                    <ul class="submenu" style="{{ $departamentoActive ? 'display:block;' : 'display:none;' }}">
                        <li class="submenu-item {{ request()->routeIs('departamento.index') ? 'active' : '' }}">
                            <a href="{{route('departamento.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver todos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('departamento.create') ? 'active' : '' }}">
                            <a href="{{route('departamento.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Crear departamento
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub {{ $cargoActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-user-group fs-5"></i>
                        <span>Cargos</span>
                    </a>
                    <ul class="submenu" style="{{ $cargoActive ? 'display:block;' : 'display:none;' }}">
                        <li class="submenu-item {{ request()->routeIs('cargo.index') ? 'active' : '' }}">
                            <a href="{{route('cargo.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver todos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('cargo.create') ? 'active' : '' }}">
                            <a href="{{route('cargo.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Crear cargo
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub {{ $personalActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-user-group fs-5"></i>
                        <span>Personal</span>
                    </a>
                    <ul class="submenu" style="{{ $personalActive ? 'display:block;' : 'display:none;' }}">
                        <li class="submenu-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                            <a href="{{route('users.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver todos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('users.create') ? 'active' : '' }}">
                            <a href="{{route('users.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Crear usuario
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub {{ $dominiosActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-globe fs-5"></i>
                        <span>Dominios</span>
                    </a>
                    <ul class="submenu" style="{{ $dominiosActive ? 'display:block;' : 'display:none;' }}">
                        <li class="submenu-item {{ request()->routeIs('dominios.index') ? 'active' : '' }}">
                            <a href="{{route('dominios.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver todos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('dominios.create') ? 'active' : '' }}">
                            <a href="{{route('dominios.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Crear domino
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub {{ $contratosActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-file-invoice fs-5"></i>
                            <span>Contratos</span>
                    </a>
                    <ul class="submenu" style="{{ $contratosActive ? 'display:block;' : 'display:none;' }}">
                        <li class="submenu-item {{ request()->routeIs('contratos.index') ? 'active' : '' }}">
                            <a href="{{route('contratos.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver todos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('contratos.create') ? 'active' : '' }}">
                            <a href="{{route('contratos.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Crear contrato
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub {{ $nominasActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-file-invoice-dollar fs-5"></i>
                        <span>Nominas</span>
                    </a>
                    <ul class="submenu" style="{{ $nominasActive ? 'display:block;' : 'display:none;' }}">
                        <li class="submenu-item {{ request()->routeIs('nominas.index') ? 'active' : '' }}">
                            <a href="{{route('nominas.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver todos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('nominas.create') ? 'active' : '' }}">
                            <a href="{{route('nominas.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Crear nomina
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub {{ $poveedoresActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-user-tie fs-5"></i>
                        <span>Proveedores</span>
                    </a>
                    <ul class="submenu" style="{{ $poveedoresActive ? 'display:block;' : 'display:none;' }}">
                        <li class="submenu-item {{ request()->routeIs('proveedores.index') ? 'active' : '' }}">
                            <a href="{{route('proveedores.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver todos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('proveedores.create') ? 'active' : '' }}">
                            <a href="{{route('proveedores.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Crear nuevo
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub {{ $actasActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-address-book fs-5"></i>
                        <span>Actas de reunion</span>
                    </a>
                    <ul class="submenu" style="{{ $actasActive ? 'display:block;' : 'display:none;' }}">
                        <li class="submenu-item {{ request()->routeIs('reunion.index') ? 'active' : '' }}">
                            <a href="{{route('reunion.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver todos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('reunion.create') ? 'active' : '' }}">
                            <a href="{{route('reunion.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Crear nuevo
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub {{ $vacacionesActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-umbrella-beach fs-5"></i>
                        <span>Vacaciones</span>
                    </a>
                    <ul class="submenu" style="{{ $vacacionesActive ? 'display:block;' : 'display:none;' }}">
                        <li class="submenu-item {{ request()->routeIs('holiday.admin.petitions') ? 'active' : '' }}">
                            <a href="{{route('holiday.admin.petitions')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Gestinar
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="sidebar-item has-sub {{ $tesoreriaActive ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-coins fs-5"></i>
                        <span>Tesorería</span>
                    </a>
                    <ul class="submenu" style="{{ $tesoreriaActive ? 'display:block;' : 'display:none;' }}">
                        <li class="submenu-item {{ request()->routeIs('ingresos.index') ? 'active' : '' }}">
                            <a href="{{route('ingresos.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver Ingresos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('ingreso.create') ? 'active' : '' }}">
                            <a href="{{route('ingreso.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Añadir Ingreso
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('gastos.index') ? 'active' : '' }}">
                            <a href="{{route('gastos.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver Gastos
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('gasto.create') ? 'active' : '' }}">
                            <a href="{{route('gasto.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Añadir Gasto
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('gastos-asociados.index') ? 'active' : '' }}">
                            <a href="{{route('gastos-asociados.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver Gastos Asociados
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('gasto-asociado.create') ? 'active' : '' }}">
                            <a href="{{route('gasto-asociado.create')}}">
                                <i class="fa-solid fa-plus"></i>
                                <span>
                                    Añadir Gasto Asociado
                                </span>
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('gastos-sin-clasificar.index') ? 'active' : '' }}">
                            <a href="{{route('gastos-sin-clasificar.index')}}">
                                <i class="fa-solid fa-list"></i>
                                <span>
                                    Ver Gastos Sin Clasificar
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ request()->routeIs('configuracion.index') ? 'active' : '' }}">
                    <a href="{{route('configuracion.index')}}" class='sidebar-link'>
                        <i class="fa-solid fa-gears fs-5"></i>
                        <span>Cofiguracion</span>
                    </a>
                </li>
            </ul>
        </div>
        {{-- <button class="sidebar-toggler btn x"><i data-feather="x"></i></button> --}}
    </div>
</div>
