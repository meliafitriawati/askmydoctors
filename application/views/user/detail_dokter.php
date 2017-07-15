<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Ask My Doctors</title>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- bootstrap -->
<link rel="stylesheet" href="<?=base_url()?>assets/user/assets/bootstrap/css/bootstrap.min.css" />

<!-- js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- animate.css -->
<link rel="stylesheet" href="<?=base_url()?>assets/user/assets/animate/animate.css" />
<link rel="stylesheet" href="<?=base_url()?>assets/user/assets/animate/set.css" />

<!-- gallery -->
<link rel="stylesheet" href="<?=base_url()?>assets/user/assets/gallery/blueimp-gallery.min.css">

<!-- favicon -->
<link rel="shortcut icon" href="<?=base_url()?>assets/user/images/icon.png" type="image/x-icon">
<link rel="icon" href="<?=base_url()?>assets/user/images/icon.png" type="image/x-icon">


<link rel="stylesheet" href="<?=base_url()?>assets/user/assets/style.css">

</head>

<body>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=base_url()?>assets/user/images/logo.png" alt="logo"></a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                 <li ><a href="<?=base_url()?>">Home</a></li>
                 <li ><a href="<?=base_url()?>diskusi">Diskusi</a></li>
                 <li ><a href="<?=base_url()?>artikel">Artikel</a></li>
                 <li ><a href="<?=base_url()?>dokter">Dokter</a></li>
                 <?php
                  $kode = $this->session->userdata('hak_akses');
                  $username = $this->session->userdata('username');
                  switch ($kode) {
                    case '2': 
                      $this->db->from("tb_diskusi");
                      $this->db->where("status", "BELUM TERJAWAB");
                      $count = $this->db->count_all_results();

                      $query = $this->db->query('SELECT * FROM tb_diskusi WHERE status="BELUM TERJAWAB"');
                      $result = $query->result();
                         echo '<li><div class="dropdown">
                              <button class="dropbtn"><span class="bubble" id="jumlah_pesanan">'.$count.'
                          </span></button>
                              <div class="dropdown-content">';
                                foreach ($result as $key) {
                                  echo '<a href="'.base_url().'pertanyaan/detail/'.$key->id_diskusi.'">'.$key->judul.'</a>';
                                }
                              echo '</div></div></li>';
                      break;
                    case '3':
                    $this->db->from("tb_notif_diskusi");
                    $this->db->where("penerima", $username);
                    $this->db->where("status", "NOT");

                    $count = $this->db->count_all_results();

                    $query = $this->db->query('SELECT * FROM tb_notif_diskusi WHERE penerima="'.$username.'" AND status="NOT"');
                    $result = $query->result();

                    if ($count != 0) {
                      echo '<li><div class="dropdown">
                            <button class="dropbtn"><span class="bubble" id="jumlah_pesanan">'.$count.'
                        </span></button>
                            <div class="dropdown-content">';
                              foreach ($result as $key) {
                                echo '<a onclick="readNotif('. $key->id_notif .')">'.$key->komentar.'</a>';
                              }
                            echo '</div></div></li>';
                    }else{
                      echo '<li><div class="dropdown">
                            <button class="dropbtn"><span class="bubble" id="jumlah_pesanan">0
                        </span></button>
                            <div class="dropdown-content">';
                              echo "<center>NO NOTIFICATION</center>";
                            echo '</div></div></li>';
                    }    
                      break;
                    default:
                      break;
                   } 
                ?>
                 <?php 
                  if ($this->session->userdata('hak_akses')) {
                    $kode = $this->session->userdata('hak_akses');
                    switch ($kode) {
                      case '1':
                        break;
                      case '2': 
                        $username = $this->session->userdata('username');
                      echo "<li class='active'><a href='".base_url()."dokter/profil/".$username."'>Dr. ".$this->session->userdata('nama_dokter')."</a></li>";
                        break;
                      case '3': echo "<li class='active'><a href='#'>".$this->session->userdata('nama_pengguna')."</a></li>";echo "<li><a href='".base_url()."diskusi' class='menu-button'><b>Tanya Dokter</b></a></li>";
                        break;
                      default:
                        break;
                     } 
                  }else{
                    echo "<li><a href='".base_url()."diskusi' class='menu-button'><b>Tanya Dokter</b></a></li>";
                        
                  }


                   if (!$this->session->userdata('hak_akses')) {
                      $url = "<li><a href='".base_url()."login' class='menu-button'><b>Login</b></a></li>";
                      echo $url;
                   }else{
                      $url = "<li><a href='".base_url()."logout' class='menu-button'><b>Logout</b></a></li>";
                      echo $url;
                   }
                 ?> 
              </ul>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>

      </div>
    </div>
<!-- #Header Starts -->

<div id="home">

</div>

<div id="pertanyaan" class="container spacer ">
  <div class="clearfix">

    <!-- Diskusi -->
    <div class="col-sm-12 col-xs-12 partners  wowload fadeInLeft">
        <h5 class="judul-tab judul-center">Detail Dokter</h5> 
        <hr class="hr-underline">

        <?php
          if ($detail != null) {
              foreach ($detail as $key) {
                
                echo '
                  <div class="col-sm-12 dokter-detail-top">
                    <div class="col-sm-1">
                      <img class="dokter-img" style="width: 130%" src="'.base_url().'assets/img/dokter/'.$key->image.'">';
                      
                      if ($this->session->userdata('hak_akses') == "2") {
                        echo '<button class="btn btn-danger btn-flat btn-new">EDIT</button>';
                      }
                    echo '</div><div class="col-sm-11">
                      <p class="nama"><b>'.$key->fullname.'</b></p>
                      <p class="spesialisasi">Spesialis '.$key->nama_spesialisasi.'</p>
                      <p class="kota">'.$key->kota.', Indonesia</p>
                    </div>
                  </div>
                  <div class="col-sm-12 dokter-detail-bottom">
                    <p class="detail-dokter"><b>Tentang Dokter</b></p>
                    <p class="spesialisasi">'.$key->tentang.'</p>
                    <p class="detail-dokter"><b>Pendidikan</b></p>
                    <p class="spesialisasi">'.$key->pendidikan.'</p>
                    <p class="detail-dokter"><b>Klinik</b></p>
                    <p class="spesialisasi">'.$key->nama_klinik.'</p>
                    <p class="detail-dokter"><b>Alamat</b></p>
                    <p class="spesialisasi">'.$key->lokasi.'</p>
                    <p class="detail-dokter"><b>Jadwal Klinik</b></p>
                  </div>
              ';
            }
          }
        ?>
        
        <h5 class="judul-tab judul-center">Artikel Dokter</h5> 
        <hr class="hr-underline">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tumbnail</th>
                    <th>Tanggal</th>
                    <th>Gambar</th>
                    <?php
                        $nama = $this->uri->segment(3);
                        if ($this->session->userdata('hak_akses') == "2" && $this->session->userdata('username') == $nama ) {
                          echo "<td>EDIT</td>";
                          echo "<td>DELETE</td>";
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                  $nama = $this->uri->segment(3);
                  if ($artikel != null) {
                    $no = 0;
                    foreach ($artikel as $key) {
                      $no++;
                      echo "<tr>
                        <td>".$no."</td>
                        <td>".$key->judul."</td>
                        <td>".$key->artikel_tumb."</td>
                        <td>".$key->tgl_publish."</td>
                        <td><img style='width:70px' src='".base_url(). "assets/img/artikel/".$key->img_tumb."'></td>";

                        if ($this->session->userdata('hak_akses') == "2" && $this->session->userdata('username') == $nama) {
                          echo "<td><a href='".base_url(). "artikel/edit/".$key->id_artikel."'>EDIT</a></td></td>";
                          $username = $this->session->userdata('username');
                          echo "<td><a href='".base_url(). "artikel/delete/".$key->id_artikel."/".$username."'>DELETE</a></td></td>";
                        }

                        echo "<tr>";
                    }
                  }else{
                    echo '<tr><td colspan="12">Data tidak ditemukan</td></tr>';
                  }
                ?>
            </tbody>                                       
        </table>
    </div>

  </div>
</div>

<!-- Footer Starts -->
<div class="footer text-center spacer">
<p class="wowload flipInX"><a href="#"><i class="fa fa-facebook fa-2x"></i></a> <a href="#"><i class="fa fa-dribbble fa-2x"></i></a> <a href="#"><i class="fa fa-twitter fa-2x"></i></a> <a href="#"><i class="fa fa-linkedin fa-2x"></i></a> </p>
Ask My Doctor
</div>
<!-- # Footer Ends -->
<a href="#home" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a>





<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->    
</div>

<!-- Tab -->
<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>

<!-- jquery -->
<!-- <script src="assets/user/assets/jquery.js"></script> -->

<!-- wow script -->
<script src="<?=base_url()?>assets/user/assets/wow/wow.min.js"></script>


<!-- boostrap -->
<script src="<?=base_url()?>assets/user/assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="<?=base_url()?>assets/user/assets/mobile/touchSwipe.min.js"></script>
<script src="<?=base_url()?>assets/user/assets/respond/respond.js"></script>

<!-- gallery -->
<script src="<?=base_url()?>assets/user/assets/gallery/jquery.blueimp-gallery.min.js"></script>

<!-- custom script -->
<!-- <script src="assets/user/assets/script.js"></script> -->

</body>
</html>