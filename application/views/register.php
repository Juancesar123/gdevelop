<!DOCTYPE html>
<html ng-app="app">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gdevelop | Registration Page</title>
	<link rel="shortcut icon" href="img/logo2.png"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
	<script src="js/angular.js"  ></script>
	<script src="https://cdn.firebase.com/js/client/2.2.4/firebase.js"></script>
	<script src="js/angularfire.min.js"></script>
		<style type="text/css">
  .css-form input.ng-invalid.ng-touched {
    background-color: #FA787E;
  }

  .css-form input.ng-valid.ng-touched {
    background-color: #78FA89;
  }
  .msg-block {
    margin-top:5px;
}
.msg-error {
    color:#F00;
    font-size:14px;
}
</style>
	<script>
	var myapp = angular.module('app',["firebase","myApp.directives"]);
angular.module('myApp.directives', [])
    .directive('pwCheck', [function () {
    return {
        require: 'ngModel',
        link: function (scope, elem, attrs, ctrl) {
            var firstPassword = '#' + attrs.pwCheck;
            elem.add(firstPassword).on('keyup', function () {
                scope.$apply(function () {
                    // console.info(elem.val() === $(firstPassword).val());
                    ctrl.$setValidity('pwmatch', elem.val() === $(firstPassword).val());
                });
            });
        }
    }
}]);
	myapp.controller('myctrl',function($scope,$http,$firebaseArray){
		$scope.pw1 = 'password';
		var messagesRef = new Firebase("https://kursus.firebaseio.com/register");
		$scope.save=function(){
			
			var postsRef = messagesRef;
         if($scope.firstname==null||$scope.lastname==null||$scope.password==null||$scope.repass==null||$scope.email==null){
			 alert("semua form harus di isi");
			 $scope.firstname='';
			 $scope.lastname='';
			 $scope.password='';
			 $scope.repass='';
			 $scope.email='';
			 return false;
		 }else{
		 var newPostRef = postsRef.push();
		 newPostRef.set({
         nama:$scope.firstname,
		 email:$scope.email,
		 last_name:$scope.lastname
  });
			$http.post("daftar",{firstname:$scope.firstname,lastname:$scope.lastname,email:$scope.email,password:$scope.password,repass:$scope.repass}).success(function(data){
				alert(data);
		     $scope.firstname='';
			 $scope.lastname='';
			 $scope.password='';
			 $scope.repass='';
			 $scope.email='';
			 $window.location.href("login");
			}).error(function(data){
				alert("gagal");
			});
		}
		}
	});
	</script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="#"><b>G</b>Develop</a>
      </div>

      <div class="register-box-body" ng-controller="myctrl" >
        <p class="login-box-msg">Register a new membership</p>
		<p> semua harus diisi</p>
		<form name='myForm'>
		<div novalidate class="css-form">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" ng-model="firstname" name="firstname"placeholder="first name" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
		   <div class="form-group has-feedback">
            <input type="text" class="form-control" ng-model="lastname" name="lastname" placeholder="Last Name" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" ng-model="email"name="email"placeholder="Email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" id="password" name="password" ng-model="password" ng-required=""class="form-control" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          
		  </div>
          <div class="form-group has-feedback">
            <input type="password" id="repassword" name="repassword"  ng-required="" ng-model="repass"class="form-control" placeholder="Retype password" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
		  <div class="msg-block" ng-show="myForm.$error"> <span class="msg-error" ng-show="myForm.pw2.$error.pwmatch">Passwords don't match.</span> 
		  </div>
		  </form>
          <div class="row">
         
            <div class="col-xs-4">
              <button  ng-click="save()"class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
      

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat" disabled><i class="fa fa-facebook"></i> Sign up using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"disabled><i class="fa fa-google-plus"></i> Sign up using Google+</a>
        </div>

        <a href="login" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
