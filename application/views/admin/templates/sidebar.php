<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">DATA MASTER</li>
        <li class="treeview">
          <a href="<?php echo base_url('admin/dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Kelola Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="<?php echo base_url('admin/barang') ?>"><i class="fa fa-table"></i> <span>Data Barang</span></a></li>
            <li><a href="<?php echo base_url('admin/masuk') ?>"><i class="fa fa-cart-plus"></i> Barang Masuk</a></li>
            <li><a href="<?php echo base_url('admin/keluar') ?>"><i class="fa fa-file"></i> Barang Keluar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url('admin/toko') ?>">
            <i class="fa fa-home"></i> <span>Kelola Toko</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url('admin/profil') ?>">
            <i class="fa fa-user"></i> <span>Profil</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url('welcome/logout') ?>">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
