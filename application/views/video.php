<html>
<head>

    
	<script>
	
	</script>
	</head>
<body>
<?php
	if (!$this->ion_auth->logged_in())
		{
			redirect('login');
		}
		?>
	<?php
	$user = $this->ion_auth->user()->row();
	?>
<div class="box-header ui-sortable-handle">
		  <h3 class="box-title">{{name}}</h3>
		  </div>
		  <?php
		  if (!$this->ion_auth->is_admin())
{
}else{
echo"<button class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#myModal\"><i class=\"fa fa-plus\"></i></button>";	
}
?>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Masukkan Video</h4>
      </div>
      <div class="modal-body">
	  <label>Judul Video</label>
        <div class="form-group">
		<input type="text" class = "form-control"ng-model="judul">
		<input type="hidden" class = "form-control"ng-model="id">
		<input type="hidden" class = "form-control" ng-model="user_id" ng-init="user_id=<?php echo $user->user_id;?>">
      </div>
	  <label>Pilihan</label>
        <div class="form-group">
		<select class = "form-control" ng-model="pilihan">
		<option value="1">JQUERY</option>
		<option value="2">PHP Framework</option>
		<option value="3">HTML dan CSS</option>
		<option value="4">PHP Native</option>
		</select>
      </div>
	   <label>isi file</label>
	  <div class="form-group">
	  <input type="file" file-model="myFile" class ="form-control">
	  </div>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" ng-click="tambah()" class="btn btn-primary" data-dismiss="modal">tambah</button>
      </div>
    </div>

  </div>
</div>
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Video</h4>
      </div>
      <div class="modal-body">
	  <label>Judul Video</label>
        <div class="form-group">
		<input type="text" class = "form-control"ng-model="judul">
		<input type="hidden" class = "form-control"ng-model="id">
		<input type="hidden" class = "form-control" ng-model="user_id" ng-init="user_id=<?php echo $user->user_id;?>">
      </div>
	  <label>Pilihan</label>
        <div class="form-group">
		<select class = "form-control" ng-model="pilihan">
		<option value="1">JQUERY</option>
		<option value="2">PHP Framework</option>
		<option value="3">HTML dan CSS</option>
		<option value="4">PHP Native</option>
		</select>
      </div>
	   <label>isi file</label>
	  <div class="form-group">
	  <input type="file" file-model="myFile" class ="form-control">
	  </div>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" ng-click="actionedit()" class="btn btn-success" data-dismiss="modal">Edit</button>
      </div>
    </div>

  </div>
</div>
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Menonton Video</h4>
      </div>
      <div class="modal-body">
	  <label>Judul Video</label>
        <div class="form-group">
		<input type="text" ng-init="judul=judul" class = "form-control"ng-model="judul" disabled>
	  </div>
	   <label>Video</label>
        <div class="form-group">
		 <video width="550" height="400" html5-video='{{ videoSources }}'
        autoplay='true' controls='true'>
    </video>
	  </div>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<table datatable="ng" dt-columns="dtColumns"dt-options="dtOptions"class="table table-bordered table-striped">
<thead>
<th>judul</th>
<th>materi</th>
<th>video</th>
<th>action</th>
</thead>
<tbody>
<tr ng-repeat="item in video">
<td>{{item.judul}}</td>
<td>{{item.materi}}</td>
<td>{{item.video}}</td>
<?php
if (!$this->ion_auth->is_admin()){
	echo"<td><button class='btn btn-primary' data-toggle=\"modal\" data-target=\"#myModal1\" ng-click='view(item)'><i class ='fa fa-tv'></i></button>";
	echo"<button class='btn btn-success' ng-click='download(item.video,item.judul)'><i class ='fa fa-download'></i></button></td>";
}else{
	echo"<td><button class=\"btn btn-success\" ng-click=\"edit(item,judul,video,item.id)\" data-toggle=\"modal\" data-target=\"#myModal2\"id=\"edit\"><i class=\"fa fa-edit\"></i></button>
<button class=\"btn btn-danger\" ng-click=\"hapus(item.id,item.video)\"><i class=\"fa fa-trash\"></i></button></td>";
}
?>
</tr>
</tbody>
</table>
</body>
</html>