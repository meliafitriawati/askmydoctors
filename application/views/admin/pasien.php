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
                        Pasien
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>/admin"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Pasien</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <!-- <button class="btn btn-danger btn-flat btn-new" >+ Tambah Dokter</button> -->
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Terdaftar</th>
                                                
                                                <th>Verified</th>
                                                <th>Gambar</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              if ($pasien != null) {
                                                foreach ($pasien as $key) {
                                                  echo "<tr>
                                                    <td>".$key->username."</td>
                                                    <td>".$key->fullname."</td>
                                                    <td>".$key->email."</td>
                                                    <td>".$key->gender."</td>
                                                    <td>".$key->tgl_daftar."</td>
                                                    <td>".$key->verified."</td>
                                                    <td><img style='width:70px' src='".base_url(). "assets/img/user/".$key->img_user."'></td>
                                                    <td>";
                                                    echo '<span class="btn btn-danger btn-xs btn-delete" ref="'.$key->username.'"><i class="fa fa-remove"></i></span>';
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

                <!-- modal new dokter -->
                <div id="modal-new" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <form class="form-horizontal" action="<?php echo base_url();?>admin/addDokter" role="form" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Jamaah Baru</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Username" required="required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required="required">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" required="required">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputFullname" class="col-sm-2 control-label">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputFullname" name="inputFullname" placeholder="Nama Lengkap" required="required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                          <label for="inputJK" class="col-sm-2 control-label">Jenis</label>
                                          <div class="col-sm-10">
                                            <select class="form-control" id="inputJK" name="inputJK" required="required">
                                                <option value="Perempuan">Perempuan</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                            </select>
                                          </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="inputAbout" class="col-sm-2 control-label">Tentang Dokter</label>
                                            <div class="col-sm-10"> 
                                                <textarea class="form-control" id="inputAbout" name="inputAbout" placeholder="Tentang Dokter" required="required" rows="3"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputPendidikan" class="col-sm-2 control-label">Pendidikan Terkahir</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputPendidikan" name="inputPendidikan" placeholder="Pendidikan Terkahir" required="required">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputKlinik" class="col-sm-2 control-label">Nama Klinik</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputKlinik" name="inputKlinik" placeholder="Nama Klinik" required="required">
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="inputLokasi" class="col-sm-2 control-label">Alamat Klinik</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputLokasi" name="inputLokasi" placeholder="Alamat Klinik" required="required">
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="inputKota" class="col-sm-2 control-label">Kota/Kab</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputKota" name="inputKota" placeholder="Kota/Kab" required="required">
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
                        <form class="form-horizontal" action="<?php echo base_url();?>admin/updateDokterById" role="form" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Jamaah</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="inputEditUsername" class="col-sm-2 control-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEditUsername" name="inputEditUsername" placeholder="Username" required="required">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEditEmail" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEditEmail" name="inputEditEmail" placeholder="Email" required="required">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEditFullname" class="col-sm-2 control-label">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEditFullname" name="inputEditFullname" placeholder="Nama Lengkap" required="required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                          <label for="inputEditJK" class="col-sm-2 control-label">Jenis Kelamin</label>
                                          <div class="col-sm-10">
                                            <select class="form-control" id="inputEditJK" name="inputEditJK" required="required">
                                                <option value="Perempuan">Perempuan</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                            </select>
                                          </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="inputEditAbout" class="col-sm-2 control-label">Tentang Dokter</label>
                                            <div class="col-sm-10"> 
                                                <textarea class="form-control" id="inputEditAbout" name="inputEditAbout" placeholder="Tentang Dokter" required="required" rows="3"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEditPendidikan" class="col-sm-2 control-label">Pendidikan Terkahir</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEditPendidikan" name="inputEditPendidikan" placeholder="Pendidikan Terkahir" required="required">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEditKlinik" class="col-sm-2 control-label">Nama Klinik</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEditKlinik" name="inputEditKlinik" placeholder="Nama Klinik" required="required">
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="inputEditLokasi" class="col-sm-2 control-label">Alamat Klinik</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEditLokasi" name="inputEditLokasi" placeholder="Alamat Klinik" required="required">
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="inputEditKota" class="col-sm-2 control-label">Kota/Kab</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEditKota" name="inputEditKota" placeholder="Kota/Kab" required="required">
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
            $("#inputUsername").val('');
            $("#inputPassword").val('');
            $("#inputEmail").val('');
            $("#inputFullname").val('');
            $("#inputJK").val('');
            $("#inputSpesialisasi").val('');
            $("#inputAbout").val('');
            $("#inputPendidikan").val('');
            $("#inputKlinik").val('');
            $("#inputLokasi").val('');
            $("#inputKota").val('');
 
            $(".form-group").removeClass('has-error');
        }

        function resetFormEdit() {
            $("#inputEditUsername").val('');
            $("#inputEditPassword").val('');
            $("#inputEditEmail").val('');
            $("#inputEditFullname").val('');
            $("#inputEditJK").val('');
            $("#inputEditSpesialisasi").val('');
            $("#inputEditAbout").val('');
            $("#inputEditPendidikan").val('');
            $("#inputEditKlinik").val('');
            $("#inputEditLokasi").val('');
            $("#inputEditKota").val('');

            $(".form-group").removeClass('has-error');
        }

        //add data
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

            var username = $(this).attr('ref');

            $.ajax({
                async: true,
                type: 'post',
                url: '<?= base_url(); ?>admin/deleteUser',
                data: 'username=' + username,
                dataType: 'json',
                success: function (resp) {
                    if (resp.code == 200) {
                        $.bootstrapGrowl("Berhasil menghapus user!", {type: 'success'});
                        location.reload();
                    } else {
                        $.bootstrapGrowl("Gagal menghapus user", {type: 'danger'});
                    }
                }
            });
        });
           
        
        //edit data show modal
        $(document).on('click', '.btn-edit', function () {
            var username = $(this).attr('ref');

            $.ajax({
                async: true,
                type: 'post',
                url: '<?= base_url(); ?>admin/dokterById',
                data: 'username=' + username,
                dataType: 'json',
                success: function (resp) {
                    if (resp.code == 200) {

                        resetFormEdit();
                        $('#modal-edit').modal('show');

                        $("#inputEditUsername").val(resp.data.username);
                        $("#inputEditEmail").val(resp.data.email);
                        $("#inputEditJK").val(resp.data.gender);
                        $("#inputEditFullname").val(resp.data.fullname);
                        $("#inputEditSpesialisasi").val(resp.data.id_spesialisasi);
                        $("#inputEditAbout").val(resp.data.tentang);
                        $("#inputEditPendidikan").val(resp.data.pendidikan);
                        $("#inputEditKlinik").val(resp.data.nama_klinik);
                        $("#inputEditLokasi").val(resp.data.lokasi);
                        $("#inputEditKota").val(resp.data.kota);
                        // put id reference here
                        $(".btn-submit-update").attr('ref', username);

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