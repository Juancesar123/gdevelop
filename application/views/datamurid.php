<html>
<head>
<!-- DataTables -->
	<script>
	
	</script>
	</head>
<body>
<div class="box-header ui-sortable-handle">
		  <h3 class="box-title">{{name}}</h3>
		  </div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form data murid</h4>
      </div>
      <div class="modal-body">
	  <label>nama</label>
        <div class="form-group">
		<input type="hidden" class = "form-control"ng-model="id">
		<input type="text" class = "form-control"ng-model="nama">
		</div>
		<label>bahasa pemrograman</label>
        <div class="form-group">
		<select class = "form-control"ng-model="bahasa">
		<option value="jquery">jquery</option>
		<option value="php framework">php framework</option>
		<option value="HTML dan css">HTML dan css</option>
		<option value="PHP native">PHP native</option>
		</select>
		</div>
		<label>jenis kursus</label>
        <div class="form-group">
		<select class = "form-control"ng-model="jenis">
		<option value="reguler">Reguler</option>
		<option value="private">Private</option>
		</select>
		</div>
		<label>Nomor telpon</label>
        <div class="form-group">
		<input type="text" class ="form-control"ng-model="nomor">
		</div>
	  <label>alamat</label>
        <div class="form-group">
		<textarea class = "form-control" ng-model="alamat"></textarea>
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
<table datatable="ng" dt-columns="dtColumns"dt-options="dtOptions"class="table table-bordered table-striped">
<thead>
<th>Nama</th>
<th>Jenis Kursus</th>
<th>telpon</th>
<th>alamat</th>
<th>Bahasa pemrograman</th>
<th>foto</th>
<?php
if (!$this->ion_auth->is_admin())
{
}else{
	echo"<th>action</th>";
}
?>
</thead>
<tbody>
<tr ng-repeat="item in datamurid">
<td>{{item.nama}}</td>
<td>{{item.jenis}}</td>
<td>{{item.telpon}}</td>
<td>{{item.alamat}}</td>
<td>{{item.pemrograman}}</td>
<td>{{item.foto}}</td>
<?php
if (!$this->ion_auth->is_admin())
{
}else{
echo"<td><button class=\"btn btn-success\" ng-click=\"edit(item,nama,telpon,alamat,pemrograman,foto,item.nip)\" data-toggle=\"modal\" data-target=\"#myModal\"id=\"edit\"><i class=\"fa fa-edit\"></i></button>
<button class=\"btn btn-danger\" ng-click=\"hapus(item.nip)\"><i class=\"fa fa-trash\"></i></button></td>";
}
?>
</tr>
</tbody>
</table>
</body>
</html>