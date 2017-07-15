<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ask My Doctors | Pasien</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/admin/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/admin/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/admin/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url('assets/admin/datatables/dataTables.bootstrap.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/admin/js/plugins/datepicker/datepicker3.css'); ?>"/>
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/admin/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url('assets/admin/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />

    </head>
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
                        Pertanyaan
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>/admin"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Pertanyaan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <!-- <button class="btn btn-danger btn-flat btn-new" >+ Tambah Dokter</button> -->
                                </div>
                                <div class="box-body">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Pertanyaan</th>
                                                <th>Tanggal</th>
                                                <th>Pengirim</th>
                                                <th>Status</th>
                                                <th>Notif</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              if ($pertanyaan != null) {
                                              	$no = 0;
                                                foreach ($pertanyaan as $key) {
                                                  $no++;
                                                  echo "<tr>
                                                    <td>".$no."</td>
                                                    <td>".$key->judul."</td>
                                                    <td>".$key->pertanyaan."</td>
                                                    <td>".$key->waktu_kirim."</td>
                                                    <td>".$key->pengirim."</td>
                                                    <td>";
                                                        if ($key->status == 'BELUM TERJAWAB')
                                                            echo '<span class="label label-warning">BELUM TERJAWAB</span>';
                                                        if ($key->status == 'TERJAWAB')
                                                            echo '<span class="label label-primary">TERJAWAB</span>';
                                                        echo "</td>";
                                                        echo '<td><button class="btn btn-danger btn-xs btn-notif" onclick="sendNotif('. $key->id_diskusi .')"><i class="fa fa-bell"></i></button></td>';     
                                                        echo "</tr>";
                                                }
                                              }else{
                                                echo '<tr><td colspan="12">Data tidak ditemukan</td></tr>';
                                              }
                                            ?>
                                        </tbody>                                       
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->

            </div><!-- /.content-wrapper -->
            <?php include_once('include/footer.php'); ?>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/admin/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/admin/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url('assets/admin/datatables/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/admin/js/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('assets/admin/js/plugins/bootstrap-growl/jquery.bootstrap-growl.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/admin/datatables/dataTables.bootstrap.min.js'); ?>"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('assets/admin/js/plugins/fastclick/fastclick.min.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/admin/js/AdminLTE/app.min.js'); ?>" type="text/javascript"></script>        
        <!-- SlimScroll 1.3.0 -->
        <script src="<?php echo base_url('assets/admin/js/plugins/slimScroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url('assets/admin/js/AdminLTE/demo.js'); ?>"></script> 
        <!-- page script -->
        
<script>
    $(function () {
        $("#datatable").DataTable({
            "scrollX":true,
            "processing": true,
            "columnDefs": [
                { "width": "2%", "targets": 0  },
                { "width": "13%", "targets": 1 },
                { "width": "33%", "targets": 2 },
                { "width": "12%", "targets": 3 },
                { "width": "10%", "targets": 4 },
                { "width": "2%", "targets": 5 },
                { "width": "2%", "targets": 6 }
            ]
        }); 

        // $("#datatable").DataTable({
        //     "scrollX":true,
        //     "processing": true
        // });     

    });

    function sendNotif($id){
        var r = confirm("Apakah anda yakin untuk mengirim notifikasi?");
            if (r == false) {
                return false
            }

            var id_pertanyaan = $id;

            $.ajax({
                async: true,
                type: 'post',
                url: '<?= base_url(); ?>admin/kirimNotif',
                data: 'id_pertanyaan=' + id_pertanyaan,
                dataType: 'json',
                success: function (resp) {
                    if (resp.success == 1) {
                        $.bootstrapGrowl("Berhasil mengirimkan notifikasi!", {type: 'success'});
                        location.reload();
                    } else if (resp.success == 0) {
                        $.bootstrapGrowl("Gagal mengirimkan notifikasi", {type: 'danger'});
                        location.reload();
                    }
                }
            });
    }
</script>
</body>
</html>