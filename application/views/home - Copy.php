<!DOCTYPE html>
<html  ng-app="mainApp"lang="en">
<head>
<meta charset="utf-8">
<title>Gdevelop web programing course</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />



<!-- Theme skin -->
<link href="skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><span>G</span>Develop</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
					
                        <li class="active"><a href="home">Home</a></li>
                        <li><a href="harga">Info</a></li>
                        <li><a href="pendaftaran">Pendaftaran Kursus</a></li>
                        <li><a href="about">About</a></li>
                        <li><a href="contact">Contact US</a></li>
						<?php if (!$this->ion_auth->logged_in())
		{
		echo"<li><a href='login'>Login</a></li>";
		}else
		{
			
			echo"<li><a href='video'>Video</a></li>";
			echo"<li><a href='source'>Source Code</a></li>";
			echo"<li><a href='materi'>Materi</a></li>";
			echo"<li><a href='pemberitahuan'>pemberitahuan</a></li>";
			echo"<li><a href='logout'>Logout</a></li>";
		}?>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
	<section id="featured">
	<!-- start slider -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
	<!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="img/slides/1.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Ebook</h3> 
					<p>Mendapatkan Ebook gratis sebagai media pembelajaran dan pengembangan</p> 
					</div>
              </li>
              <li>
                <img src="img/slides/2.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Metode belajar yang asik</h3> 
					<p>Metode belajar seperti belajar kelompok dan sharing ilmu sehingga tidak terlalu kaku.</p> 
                </div>
              </li>
              <li>
                <img src="img/slides/3.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Latihan</h3> 
					<p>Latihan dilakukan pada saat beljar sehingga cepat mahir dalam web programing</p> 
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
			</div>
		</div>
	</div>	
	
	

	</section>
	<section class="callaction">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="big-cta">
					<div class="cta-text">
						<h2><span>GDEVELOP</span> Kursus web programing</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-md-4">
						<div class="box">
							<div class="box-gray aligncenter">
								<h4>EBOOK</h4>
								<div class="icon">
								<i class="fa fa-book fa-3x"></i>
								</div>
								<p>
								Ebook gratis sebagai pembelajarn dan pengembangan .
								</p>
									
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box">
							<div class="box-gray aligncenter">
								<h4>Metode Belajar yang asik</h4>
								<div class="icon">
								<i class="fa fa-smile-o fa-3x"></i>
								</div>
								<p>
								Metode belajar seperti belajar kelompok dimana pembelajaran tidak terlalu kaku
								</p>
									
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box">
							<div class="box-gray aligncenter">
								<h4>Latihan</h4>
								<div class="icon">
								<i class="fa fa-edit fa-3x"></i>
								</div>
								<p>
								Terdapat latihan langsung menggunakan notepad ++
								</p>
									
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- divider -->
		<div class="row">
			<div class="col-lg-12">
				<div class="solidline">
				</div>
			</div>
		</div>
		<!-- end divider -->
		<!-- Portfolio Projects -->
		<div class="row">
			<div class="col-lg-12">
				<h4 class="heading">Materi Yang di ajarkan</h4>
				<div class="row">
					<section id="projects">
					<ul id="thumbs" class="portfolio">
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 design" data-id="id-0" data-type="web">
						<div class="item-thumbs">
						<!-- Fancybox - Gallery Enabled - Title - Full Image -->
						<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="CodeIgniter" href="img/codeigniter-lg.gif">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
						<!-- Thumb Image and Description -->
						<img src="img/codeigniter-lg.gif" alt="CodeIgniter adalah Framework PHP yang sangat mudah di pelajari dan bnyak di implementasikan">
						</div>
						</li>
						<!-- End Item Project -->
						<!-- Item Project and Filter Name -->
						<li class="item-thumbs col-lg-3 design" data-id="id-1" data-type="icon">
						<!-- Fancybox - Gallery Enabled - Title - Full Image -->
						<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="jquery" href="img/jquery-icon.png">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
						<!-- Thumb Image and Description -->
						<img src="img/jquery-icon.png" alt="Jquery adalah framework Javascript yang bertujuan untuk memangkas kode javascript yang panjang menjadi pendek dan lbh mudah di pelajari dan di implementasikan">
						</li>
						<!-- End Item Project -->
						<!-- Item Project and Filter Name -->
						<li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="illustrator">
						<!-- Fancybox - Gallery Enabled - Title - Full Image -->
						<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="HTML5" href="img/MetroUI-Apps-HTML-5-icon.png">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
						<!-- Thumb Image and Description -->
						<img src="img/MetroUI-Apps-HTML-5-icon.png" alt="HTML5 adalah versi terbaru dari html biasa dan banyak digunakan web responsive">
						</li>
						<!-- End Item Project -->
						<!-- Item Project and Filter Name -->
						<li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="illustrator">
						<!-- Fancybox - Gallery Enabled - Title - Full Image -->
						<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="css3" href="img/css3logo.png">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
						<!-- Thumb Image and Description -->
						<img src="img/css3logo.png" alt="CSS 3 merupakan css yang digunkan agar tampilan web lebih menarik dan responsive terhadap segala jenis lebar ukuran layar">
						</li>
						<!-- End Item Project -->
					</ul>
					</section>
				</div>
			</div>
		</div>
<div class="row">
			<div class="col-lg-12">
				<div class="solidline">
				</div>
			</div>
		</div>
		<div class="row">
		<div  ng-view></div>
		</div>
	</div>
	</section>
	<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="widget">
					<h5 class="widgetheading">Bergabunglah bersama kami</h5>
					<address>
					<strong>Gdevelop</strong><br>
					Perum Villa Mutiara Gading 3 Blok G11 NO 21<br>
					 kec.babelan,kab.bekasi utara </address>
					<p>
						<i class="icon-phone"></i> (0895)3455-46308 <br>
						<i class="icon-envelope-alt"></i> juancesarandrianto@gmail.com
					</p>
				</div>
			</div>
			
		
			
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span>&copy; Gdevelop 2016 All right reserved. By </span><a href="http://bootstraptaste.com" target="_blank">Bootstrap Themes</a>
						</p>
                        <!-- 
                            All links in the footer should remain intact. 
                            Licenseing information is available at: http://bootstraptaste.com/license/
                            You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Moderna
                        -->
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>

<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
</body>
</html>