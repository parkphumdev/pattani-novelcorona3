
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="/" class="brand-link">
    <img src="{{ URL::asset('tyd_logo.png') }}"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{ URL::asset('admin-lte/dist/img/'.session('user_id').'.png') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">{{session('name') != NULL ? session('name') : ''}}</a>
    </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php
            $role = session('role') != NULL ? session('role') : NULL;
        ?>
        <?php if(in_array($role, [3])) { ?>
        <li class="nav-header">Novelcorona</li>
        <li class="nav-item">
            <a href="/p3atk" class="nav-link">
                <i class="nav-icon fas fa-flask text-success"></i>
                <p>Novelcorona 3</p>
            </a>
        </li>
        <?php } ?>
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>