<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel">
      < <div class="pull-left image">
				<img src="<?php echo base_url('assets/upload/images/foto_profil/'.$this->session->userdata('photo')); ?>" class="img-circle">
			</div> 
      <div class="pull-left info">
        <p>Indah Syahputri</p> -->
        <!-- Status -->
        <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div> -->

    <!-- search form (Optional) -->
    <form action="<?php echo base_url();?>admin/kasmasuk/search_kas_masuk" method="post" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="cari_kas" class="form-control" placeholder="Search...">
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
      <li class="active"><a href="<?php echo base_url();?>admin/anggota/view_anggota"><i class="fa fa-link"></i> <span>Data Anggota</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Sumbangan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url();?>admin/kasmasuk/view_kas_masuk">Data Sumbangan</a></li>
          <!-- <li><a href="<?php //echo base_url();?>admin/Transaksi">Laporan Sumbangan</a></li> -->
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Kirim Struk</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url();?>admin/Sendemail/kirimemail">Pengiriman Struk</a></li>
         
        </ul>
      </li>
      <li><a href="<?php echo base_url();?>auth/logout"><i class="fa fa-user"></i><span>Logout</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
