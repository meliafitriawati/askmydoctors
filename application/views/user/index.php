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
<link rel="stylesheet" href="assets/user/assets/bootstrap/css/bootstrap.min.css" />

<!-- js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- animate.css -->
<link rel="stylesheet" href="assets/user/assets/animate/animate.css" />
<link rel="stylesheet" href="assets/user/assets/animate/set.css" />

<!-- gallery -->
<link rel="stylesheet" href="assets/user/assets/gallery/blueimp-gallery.min.css">

<!-- favicon -->
<link rel="shortcut icon" href="assets/user/images/icon.png" type="image/x-icon">
<link rel="icon" href="assets/user/images/icon.png" type="image/x-icon">


<link rel="stylesheet" href="assets/user/assets/style.css">

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
      
              <a class="navbar-brand" href="<?=base_url()?>"><img src="assets/user/images/logo.png" alt="logo"></a>
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
                 <li class="active"><a href="<?=base_url()?>">Home</a></li>
                 <li ><a href="<?=base_url()?>diskusi">Diskusi</a></li>
                 <li ><a href="<?=base_url()?>artikel">Artikel</a></li>
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
<!-- Slider Starts -->
<div id="myCarousel" class="carousel slide banner-slider animated flipInX" data-ride="carousel">     
      <div class="carousel-inner">
        <!-- Item 1 -->
        <div class="item active">
          <img src="assets/user/images/back1.jpg" alt="banner">          
            <div class="carousel-caption">
            	<div class="caption-wrapper">
            		<div class="caption-info">
            		  <!-- <img src="images/logobig.png" class="animated bounceInUp" alt="logo"> -->
              		<h2 class="animated bounceInLeft">Ask My Doctors</h2>
              		<p class="animated bounceInRight">Konsultasi Kesehatan Online Dengan Dokter</p>
              		<!-- <input placeholder="Search" type="text" class="search-box">
                  <div class="scroll animated fadeInUp"><a href="#works" class="btn btn-default"><i class="fa fa-flask"></i>Search</a> 
                  </div>  -->
              		</div>
              	</div>
            </div>
        </div>
        <!-- #Item 1 -->

        <!-- Item 1 -->
        <div class="item">
          <img src="assets/user/images/back1.jpg" alt="banner">          
             <div class="carousel-caption">
            	<div class="caption-wrapper">
            		<div class="caption-info">
                  <!-- <img src="images/logobig.png" class="animated bounceInUp" alt="logo"> -->
                  <h2 class="animated bounceInLeft">Ask My Doctors</h2>
                  <p class="animated bounceInRight">Konsultasi Kesehatan Online Dengan Dokter</p>
                  <!-- <input placeholder="Search" type="text" class="search-box">
                  <div class="scroll animated fadeInUp"><a href="#works" class="btn btn-default"><i class="fa fa-flask"></i>Search</a> 
                  </div> -->
                  </div>
                </div>
            </div>
        </div>
        <!-- #Item 1 -->

        <!-- Item 1 -->
        <div class="item">
          <img src="assets/user/images/back1.jpg" alt="banner">          
             <div class="carousel-caption">
            	<div class="caption-wrapper">
            		<div class="caption-info">
                  <!-- <img src="images/logobig.png" class="animated bounceInUp" alt="logo"> -->
                  <h2 class="animated bounceInLeft">Ask My Doctors</h2>
                  <p class="animated bounceInRight">Konsultasi Kesehatan Online Dengan Dokter</p>
                  <!-- <input placeholder="Search" type="text" class="search-box">
                  <div class="scroll animated fadeInUp"><a href="#works" class="btn btn-default"><i class="fa fa-flask"></i>Search</a> 
                  </div> -->
                  </div>
                </div>
            </div>
        </div>
        <!-- #Item 1 -->

        <!-- Item 1 -->
        <div class="item">
          <img src="assets/user/images/back1.jpg" alt="banner">          
             <div class="carousel-caption">
            	<div class="caption-wrapper">
            		<div class="caption-info">
                  <!-- <img src="images/logobig.png" class="animated bounceInUp" alt="logo"> -->
                  <h2 class="animated bounceInLeft">Ask My Doctors</h2>
                  <p class="animated bounceInRight">Konsultasi Kesehatan Online Dengan Dokter</p>
                  <!-- <input placeholder="Search" type="text" class="search-box">
                  <div class="scroll animated fadeInUp"><a href="#works" class="btn btn-default"><i class="fa fa-flask"></i>Search</a> 
                  </div> -->
                </div>
            </div>
        </div>
        </div>
        <!-- #Item 1 -->
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon-chevron-left"><i class="fa fa-angle-left"></i></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon-chevron-right"><i class="fa fa-angle-right"></i></span></a>
    </div>
<!-- #Slider Ends -->
</div>

<div id="partners" class="container spacer ">
  <div class="clearfix">

    <!-- Artikel -->
    <div class="col-sm-3 col-xs-12 partners  wowload fadeInLeft">
        <h5 class="judul-tab judul-center">Artikel Terbaru</h5>
        <hr class="hr-underline">
        <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" src="assets/user/images/img.png">
          </a>
          <div class="media-body">
            <h6 class="media-heading">11 Manfaat Jus Mangga</h6>
            <p>Siapa sih yang tidak kenal dengan buah mangga? Buah yang dianggap sebagai ...</p>
          </div>
        </div>

         <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" src="assets/user/images/img.png">
          </a>
          <div class="media-body">
            <h6 class="media-heading">11 Manfaat Jus Mangga</h6>
            <p>Siapa sih yang tidak kenal dengan buah mangga? Buah yang dianggap sebagai ...</p>
          </div>
        </div>

         <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" src="assets/user/images/img.png">
          </a>
          <div class="media-body">
            <h6 class="media-heading">11 Manfaat Jus Mangga</h6>
            <p>Siapa sih yang tidak kenal dengan buah mangga? Buah yang dianggap sebagai ...</p>
          </div>
        </div>

         <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" src="assets/user/images/img.png">
          </a>
          <div class="media-body">
            <h6 class="media-heading">11 Manfaat Jus Mangga</h6>
            <p>Siapa sih yang tidak kenal dengan buah mangga? Buah yang dianggap sebagai ...</p>
          </div>
        </div>

        <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" src="assets/user/images/img.png">
          </a>
          <div class="media-body">
            <h6 class="media-heading">11 Manfaat Jus Mangga</h6>
            <p>Siapa sih yang tidak kenal dengan buah mangga? Buah yang dianggap sebagai...</p>
          </div>
        </div>

        <button type="button" class="btn btn-primary">Lihat Selengkapnya</button>
    </div>

    <!-- Diskusi -->
    <div class="col-sm-6 partners  wowload fadeInLeft">
        <h5 class="judul-tab">Diskusi</h5>
        <hr class="hr-underline">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-terbaru">Terbaru</a></li>
          <li><a href="#tab-populer">Populer</a></li>
        </ul>

        <div class="tab-content">
          <div id="tab-terbaru" class="tab-pane fade in active">
            <div class="tab-pertanyaan col-sm-12">
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ?
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ? 
            </div>
            <div class="tab-pertanyaan col-sm-12">
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ?
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ?  
            </div>
            <div class="tab-pertanyaan col-sm-12">
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ?
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ? 
            </div>
            <div class="tab-pertanyaan col-sm-12">
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ?
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ? 
            </div>
            <div class="tab-pertanyaan col-sm-12">
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ?
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ?  
            </div>
            <button type="button" class="btn btn-primary btn-diskusi">Lihat Selengkapnya</button>
          </div>
          <div id="tab-populer" class="tab-pane fade">
            <div class="tab-pertanyaan col-sm-12">
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ?
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ? 
            </div>
            <div class="tab-pertanyaan col-sm-12">
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ?
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ? 
            </div>
            <div class="tab-pertanyaan col-sm-12">
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ?
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ? 
            </div>
            <div class="tab-pertanyaan col-sm-12">
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ?
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ? 
            </div>
            <div class="tab-pertanyaan col-sm-12">
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ?
              Is that possible to control my cholesterol level without medicines ? Doing daily workout and consuming more fruits can help me to lower the cholesterol level of my body ? 
            </div>
            <button type="button" class="btn btn-primary btn-diskusi">Lihat Selengkapnya</button>
          </div>
        </div>
    </div>

    <!-- Dokter -->
    <div class="col-sm-3  wowload fadeInRight">
        <h5 class="judul-tab judul-center">Dokter</h5>
        <hr class="hr-underline">
        <div class="list-dokter">
          <img class="dokter-img" src="assets/user/images/img.png">
          <p class="nama-dokter"><b>Dr. Martha Kurnia K</b></p>
          <p class="spesialisasi-dokter">Spesialis Bedah Saraf</p>
        </div>
        <div class="list-dokter">
          <img class="dokter-img" src="assets/user/images/img.png">
          <p class="nama-dokter"><b>Dr. Martha Kurnia K</b></p>
          <p class="spesialisasi-dokter">Spesialis Bedah Saraf</p>
        </div>
        <div class="list-dokter">
          <img class="dokter-img" src="assets/user/images/img.png">
          <p class="nama-dokter"><b>Dr. Martha Kurnia K</b></p>
          <p class="spesialisasi-dokter">Spesialis Bedah Saraf</p>
        </div>
        <div class="list-dokter">
          <img class="dokter-img" src="assets/user/images/img.png">
          <p class="nama-dokter"><b>Dr. Martha Kurnia K</b></p>
          <p class="spesialisasi-dokter">Spesialis Bedah Saraf</p>
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
</script>

<!-- jquery -->
<!-- <script src="assets/user/assets/jquery.js"></script> -->

<!-- wow script -->
<script src="assets/user/assets/wow/wow.min.js"></script>


<!-- boostrap -->
<script src="assets/user/assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="assets/user/assets/mobile/touchSwipe.min.js"></script>
<script src="assets/user/assets/respond/respond.js"></script>

<!-- gallery -->
<script src="assets/user/assets/gallery/jquery.blueimp-gallery.min.js"></script>

<!-- custom script -->
<!-- <script src="assets/user/assets/script.js"></script> -->

</body>
</html>