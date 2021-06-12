<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
   <!--  <div class="user-panel">
      <div class="pull-left image"> -->
				<!-- <img src="<?php echo base_url('assets/upload/images/foto_profil/'.$this->session->userdata('photo')); ?>" class="img-circle"> -->
			<!-- </div>
      <div class="pull-left info">
        <p>Indah Syahputri</p> -->
        <!-- Status -->
        <!-- <a href="#"><i class="fa fa-circle text-danger"></i> Member</a>
      </div>
    </div> -->

    <!-- search form (Optional) -->
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

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="<?php echo base_url(); ?>member/kasmasuk/tambah"><i class="fa fa-link"></i> <span>Sumbangan</span></a></li>
      <!-- <li><a href="<?php echo base_url();?>member/kaskeluar/view_kas_keluar"><i class="fa fa-link"></i> <span>Kas Keluar</span></a></li> -->
      <li><a href="<?php echo base_url();?>auth/logout"><i class="fa fa-user"></i><span>Logout</span></a></li>
      <li class="treeview">
        <!-- <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> -->
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
