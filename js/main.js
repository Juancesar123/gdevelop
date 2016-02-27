
var mainApp = angular.module("mainApp", ['ngRoute','datatables','firebase','media']);
 var url='http://localhost/kursus/administrator';
 mainApp.config(function($routeProvider) {
    $routeProvider
        .when('/video', {
            templateUrl: url+'/video',
			controller :'video'
			})
        .when('/code', {
            templateUrl: url+'/code',
			controller :'code'
          
        })
		 .when('/ebook', {
            templateUrl: url+'/ebook',
			controller : 'ebook'
		 })
		 .when('/datamurid', {
            templateUrl: url+'/datamurid',
			controller:'datamurid'
		 }).when('/pengguna', {
            templateUrl: url+'/pengguna',
			controller:'pengguna'
		 }).when('/mailbox', {
            templateUrl: url+'/pesan',
			controller:'mailbox'
		 }) 
});

mainApp.directive('fileModel', ['$parse', function ($parse) {
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
		mainApp.service('fileUpload', ['$http', function ($http,$scope) {
    this.uploadFileToUrl = function(file,user_id,judul,pilihan,uploadUrl){
        var fd = new FormData();
        fd.append('file', file);
        fd.append('judul', judul);
        fd.append('pilihan', pilihan);
        fd.append('user_id', user_id);
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function(data){
			alert("sukses");
			$http.get("ambil_video").success(function(data){
		video = data;
			});
			
        })
        .error(function(){
				alert("data gagal di input");
        });
		
    }
	
}]);
mainApp.service('fileEdit', ['$http', function ($http,$scope) {
    this.uploadFileToUrl = function(file,id,judul,pilihan,uploadUrl){
        var fd = new FormData();
        fd.append('file', file);
        fd.append('judul', judul);
        fd.append('pilihan', pilihan);
        fd.append('id', id);
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function(data){
			alert("sukses");
			$http.get("ambil_video").success(function(data){
		video = data;
			});
			
        })
        .error(function(){
				alert("data gagal di input");
        });
		
    }
	
}]);
mainApp.service('codeUpload', ['$http', function ($http,$scope) {
    this.uploadFileToUrl = function(file,user_id,judul,pilihan,uploadUrl){
        var fd = new FormData();
        fd.append('file', file);
        fd.append('judul', judul);
        fd.append('pilihan', pilihan);
        fd.append('user_id', user_id);
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function(data){
			alert("sukses");
			$http.get("view_code").success(function(data){
		video = data;
			});
			
        })
        .error(function(){
				alert("data gagal di input");
        });
		
    }
	
}]);
mainApp.service('codeEdit', ['$http', function ($http,$scope) {
    this.uploadFileToUrl = function(file,id,judul,pilihan,uploadUrl){
        var fd = new FormData();
        fd.append('file', file);
        fd.append('judul', judul);
        fd.append('pilihan', pilihan);
        fd.append('id', id);
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function(data){
			alert("sukses");
			$http.get("view_code").success(function(data){
		video = data;
			});
			
        })
        .error(function(){
				alert("data gagal di input");
        });
		
    }
	
}]);
mainApp.service('EbookUpload', ['$http', function ($http,$scope) {
    this.uploadFileToUrl = function(user_id,file,judul,pilihan,uploadUrl){
        var fd = new FormData();
        fd.append('file', file);
        fd.append('judul', judul);
        fd.append('pilihan', pilihan);
        fd.append('user_id', user_id);
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function(data){
			alert("sukses");
			$http.get("view_ebook").success(function(data){
		video = data;
			});
			
        })
        .error(function(){
				alert("data gagal di input");
        });
		
    }
	
}]);
mainApp.service('EbookEdit', ['$http', function ($http,$scope) {
    this.uploadFileToUrl = function(file,id,judul,pilihan,uploadUrl){
        var fd = new FormData();
        fd.append('file', file);
        fd.append('judul', judul);
        fd.append('pilihan', pilihan);
        fd.append('id', id);
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function(data){
			alert("sukses");
			$http.get("view_ebook").success(function(data){
		video = data;
			});
			
        })
        .error(function(){
				alert("data gagal di input");
        });
		
    }
	
}]);
mainApp.service('MuridEdit', ['$http', function ($http,$scope) {
    this.uploadFileToUrl = function(file,id,nama,alamat,nomor,jenis,bahasa,uploadUrl){
        var fd = new FormData();
        fd.append('file', file);
        fd.append('nama', nama);
        fd.append('alamat', alamat);
        fd.append('nomor', nomor);
        fd.append('jenis', jenis);
        fd.append('bahasa', bahasa);
        fd.append('id', id);
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function(data){
			alert("sukses");
			$http.get("view_ebook").success(function(data){
		video = data;
			});
			
        })
        .error(function(){
				alert("data gagal di input");
        });
		
    }
	
}]);
mainApp.filter("trustUrl", ['$sce', function ($sce) {
        return function (recordingUrl) {
            return $sce.trustAsResourceUrl(recordingUrl);
        };
    }]);
mainApp.controller('video',function($firebaseArray,$scope,$http,DTOptionsBuilder,fileUpload,DTColumnBuilder,fileEdit){
	$scope.name="video";
    // DataTables configurable options
    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDisplayLength(10)
        .withOption('bLengthChange', false)
        .withOption('autoWidth', false);
$scope.getdata=function(){$http.get('ambil_video').success(function(data){
			$scope.video = data;
		});
}
var messagesRef = new Firebase("https://kursus.firebaseio.com/upload");
$scope.getdata();
	$scope.tambah = function(){
		var postsRef = messagesRef;

		 var newPostRef = postsRef.push();
		 newPostRef.set({
		 nama:$scope.judul,
		 pilihan:$scope.pilihan,
		 jenis:"Video",
		 status:"baru"
	 });
		
		$scope.video = {};
		var uploadUrl = 'insert_video';
		var file = $scope.myFile;
		var judul = $scope.judul;
		var pilihan = $scope.pilihan;
		var video = $scope.video;
		var user_id = $scope.user_id;
		fileUpload.uploadFileToUrl(file,user_id,judul,pilihan,uploadUrl);
		$scope.getdata();
	}
	 $scope.videoSources = [];
        
	$scope.view=function(item){
		$scope.judul = item.judul;
		 $scope.videoSources.push(item.video);
	}
	$scope.download=function(video,judul){
		$http.post("download",{video:video,judul:judul}).success(function(){
			alert("terimakasih sudah mendownload");
		});
	} 
	$scope.edit=function(item,judul,video){
		$scope.judul = item.judul;
		$scope.file = item.video;
		$scope.id = item.id;
	}
	$scope.actionedit=function(){
		var uploadUrl = 'edit_video';
		var file = $scope.myFile;
		var judul = $scope.judul;
		var pilihan = $scope.pilihan;
		var video = $scope.video;
		var id = $scope.id;
		fileEdit.uploadFileToUrl(file,id,judul,pilihan,uploadUrl);
		$scope.getdata();
	}
	$scope.hapus=function(id,video){
		$http.post("hapus_video",{id:id,video:video}).success(function(data){
			alert("data sukses di hapus");
		    $scope.getdata();
		}).error(function(){
			alert("data gagal dihapus");
		});
	}
})
mainApp.controller('code',function($scope,$firebaseArray,$http,DTOptionsBuilder,codeUpload,DTColumnBuilder,codeEdit){
	$scope.code = {};
	$scope.name="Source Code";
    // DataTables configurable options
    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDisplayLength(10)
        .withOption('bLengthChange', false)
        .withOption('autoWidth', false);
		$scope.getdata=function()
		{
			$http.get('view_code').success(function(data){
			$scope.code = data;
		});
		
}
   var messagesRef = new Firebase("https://kursus.firebaseio.com/upload");
	$scope.video = {};
$scope.getdata();
$scope.tambah = function(){
	
		
			var postsRef = messagesRef;

		 var newPostRef = postsRef.push();
		 newPostRef.set({
		 nama:$scope.judul,
		 pilihan:$scope.pilihan,
		 jenis:"source code",
		 status:"baru"
	 });
		var uploadUrl = 'insert_code';
		var file = $scope.myFile;
		var judul = $scope.judul;
		var pilihan = $scope.pilihan;
		var video = $scope.code;
		var user_id = $scope.user_id;
		codeUpload.uploadFileToUrl(file,user_id,judul,pilihan,uploadUrl);
		$scope.getdata();
	}
	$scope.edit=function(item,judul,code,id){
		$scope.judul = item.judul;
		$scope.pilihan = item.materi;
		$scope.id = item.id;
	}
	$scope.download=function(item,code,filename){
		$scope.judul = item.judul;
		$scope.pilihan = item.id_web;
		$http.post("download_code",{code:code,filename:filename}).success(function(data){
			$scope.kode=data;
		})
	}
	$scope.actionedit=function(){
	var uploadUrl = 'ubah_code';
		var file = $scope.myFile;
		var judul = $scope.judul;
		var pilihan = $scope.pilihan;
		var video = $scope.code;
		var id = $scope.id;
		codeEdit.uploadFileToUrl(file,id,judul,pilihan,uploadUrl);
		$scope.getdata();	
	}
	$scope.hapus=function(id,code){
		$http.post("hapus_code",{id:id,code:code}).success(function(){
			alert("data sukses dihapus");
			$scope.getdata();
		});
	}
	
});
mainApp.controller('ebook',function($sce,$scope,$firebaseArray,$http,DTOptionsBuilder,DTColumnBuilder,EbookUpload,EbookEdit){
	  
     var messagesRef = new Firebase("https://kursus.firebaseio.com/upload");
	$scope.name="ebook";
	$scope.ebook = {};
    // DataTables configurable options
    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDisplayLength(10)
        .withOption('bLengthChange', false)
        .withOption('autoWidth', false);
	$scope.getdata= function(){
		$http.get("view_ebook").success(function(data){
			$scope.ebook = data;
		})
	}

  $scope.download=function(item){
	  $scope.judul = item.judul;
		$scope.pilihan = item.materi;
		$scope.ebookku = item.ebook;
  }
	$scope.getdata();
	$scope.tambah=function(){
		var postsRef = messagesRef;

		 var newPostRef = postsRef.push();
		 newPostRef.set({
     nama:$scope.judul,
		 pilihan:$scope.pilihan,
		 jenis:"ebook",
		 status:"baru"
  });
		  
		var uploadUrl = 'insert_ebook';
		var file = $scope.myFile;
		var judul = $scope.judul;
		var pilihan = $scope.pilihan;
		var video = $scope.ebook;
		var user_id = $scope.user_id
		EbookUpload.uploadFileToUrl(user_id,file,judul,pilihan,uploadUrl);
		$scope.getdata();
	}
	$scope.edit=function(item,judul,ebook,id){
		$scope.judul = item.judul;
		$scope.pilihan = item.materi;
		$scope.id = item.id;
	}
	$scope.actionedit=function(){
		var uploadUrl = 'ubah_ebook';
		var file = $scope.myFile;
		var judul = $scope.judul;
		var pilihan = $scope.pilihan;
		var video = $scope.ebook;
		var id = $scope.id;
		EbookEdit.uploadFileToUrl(file,id,judul,pilihan,uploadUrl);
		$scope.getdata();
	}
	
	$scope.hapus=function(id,ebook){
		$http.post("hapus_ebook",{id:id,ebook:ebook}).success(function(){
			alert("data sukses dihapus");
			$scope.getdata();
		})
	}
	
});
mainApp.controller('datamurid',function($scope,$http,DTOptionsBuilder,DTColumnBuilder,MuridEdit){
$scope.name="DATA MURID";
	$scope.datamurid = {};
    // DataTables configurable options
    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDisplayLength(10)
        .withOption('bLengthChange', false)
        .withOption('autoWidth', false);
		$scope.getdata=function(){
			$http.get("lihat_murid").success(function(data){
				$scope.datamurid=data;
			});
		}
		$scope.getdata();
		$scope.hapus=function(nip){
			var status="tidak aktif";
			$http.post("hapus_murid",{status:status,id:nip}).success(function(){
				alert("data berhasil di hapus");
			$scope.getdata();
			})
		};
		$scope.edit=function(item,nama,telpon,alamat,pemrograman,foto,nip){
			$scope.id = item.nip;
			$scope.nama = item.nama;
			$scope.alamat = item.alamat;
			$scope.nomor = item.telpon;
			$scope.jenis = item.jenis;
			$scope.bahasa = item.pemrograman;
			$scope.myFile = item.foto;
		}
		$scope.actionedit=function(){
			var uploadUrl = 'ubah_data';
			var id = $scope.id ;
			var nama= $scope.nama ;
			var alamat = $scope.alamat; 
			var nomor= $scope.nomor;
			var jenis = $scope.jenis ;
			var bahasa = $scope.bahasa ;
			var file= $scope.myFile ;
			MuridEdit.uploadFileToUrl(file,id,nama,alamat,nomor,jenis,bahasa,uploadUrl);
		    $scope.getdata();
		}
		
		});
mainApp.controller('pengguna',function($scope,$http,DTOptionsBuilder,DTColumnBuilder){
	$scope.name="MANAGEMENT PENGGUNA";
 $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDisplayLength(10)
        .withOption('bLengthChange', false)
        .withOption('autoWidth', false);
		$scope.getdata=function(){
			$http.get("ambil_pengguna").success(function(data){
				$scope.pengguna=data;
			});
		}
		$scope.getdata();
		$scope.hapus=function(id){
			$http.post("hapus_user",{id:id}).success(function(data){
				alert("data sukses dihapus");
				$scope.getdata();
			});
		}
		
});
mainApp.controller('mailbox',function($scope,$http,DTOptionsBuilder,DTColumnBuilder){

});