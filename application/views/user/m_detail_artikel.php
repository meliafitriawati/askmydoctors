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
	<div style="margin-top: 20px;" class="col-sm-12 col-xs-12 pertanyaan wowload fadeInLeft">
          <?php
				if ($detail != null) {
					foreach ($detail as $key) {
						echo "<h4 class='judul-artikel'><b>".$key->judul."</b></h4>
                  <p class='nama'>Dikirim oleh ".$key->publisher." | ".$key->tgl_publish."</p>
						        <hr class='hr-underline'>
						        <div class='detail-pertanyaan'>
						      <div class='detail-artikel-hold'>";
						echo $key->artikel;
			        }
			    }else{
			    	echo "not found";
			    }
			?>
          </div>
        </div>
        <hr class="hr-underline-bottom">
    </div>

<!-- wow script -->
<script src="<?=base_url()?>assets/user/assets/wow/wow.min.js"></script>

<!-- boostrap -->
<script src="<?=base_url()?>assets/user/assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="<?=base_url()?>assets/user/assets/mobile/touchSwipe.min.js"></script>
<script src="<?=base_url()?>assets/user/assets/respond/respond.js"></script>

<!-- gallery -->
<script src="<?=base_url()?>assets/user/assets/gallery/jquery.blueimp-gallery.min.js"></script>

</body>
</html>