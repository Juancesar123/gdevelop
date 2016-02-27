<html ng-app="api">
<head>
<title>Belajar RES API</title>
<link rel="stylesheet" href="js/bootstrap.css"/>
<link rel="stylesheet" href="js/AdminLTE.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"/>
<script src="js/jQuery-2.1.4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/angular.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script src="https://cdn.firebase.com/js/client/2.2.4/firebase.js"></script>
<script src="js/angular-datatables.min.js"></script>
<script src="js/angularfire.min.js"></script>
<script>
//di bawah ini adalah script angular js. angular.module adalah modul yang akan di inject oleh angular js
//untuk menggunakan firebase anda daftar terlebih dahulu di firebase untuk mendapatkan 
//klw menurut saya api keyny.
var app = angular.module('api',['datatables','firebase']);


//ini adalah controller angular konsepnya sama kya controller di Codeiginiter atau FW lainnya
//bedanya kalau ini framework di frontend. kita masukan fungsi2 yang akan di include di fungsi controller
//$scope.messages adalah data yang di tampilan menggunakan NG-repeat fungsinya sma kya for each
app.controller('resapi',function($scope, $firebaseArray,$http,DTOptionsBuilder,DTColumnBuilder){
  var messagesRef = new Firebase("https://kursus.firebaseio.com/upload");
$scope.messages =  $firebaseArray(messagesRef);
    // create a query for the most recent 25 messages on the server
messagesRef.on('value', function(snapshot) {
   var count = 0;
   snapshot.forEach(function() {
      count++
	  $scope.hitung = count;
   })
});
 
    messagesRef.orderByChild('status').equalTo('baru').once('value', function (dataRef) {
var data = dataRef.val();
var count = 0;
   dataRef.forEach(function() {
      count++
	  console.log(count);
	  $scope.hitung = count;
   })
console.log(data);
});
	 //scope.sve adalah fungsi yang berada di button dngn ng-click='save()'
	 $scope.save = function() {
     $scope.messages.$add({
		 kota:$scope.nama,
		 nama:$scope.kelas
	 });
    };
});
</script>
<body bg-color="red">
<div class="container">
<center><h2 class="title">Form pendaftaran Kursus Web Programing</h2></center>
<div ng-controller="resapi"><!--kita juga harus memanggil controller angular js menggunakan ng-controller-->
<section class="content">
<div class="row">
<div class="col-xs-4">
<div class="form-group">
<label>Masukkan nama</label>
<input type="nama" ng-model="nama" class="form-control">
</div>
<div class="form-group">
<label>Masukkan nama lengkap</label>
<input type="nama" ng-model="kelas" class="form-control">
</div>
<button class="btn btn-primary" ng-click="save()">cek</button><!-- ini adalah fungsi ng-click yg saya jelaskan td-->
{{hitung}}
<ul>

  <h1><li ng-repeat="message in messages">{{ message.jenis }}{{message.kelas}}<!-- ini adalah fungsi ng-repeatnya-->
  <button class="btn btn-danger" ng-click="messages.$remove(message)">Delete</button><!-- ini berfungsi untuk delete data yg berada di firebase-->
  </li></h1>
</ul>
</div>
</div>
</section>
</div>
</div>
</body>
</html>