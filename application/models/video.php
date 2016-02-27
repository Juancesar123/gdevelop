<?php
class Video extends CI_model{
	public function select_video(){
		$sql = "SELECT video.id,video.id_web,video.judul,video.video,web.materi FROM video LEFT JOIN web ON video.id_web = web.id ";
		return $this->db->query($sql)->result();
	}
	public function select_code(){
		$sql = "SELECT code.filename,code.id,code.id_web,code.judul,code.code,web.materi FROM code LEFT JOIN web ON code.id_web = web.id ";
		return $this->db->query($sql)->result();
	}
	public function select_web(){
		$sql = "SELECT ebook.id,ebook.id_web,ebook.judul,ebook.ebook,web.materi FROM ebook LEFT JOIN web ON ebook.id_web = web.id ";
		return $this->db->query($sql)->result();
	}
	public function ambil_download(){
	$sql="SELECT * FROM upload";
	return $this->db->query($sql)->result();
	}
	public function ambil_user(){
		$sql ="SELECT last_login from users";
		return $this->db->query($sql)->result();
	}
	public function notification(){
	$sql="SELECT upload.jenis_share, users.first_name FROM upload LEFT JOIN users ON upload.uploaded_by = users.id where status = 'baru'";
	return $this->db->query($sql)->result();
	}
	public function all_notification(){
	$sql="SELECT upload.jenis_share, users.first_name FROM upload LEFT JOIN users ON upload.uploaded_by = users.id";
	return $this->db->query($sql)->result();
	}
}
?>