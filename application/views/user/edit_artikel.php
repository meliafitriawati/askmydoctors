<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah Artikel</title>
  <!-- Google fonts -->
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>

  <!-- font awesome -->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <!-- animate.css -->
  <link rel="stylesheet" href="<?=base_url()?>assets/user/assets/animate/animate.css" />
  <link rel="stylesheet" href="<?=base_url()?>assets/user/assets/animate/set.css" />

  <!-- gallery -->
  <link rel="stylesheet" href="<?=base_url()?>assets/user/assets/gallery/blueimp-gallery.min.css">

  <!-- favicon -->
  <link rel="shortcut icon" href="<?=base_url()?>assets/user/images/icon.png" type="image/x-icon">
  <link rel="icon" href="<?=base_url()?>assets/user/images/icon.png" type="image/x-icon">

  <link rel="stylesheet" href="<?=base_url()?>assets/user/assets/style.css">

  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
</head>
<body>

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
                 <li class="active"><a href="<?=base_url()?>artikel">Artikel</a></li>
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
                        echo "<li ><a href='".base_url()."dokter/profil/".$username."'>Dr. ".$this->session->userdata('nama_dokter')."</a></li>";
                        break;
                      case '3': echo "<li ><a href='#'>".$this->session->userdata('nama_pengguna')."</a></li>";echo "<li><a href='".base_url()."diskusi' class='menu-button'><b>Tanya Dokter</b></a></li>";
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
        <h5 class="judul-tab judul-center">Edit Artikel</h5>
        <hr class="hr-underline">
        <?php
        	if ($detail != null) {
        		foreach ($detail as $key) {
	        		echo '<form method="post" action="'.base_url().'artikel/updateArtikel/'.$key->id_artikel.'" enctype="multipart/form-data">
				          <input type="text" name="judul" placeholder="Judul" style="width: 100%; margin-bottom: 10px;" value="'.$key->judul.'"></input>
				          
                  <textarea name="tumb" maxlength="200" style="width: 100%; height: 100; margin-bottom: 10px" placeholder="Masukkan 200 huruf pertama">'.$key->artikel_tumb.'</textarea>
                  
                  <img style="width:100px" src="'.base_url(). 'assets/img/artikel/'.$key->img_tumb.'">
                  
                  <input type="file" class="form-control" name="foto_artikel" id="foto_artikel" placeholder="Foto" style="margin-bottom: 10px">
				          
                  <textarea id="summernote" name="news_detail" style="width: 100%; height: 300;">'.$key->artikel.'</textarea>
				          <button>SUBMIT</button>
				        </form>';
				    }
        	}
        ?>
        
        <!-- <button type="button" class="btn btn-primary">Lihat Selengkapnya</button> -->
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

$(document).ready(function() {
        $('#summernote').summernote();
    });

    $('#summernote').summernote({
    height: 300,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializing summernote
  });
</script>
</body>
</html>