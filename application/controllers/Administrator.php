<?php
class Administrator extends CI_Controller{
	public function index(){
		$this->load->view('admin');
	}
	public function murid(){
		$this->load->view('murid');
	}
	public function video(){
	$this->load->view('video');	
	}
	public function ebook(){
		$this->load->view("ebook");
	}
	public function ambilvideo(){
		$this->load->model("video","model_admin");
$q=$this->model_admin->select_video();
	echo json_encode($q);
	}
	public function pesan(){
		$this->load->view("mailbox");
	}
	public function download(){
		$data = (array)json_decode(file_get_contents('php://input'));
header("Content-Type: octet/stream");
  header("Content-Disposition: attachment;
filename='juan.mp4'");  
  $folder = $data["video"];
  
  $fp = fopen($folder.$_GET['file'], "r");
  $data = fread($fp, filesize($folder.$_GET['file']));
  fclose($fp);
  print $data;
	}
	public function ambildownload(){
		$this->load->model("video","model_admin");
		$q= $this->model_admin->ambil_download();
		$jumlah = count($q);

		echo json_encode($jumlah);
	}
	public function code(){
		$this->load->view("code");
		
	}
	public function notif(){
		$this->load->model("video","model_admin");
		$q= $this->model_admin->notification();
		$jumlah = count($q);
		echo json_encode ($jumlah);
	}
	public function tampil_semua_notif(){
		$this->load->model("video","model_admin");
		$data["raw_data"]= $this->model_admin->all_notification();
		$this->load->view("listview",$data);
	}
	public function ubahnotif(){
		$notif = $this->input->post("status");
		$val=array(
		"status" =>$notif
		);
		$this->db->update("upload",$val);
	}
	public function ambil_user(){
		$this->load->model("video","model_admin");
		$q= $this->model_admin->ambil_download();
		$jumlah = count($q);
		echo json_encode ($jumlah);
	}
	public function datamurid(){
		$this->load->view("datamurid");
	}
	public function lihatcode(){
		$this->load->model("video","model_admin");
		$q=$this->model_admin->select_code();
		echo json_encode($q);
	}
	public function insertcode(){
		$this->load->helper('date');
		$date = date('Y-m-d H:i:s');
		$time = date('YmdHis');
		$config['upload_path']          = 'code/';
        $config['allowed_types']        = 'php|html|css|js';
		$config['file_name'] 			= "F".$time;
		
		$this->load->library('upload', $config);
		 $this->upload->do_upload('file');
		
			$extendtion = explode(".", $_FILES['file']['name']);
			$foto_path = "code/F".$time.".".$extendtion[count($extendtion)-1];
                				//Simpan data ke mysql
   $name = $_FILES['file']['name'];
   $val=array(
    'judul' => $this->input->post("judul"),
    'id_web' => $this->input->post("pilihan"),
	'code' =>$foto_path,
	'filename' =>$name
   );
   $code="source code";
  $val2 =array(
   'jenis' =>$this->input->post("pilihan"),
   'uploaded_by' =>$this->input->post("user_id"),
   'jenis_share' =>$code
   );    
   $this->db->insert('code', $val);
   $this->db->insert('upload', $val2);
		
	}
	public function download_code(){
		$data = (array)json_decode(file_get_contents('php://input'));
		$filename = $data["filename"];
		$code = file_get_contents($data["code"]);
	    force_download($filename,$code);
	}
	public function download_ebook(){
		$data = (array)json_decode(file_get_contents('php://input'));
		$name = $data["judul"];
		$code = $data["ebook"];
		force_download($code,NULL);
	}
	public function hapuscode(){
		$data = (array)json_decode(file_get_contents('php://input'));
		unlink($data["code"]);
		$this->db->where("id",$data["id"]);
		$this->db->delete("code");
	}
	public function ubahcode(){
		$this->load->helper('date');
		$date = date('Y-m-d H:i:s');
		$time = date('YmdHis');
		$config['upload_path']          = 'code/';
        $config['allowed_types']        = 'php|html|css|js';
		$config['file_name'] 			= "F".$time;
		
		$this->load->library('upload', $config);
		 $this->upload->do_upload('file');
		
			$extendtion = explode(".", $_FILES['file']['name']);
			$foto_path = "code/F".$time.".".$extendtion[count($extendtion)-1];
                				//Simpan data ke mysql
   $val=array(
    'judul' => $this->input->post("judul"),
    'id_web' => $this->input->post("pilihan"),
	'code' =>$foto_path
   );
   $this->db->where('id', $this->input->post("id"));
   $this->db->update('code', $val);
		
	}
	public function ubahvideo(){
		$this->load->helper('date');
		$date = date('Y-m-d H:i:s');
		$time = date('YmdHis');
		$config['upload_path']          = 'film/';
        $config['allowed_types']        = 'mkv|mp4|oog';
		$config['file_name'] 			= "F".$time;
		
		$this->load->library('upload', $config);
		 $this->upload->do_upload('file');
		
			$extendtion = explode(".", $_FILES['file']['name']);
			$foto_path = "film/F".$time.".".$extendtion[count($extendtion)-1];
                				//Simpan data ke mysql
   $val=array(
    'judul' => $this->input->post("judul"),
    'id_web' => $this->input->post("pilihan"),
	'video' =>$foto_path
   );
   $id= $this->input->post("id");
   $this->db->where('id',$id);
   $this->db->update('video', $val);
	}
	public function insertvideo(){
		$this->load->helper('date');
		$date = date('Y-m-d H:i:s');
		$time = date('YmdHis');
		$config['upload_path']          = 'film/';
        $config['allowed_types']        = 'mkv|mp4|oog';
		$config['file_name'] 			= "F".$time;
		
		$this->load->library('upload', $config);
		 $this->upload->do_upload('file');
		
			$extendtion = explode(".", $_FILES['file']['name']);
			$foto_path = "film/F".$time.".".$extendtion[count($extendtion)-1];
	$video="video";
  $val2 =array(
   'jenis' =>$this->input->post("pilihan"),
   'uploaded_by' =>$this->input->post("user_id"),
   'jenis_share' =>$video
   );           				//Simpan data ke mysql
   $val=array(
    'judul' => $this->input->post("judul"),
    'id_web' => $this->input->post("pilihan"),
	'video' =>$foto_path
   );
   $this->db->insert('video', $val);
   $this->db->insert('upload', $val2);
	}
	public function hapus(){
		$data = (array)json_decode(file_get_contents('php://input'));
		echo json_encode($data["id"]);
                        //Simpan data ke mysql
  unlink($data["video"]);
   $this->db->where('video.id',$data['id']);
   $this->db->delete('video');
	}
	public function lihatebook(){
	$this->load->model("video","model_admin");
		$q=$this->model_admin->select_web();
		echo json_encode($q);	
	}
	public function simpanebook(){
		$this->load->helper('date');
		$date = date('Y-m-d H:i:s');
		$time = date('YmdHis');
		$config['upload_path']          = 'ebook/';
        $config['allowed_types']        = 'pdf';
		$config['file_name'] 			= "F".$time;
		
		$this->load->library('upload', $config);
		 $this->upload->do_upload('file');
		
			$extendtion = explode(".", $_FILES['file']['name']);
			$foto_path = "ebook/F".$time.".".$extendtion[count($extendtion)-1];
                				//Simpan data ke mysql
   $val=array(
    'judul' => $this->input->post("judul"),
    'id_web' => $this->input->post("pilihan"),
	'ebook' =>$foto_path
   );
   $ebook="ebook";
   $val2 =array(
   'jenis' =>$this->input->post("pilihan"),
   'uploaded_by' =>$this->input->post("user_id"),
   'jenis_share' =>$ebook
   );
   $this->db->insert('ebook', $val);
   $this->db->insert('upload', $val2);
	}
	public function actionedit(){
		$this->load->helper('date');
		$date = date('Y-m-d H:i:s');
		$time = date('YmdHis');
		$config['upload_path']          = 'ebook/';
        $config['allowed_types']        = 'pdf';
		$config['file_name'] 			= "F".$time;
		
		$this->load->library('upload', $config);
		 $this->upload->do_upload('file');
		
			$extendtion = explode(".", $_FILES['file']['name']);
			$foto_path = "ebook/F".$time.".".$extendtion[count($extendtion)-1];
                				//Simpan data ke mysql
   $val=array(
    'judul' => $this->input->post("judul"),
    'id_web' => $this->input->post("pilihan"),
	'ebook' =>$foto_path
   );
   $this->db->where('id',$this->input->post('id'));
   $this->db->update('ebook', $val);
		
	}
	public function hapusebook(){
		$data = (array)json_decode(file_get_contents('php://input'));
		echo json_encode($data["id"]);
                        //Simpan data ke mysql
  unlink($data["ebook"]);
   $this->db->where('ebook.id',$data['id']);
   $this->db->delete('ebook');
	}
	public function lihatmurid(){
		$this->db->select("*");
		$this->db->where("status","aktif");
		$q = $this->db->get('pegawai');
	echo json_encode($q->result_array());
	}
	public function hapusdata(){
		$data = (array)json_decode(file_get_contents('php://input'));
		echo json_encode($data);
		$val = array(
		'status'=>$data["status"]
		);
		$this->db->where("nip",$data["id"]);
		$this->db->update("pegawai",$val);
	}
	public function ubahdata(){
		$this->load->helper('date');
		$date = date('Y-m-d H:i:s');
		$time = date('YmdHis');
		$config['upload_path']          = 'gambar/';
        $config['allowed_types']        = 'jpg|gif|jpeg|png';
		$config['file_name'] 			= "F".$time;
		
		$this->load->library('upload', $config);
		 $this->upload->do_upload('file');
		
			$extendtion = explode(".", $_FILES['file']['name']);
			$foto_path = "gambar/F".$time.".".$extendtion[count($extendtion)-1];
                				//Simpan data ke mysql
   $val=array(
    'nama' => $this->input->post("nama"),
    'alamat' => $this->input->post("alamat"),
    'telpon' => $this->input->post("nomor"),
    'jenis' => $this->input->post("jenis"),
    'pemrograman' => $this->input->post("bahasa"),
	'foto' =>$foto_path
   );
   $this->db->where('nip',$this->input->post('id'));
   $this->db->update('pegawai', $val);
	}
	public function select_pengguna(){
		$q = $this->db->get('users');
		echo json_encode($q->result_array());
	}
	public function pengguna(){
		$this->load->view("pengguna");
	}
	public function hapususer(){
		$data = (array)json_decode(file_get_contents('php://input'));
		echo json_encode($data["id"]);
		
		$this->ion_auth->delete_user($data["id"]);
	}
}
?>