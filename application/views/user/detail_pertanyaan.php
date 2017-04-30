<?php
  $id = $this->uri->segment(3);
  $this->load->model('mpertanyaan'); 
  $this->mpertanyaan->tambahView($id);
?>

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
                 <li class="active"><a href="<?=base_url()?>artikel">Artikel</a></li>
                 <li ><a href="<?=base_url()?>dokter">Dokter</a></li>
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

    <!-- Daftar Pertanyaan -->
    <div class="col-sm-9 col-xs-12 pertanyaan wowload fadeInLeft">
        <h5 class="judul-tab pg-pertanyaan">Detail Pertanyaan</h5>
        <hr class="hr-underline">
        <div class="detail-pertanyaan">
          <div class="img-hold"><img class="img-profile" src="<?=base_url()?>assets/user/images/img.png"></div>
          <div class="detail-pertanyaan-hold">
          <?php
            if ($detail != null) {
              foreach ($detail as $key) {
                $tanggal = $key->waktu_kirim;
                $tgl = date("d/m/y H:i", strtotime($tanggal));

                echo "<p class='judul'><b>".$key->judul."</b></p>
                      <p class='tumb-pertanyaan'>".$key->pertanyaan."</p>
                      <p class='nama'>oleh ".$key->fullname." | ".$tgl."</p>";
              }
            }
          ?>
          </div>
        </div>
        <hr class="hr-underline-bottom">
        
        <p class="komentar-label">Komentar</p>

        <!-- START OF LIST KOMENTAR -->
        <div class="list-komentar">
          <div class="komentar-holder" id="komentar-holder">
          
          </div>
        </div>
        <!-- END OF LIST KOMENTAR -->
        <?php
            if ($this->session->userdata('username')!="") {
                echo ' <textarea class="form-control komentar" id="komentar" name="komentar" placeholder="Tambahkan Komentar..." required="required"></textarea>
                  <button type="submit" id="tambah_komentar" class="btn btn-primary btn-kirim">Kirim</button>';
            }else{
              echo ' <textarea disabled class="form-control komentar" id="komentar" name="komentar" placeholder="Login terlebih dahulu ..." required="required"></textarea>
                  <button type="submit" class="btn btn-primary btn-kirim">Kirim</button>';
            }
        ?>
       
    </div>

    <!-- Dokter -->
    <div class="col-sm-3 col-xs-12 wowload fadeInRight">
        <h5 class="judul-tab judul-center">Diskusi</h5>
        <hr class="hr-underline">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-terbaru">Terbaru</a></li>
          <li><a href="#tab-populer">Populer</a></li>
        </ul>

        <div class="tab-content">
          <div id="tab-terbaru" class="tab-pane fade in active">
            <div class="tab-pertanyaan col-sm-12">
              Mengapa setiap kali menstruasi saya sakit perut?<br>
              <p class="pengirim-pertanyaan">Dikirim oleh Melia Fitriawati</p>
            </div>
            <div class="tab-pertanyaan col-sm-12">
              Mengapa setiap kali menstruasi saya sakit perut?<br>
              <p class="pengirim-pertanyaan">Dikirim oleh Melia Fitriawati</p>
            </div>
            <div class="tab-pertanyaan col-sm-12">
             Mengapa setiap kali menstruasi saya sakit perut?<br>
              <p class="pengirim-pertanyaan">Dikirim oleh Melia Fitriawati</p>
            </div>
            <div class="tab-pertanyaan col-sm-12">
              Mengapa setiap kali menstruasi saya sakit perut?<br>
              <p class="pengirim-pertanyaan">Dikirim oleh Melia Fitriawati</p>
            </div>
            <div class="tab-pertanyaan col-sm-12">
              Mengapa setiap kali menstruasi saya sakit perut?<br>
              <p class="pengirim-pertanyaan">Dikirim oleh Melia Fitriawati</p>
            </div>
            <button type="button" class="btn btn-primary btn-diskusi">Lihat Selengkapnya</button>
          </div>
          <div id="tab-populer" class="tab-pane fade">
            <div class="tab-pertanyaan col-sm-12">
              Is that possible to control my cholesterol level without medicines?
            </div>
            <div class="tab-pertanyaan col-sm-12">
              Is that possible to control my cholesterol level without medicines?
            </div>
            <div class="tab-pertanyaan col-sm-12">
              Is that possible to control my cholesterol level without medicines?
            </div>
            <div class="tab-pertanyaan col-sm-12">
              Is that possible to control my cholesterol level without medicines?
            </div>
            <div class="tab-pertanyaan col-sm-12">
              Is that possible to control my cholesterol level without medicines?
            </div>
            <button type="button" class="btn btn-primary btn-diskusi">Lihat Selengkapnya</button>
          </div>
        </div>
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

  $(document).ready(function () {
    var pertanyaan_id = <?php echo $id?>;
    $.post('<?php echo base_url();?>pertanyaan/displaycomments/'+pertanyaan_id,
    {
      pertanyaan_id:pertanyaan_id
    },
    function(data){
      console.log("masuk");
      $("#komentar-holder").html(data);
    });
  }); 

  $(function(){
        $( "#tambah_komentar" ).click(function(event)
        {
            event.preventDefault();
            var komentar= $("#komentar").val();

            $.ajax(
                {
                    type:"post",
                    url: "<?php echo base_url(); ?>pertanyaan/tambahkomentar/<?php echo $id?>" ,//URL changed 
                    data:{ komentar:komentar },
                    success:function(data)
                    {
                        console.log("sukses");
                        document.getElementById("komentar").value = "";
                        $("#komentar-holder").html(data);
                    }
                });
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