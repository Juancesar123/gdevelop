<!DOCTYPE html>
<?php  header("Access-Control-Allow-Origin: *");?>
<html  ng-app="api"lang="en">
<head>
<meta charset="utf-8">
<title>Gdevelop web programing course</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />
<link rel="shortcut icon" href="img/logo2.png"/>
<!-- css -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"/>
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">

<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<script src="js/jQuery-2.1.4.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js" type="text/javascript"></script>
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
<script src="js/angular.js"  ></script>
<script src="js/angular-datatables.min.js"  ></script>



<!-- Theme skin -->
<link href="skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<script>
var app = angular.module('api',['datatables']);
var $scope;
 app.directive('fileModel', ['$parse', function ($parse) {
            return {
               restrict: 'A',
               link: function(scope, element, attrs) {
                  var model = $parse(attrs.fileModel);
                  var modelSetter = model.assign;
                 
                  element.bind('change', function(){
                     scope.$apply(function(){
                        modelSetter(scope, element[0].files[0]);
                     });
                  });
               }
            };
         }]);
		app.service('fileUpload', ['$http', function ($http,$scope) {
    this.uploadFileToUrl = function(file,nama,alamat,jenis,telpon,pemrog,uploadUrl){
        var fd = new FormData();
        fd.append('file', file);
        fd.append('nama', nama);
        fd.append('alamat', alamat);
        fd.append('jenis', jenis);
        fd.append('telpon', telpon);
        fd.append('pemrog', pemrog);
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function(data){
			alert(data);
			$http.get('lihat')
        .success(function(data) {
        pegawai = data;
		
        });
			
			
        })
        .error(function(){
				alert("data gagal di input");
			
        });
		
    }
	
}]);


app.controller('resapi',function($scope,$http,fileUpload,DTOptionsBuilder,DTColumnBuilder){

    // DataTables configurable options
    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDisplayLength(10)
        .withOption('bLengthChange', false)
        .withOption('autoWidth', false);
		$scope.dtColumns=[
		DTColumnBuilder.newColumn('nama').withTitle('Nama'),
        DTColumnBuilder.newColumn('jenis').withTitle('jenis'),
        DTColumnBuilder.newColumn('alamat').withTitle('alamat'),
        DTColumnBuilder.newColumn('pemrograman').withTitle('pemrograman'),
        DTColumnBuilder.newColumn('foto').withTitle('foto')
		];
		$scope.dapatkandata=function()
		{
		$http.get('lihat')
        .success(function(data) {
        $scope.pegawai = data;
		
        })
		}
		$scope.dapatkandata();
	$scope.save=function(){
		if ($scope.userForm.$valid) {
		var url = "lihat";
		var uploadUrl = 'insert_data';
		var file = $scope.myFile;
		var nama = $scope.nama;
		var jenis = $scope.jenis;
		var alamat = $scope.alamat;
		var telpon = $scope.telpon;
		var pegawai = $scope.pegawai;
		var pemrog = $scope.pemrog;
		var dataku = $scope.dapatkandata();
		var pesan = $scope.alert;
		fileUpload.uploadFileToUrl(file,nama,alamat,jenis,telpon,pemrog,uploadUrl);
		$scope.dapatkandata();
		$scope.nama = '';
		$scope.jenis = '';
		$scope.alamat = '';
		$scope.telpon = '';
		$scope.pemrog = '';
		$scope.capcta;
		}else{
			alert("mohon cek kembali form anda");
			return false;
		}
		};
	$scope.ubah=function(item,nip,nama,alamat){
		$scope.nip = item.nip;
		$scope.nama = item.nama;
		$scope.alamat = item.alamat;
		$scope.foto = item.foto;
		
	};
	
});
</script>
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
                        <li ><a href="home">Home</a></li>
                        <li ><a href="harga">Info</a></li>
                        <li class="active"><a href="pendaftaran">Pendaftaran Kursus</a></li>
                        <li><a href="about">About</a></li>
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
			<div class="container">
<h2 class="title">Form pendaftaran Kursus Web Programing</h2>
<div ng-controller="resapi">
<section class="content">
<div class="row">
<div class="col-xs-12">

<div ng-show="alert" class="alert alert-success alert-dismissable">Data sukses di input</div>
  <form name="userForm"  novalidate>

<div class="form-group" ng-class="{ 'has-error' : userForm.nama.$invalid && !userForm.nama.$pristine }">
<label>Nama</label>
<input type="text" class="form-control" name="nama" ng-model="nama" required>
<p ng-show="userForm.nama.$invalid && !userForm.nama.$pristine" class="help-block">Nama Harus Disii</p>
</div>
<div class="form-group" ng-class="{ 'has-error' : userForm.telpon.$invalid && !userForm.telpon.$pristine }">
<label>No.telpon</label>
<input type="number" ng-minlength="3" ng-maxlength="14" class="form-control" name="telpon"ng-model="telpon">
<p ng-show="userForm.telpon.$error.minlength" class="help-block">Nomor telpon terlalu pendek</p>
 <p ng-show="userForm.telpon.$error.maxlength" class="help-block">Nomor Telpon terlalu panjang</p>
</div>
<div class="form-group">
<label>Pilih Jenis Kursus</label>
<select type="text" class="form-control" ng-model="jenis">
<option value="reguler">Reguler (RP 30.000,00 / sesi)</option>
<option value="private">Private (RP 40.000,00 / sesi)</option>
</select>
</div>
<div class="form-group">
<label>Alamat</label>
<textarea class="form-control" ng-model="alamat"></textarea>
</div>
<div class="form-group">
<label>Pilih bahasa pemrograman web yang ingin di kuasai</label>
<div class="radio">
  <label><input type="radio" ng-model="pemrog" value="HTML dan CSS">HTML dan CSS</label>
</div>
<div class="radio">
  <label><input type="radio" ng-model="pemrog"value="PHP Native" >PHP Native</label>
</div>
<div class="radio">
  <label><input type="radio" ng-model="pemrog"value="jquery">jquery dan Ajax</label>
</div>
<div class="radio">
  <label><input type="radio" ng-model="pemrog" value="PHP framework CodeIgniter">PHP Framework CodeIgnitier</label>
</div>

</div>
<div class="form-group">
<label>Foto</label>
<input type="file" class="form-control" file-model="myFile">
<div class="g-recaptcha" data-sitekey="6LdAFxYTAAAAAIQKOhHtHbSlwdDJtqCluiw6_p9p"></div>
<button class="btn btn-primary" ng-click="save()">Tambah</button>

</div>
</form>
<h6>Catatan:  untuk private per sesi 2 jam dan untuk reguler 2 jam.</p>
              private sabtu malam dan minggu sore untuk reguler selasa,rabu,jum'at jam pkl 18.00 WIB- pkl 19.00 WIB</h6>

</div>
</br>

<div class="row">
<div class="col-xs-12">
<h3>yang telah mendaftar di kursus</h3>
<table datatable="ng" dt-columns="dtColumns"dt-options="dtOptions"class="table table-bordered table-striped">

<tbody>
<tr ng-repeat="item in pegawai">
<td>{{item.nama}}</td>
<td>{{item.jenis}}</td>
<td>{{item.alamat}}</td>
<td>{{item.pemrograman}}</td>
<td><image src="{{item.foto}}" width="70"></td>
</tr>
</tbody>
</table>
</div>
</div>
</section>
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



</body>
</html>