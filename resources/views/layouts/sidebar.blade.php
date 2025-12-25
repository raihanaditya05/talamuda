<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Tala Muda</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

        <!-- Dashboard -->
        <li class="nav-item has-treeview menu-open">
          <a href="{{ route('dashboard.index') }}" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <!-- Submenu Dashboard -->
          <ul class="nav nav-treeview">
            <!-- Statistik Proyek -->
<li class="nav-item">
    <a href="{{ route('statistik.index') }}" class="nav-link">
        <i class="nav-icon fas fa-chart-line"></i>
        <p>Statistik Proyek</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('proyek.index') }}" class="nav-link">
        <i class="fas fa-building nav-icon"></i>
        <p>Data Proyek</p>
    </a>
</li>


<!-- Progres Proyek -->
<li class="nav-item">
    <a href="{{ route('progress.pilih') }}" class="nav-link">
        <i class="fas fa-tasks nav-icon"></i>
        <p>Progres Proyek</p>
    </a>
</li>


            <!-- Laporan Mingguan -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-file-alt nav-icon"></i>
                <p>Laporan Mingguan</p>
              </a>
            </li>

            <!-- Pengawasan Bahan -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-cubes nav-icon"></i>
                <p>Pengawasan Bahan</p>
              </a>
            </li>


          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>
