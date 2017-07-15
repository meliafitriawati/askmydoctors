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
<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">

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
                 <li ><a href="<?=base_url()?>diskusi" class="menu-button"><b>Tanya Dokter</b></a></li> 
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

    <!-- Artikel -->
    <div class="col-sm-12 col-xs-12 login wowload fadeInLeft">
        <div class="login-box" style="margin: 5% auto">
        <div class="login-box-body" style="border: 1px solid #73c3eb; box-shadow: 2px 2px 2px #888888;">
          <p class="login-box-msg"><b>LOGIN</b></p>

          <form action="<?=base_url()?>login/dologin/pasien" method="post">
            <div class="form-group has-feedback">
              <input class="form-control" placeholder="Email" name="email" type="email" required="required">
            </div>
            <div class="form-group has-feedback">
              <input class="form-control" placeholder="Password" name="password" type="password" required="required">
            </div>
            <div class="row">
              <div class="col-xs-8" style="color: red">
              <?php
                $info = $this->session->flashdata('info');
                if(!empty($info)){
                  echo $info;
                }
              ?>
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <div class="social-auth-links text-center">
            <p style="margin-bottom: 10px">- OR -</p>
            <a href="<?=base_url()?>register" class="btn btn-block btn-flat btn-social btn-google">DAFTAR</a>
          </div>
          <!-- /.social-auth-links -->
          <a href="<?=base_url()?>login" style="line-height: 34px;">Lupa password?</a><br>
          <a href="<?=base_url()?>login/dokter" style="line-height: 34px;">Login Sebagai Dokter!</a><br>
        </div>
        <!-- /.login-box-body -->
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
<script src="<?=base_url()?>assets/user/assets/wow/wow.min.js"></script>


<!-- boostrap -->
<script src="<?=base_url()?>assets/user/assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="<?=base_url()?>assets/user/assets/mobile/touchSwipe.min.js"></script>
<script src="<?=base_url()?>assets/user/assets/respond/respond.js"></script>

<!-- gallery -->
<script src="<?=base_url()?>assets/user/assets/gallery/jquery.blueimp-gallery.min.js"></script>

<!-- custom script -->
<!-- <script src="assets/user/assets/script.js"></script> -->>

</body>
</html>

<style type="text/css">
  .btn-social {
    position: relative;
    padding: 0.5em 2em;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: center;
}
</style>