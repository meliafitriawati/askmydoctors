<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ask My Doctors | Spesialisasi</title>
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
                        Spesialisasi
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url(); ?>/admin"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">Spesialisasi</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <button class="btn btn-danger btn-flat btn-new" >+ Tambah Spesialisasi</button>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
												<th>Nama</th>
                                                <th>Icon</th>
												<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
							                  if ($spesialisasi != null) {
                                                $no=0;
							                    foreach ($spesialisasi as $key) {
                                                    $no++;
							                      echo "<tr>
							                        <td>".$no."</td>
							                        <td>".$key->nama_spesialisasi."</td>
                                                    <td><img style='width:70px' src='".base_url(). "assets/img/web/spesialisasi_icon/".$key->img_spesialisasi.".jpg'></td>
                                                    <td>";
                                                    echo '<span class="btn btn-info btn-xs btn-edit" ref="'.$key->id.'"><i class="fa fa-edit"></i></span> ';
                                                    echo '<span class="btn btn-danger btn-xs btn-delete" ref="'.$key->id.'"><i class="fa fa-remove"></i></span>';
                                                echo "</td>
							                      </tr>";
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

                <!-- modal new user -->
                <div id="modal-new" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <form class="form-horizontal" action="<?php echo base_url();?>admin/addSpesialisasi" role="form" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Spesialisasi Baru</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="inputNama" class="col-sm-2 control-label">Nama Spesialisasi</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="inputNama" id="inputNama" placeholder="Nama" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success btn-submit-new">Submit</button>
                            </div>
                        </div><!-- /.modal-content -->
                        </form>
                    </div><!-- /.modal-dialog -->
                </div>
                <!-- end modal new user-->

                <!-- modal edit -->
                <div id="modal-edit" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <form class="form-horizontal" action="<?php echo base_url();?>admin/updateSpesialisasiById" role="form" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Spesialisasi</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal">
                                    <div class="box-body">
                                        <input type="text" class="hidden" name="inputID" id="inputID">
                                        <div class="form-group">
                                            <label for="inputEditNama" class="col-sm-2 control-label">Nama Spesialisasi</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="inputEditNama" id="inputEditNama" placeholder="Nama" required="required">
                                            </div>
                                        </div>
									</div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success btn-submit-update">Update</button>
                            </div>
                        </div><!-- /.modal-content -->
                        </form>
                    </div><!-- /.modal-dialog -->
                </div><!-- end modal edit -->
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
                    "processing": true
        });   
				
        function resetFormNew() {
            $("#inputNama").val('');
            $(".form-group").removeClass('has-error');
        }

        function resetFormEdit() {
            $("#inputEditNama").val('');
            $(".form-group").removeClass('has-error');
        }

        //add data show modal
		$(".btn-new").click(function () {
            resetFormNew();
            $('#modal-new').modal('show');
        });		

        //hapus data
        $(document).on('click', '.btn-delete', function () {
            var r = confirm("Apakah anda yakin untuk me-nonaktifkan dan menghapus data ini?");
            if (r == false) {
                return false
            }

            var id = $(this).attr('ref');

            $.ajax({
                async: true,
                type: 'post',
                url: '<?=base_url()?>admin/deleteSpesialisasi',
                data: 'id=' + id,
                dataType: 'json',
                success: function (resp) {
                    if (resp.code == 200) {
                        $.bootstrapGrowl("Berhasil menghapus spesialisasi", {type: 'success'});
                        location.reload();
                    } else {
                        $.bootstrapGrowl("Gagal menghapus spesialisasi!", {type: 'danger'});
                    }
                }
            });
        });
		
		
        //edit data show modal
        $(document).on('click', '.btn-edit', function () {
            var id = $(this).attr('ref');

            $.ajax({
                async: true,
                type: 'post',
                url: '<?= base_url(); ?>admin/spesialisasiById',
                data: 'id=' + id,
                dataType: 'json',
                success: function (resp) {
                    if (resp.code == 200) {

                        resetFormEdit();
                        $('#modal-edit').modal('show');
                        $("#inputID").val(resp.data.id);
                        $("#inputEditNama").val(resp.data.nama_spesialisasi);
														
                        // put id reference here
                        $(".btn-submit-update").attr('ref', id);

                    } else {
                        $.bootstrapGrowl("Gagal mengambil data!", {type: 'danger'});
                    }
                }
            });
        });
    });
</script>
</body>
</html>