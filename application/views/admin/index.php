<?php include_once('include/head.php');?>
    <body class="skin-red">
        <div class="wrapper">
            <?php
            include_once('include/header.php');
            include_once('include/sidebar.php');
            ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <?php
                                        $this->db->like('username');
                                        $this->db->from('tb_user');
                                        echo "<h3>".$this->db->count_all_results()."</h3>";
                                    ?>
                                    <p>Jumlah Pengguna</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div style="height:20px;padding:5px;"></div>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <?php
                                        $this->db->like('username');
                                        $this->db->from('tb_dokter');
                                        echo "<h3>".$this->db->count_all_results()."</h3>";
                                    ?>
                                    <p>Jumlah Dokter</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div style="height:20px;padding:5px;"></div>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="small-box bg-orange">
                                <div class="inner">
                                    <?php
                                        $this->db->like('id_diskusi');
                                        $this->db->from('tb_diskusi');
                                        echo "<h3>".$this->db->count_all_results()."</h3>";
                                    ?>
                                    <p>Jumlah Pertanyaan</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-question"></i>
                                </div>
                                <div style="height:20px; padding:5px;"></div>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="small-box bg-orange">
                                <div class="inner">
                                    <?php
                                        $this->db->like('id_artikel');
                                        $this->db->from('tb_artikel');
                                        echo "<h3>".$this->db->count_all_results()."</h3>";
                                    ?>
                                    <p>Jumlah Artikel</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <div style="height:20px; padding:5px;"></div>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
            </div><!-- /.content-wrapper -->
            <?php include_once('include/footer.php'); ?>
        </div><!-- ./wrapper -->
    </body>
</html>