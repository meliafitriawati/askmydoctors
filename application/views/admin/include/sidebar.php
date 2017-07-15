<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/admin/img/avatar5.png'); ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('nama_admin');?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> ADMINISTRATOR</a>
            </div>
        </div>
		<!-- search form
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form> -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU ADMINISTRATOR</li>
            <li>
                <a href="<?=base_url()?>admin">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
			<li class="treeview">
                <a href="<?=base_url()?>admin/dokter">
                    <i class="fa fa-users"></i> <span>Dokter</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?=base_url()?>admin/spesialisasi">
                    <i class="fa fa-suitcase"></i> <span>Spesialisasi</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?=base_url()?>admin/pasien">
                    <i class="fa fa-user"></i> <span>Pasien</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?=base_url()?>admin/artikel">
                    <i class="fa fa-file"></i> <span>Artikel</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?=base_url()?>admin/pertanyaan">
                    <i class="fa fa-question"></i> <span>Pertanyaan</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>