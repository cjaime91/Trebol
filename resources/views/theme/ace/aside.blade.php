<div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed compact">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {}
    </script>
    <ul class="nav nav-list">
        <li class="{{ !Route::is('home') ?: 'active' }} hover">
            <a href="{{ route('home') }}">
                <i class="menu-icon fa-solid fa-gauge-simple"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ !Route::is('facturas') ?: 'active' }}  hover">
            <a href="{{ route('facturas') }}">
                <i class="menu-icon fa-solid fa-file-invoice-dollar"></i>
                <span class="menu-text"> Facturas </span>
                <b class="arrow fa fa-angle-down"></b>
            </a><b class="arrow"></b>
        </li>
        <li class="{{ !Route::is('proveedores') ?: 'active' }} hover">
            <a href="{{ route('proveedores') }}">
                <i class="menu-icon fa-solid fa-user-group"></i>
                <span class="menu-text"> Proveedores </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ !Route::is('Reportes') ?: 'active' }} hover">
            <a href="{{ route('Reportes') }}">
                <i class="menu-icon fa-solid fa-chart-pie"></i>
                <span class="menu-text"> Reportes </span>
            </a>
            <b class="arrow"></b>
        </li>
    </ul><!-- /.nav-list -->
</div>
