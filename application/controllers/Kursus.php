<?php if(! DEFINED('BASEPATH'))EXIT('No script accsess allowed');
class Kursus extends CI_Controller{
	public function index(){
		
		$this->load->view('home');	

		
	}
	public function harga(){
		$this->load->view('harga');
	}
	public function pendaftaran(){
		 $data["user"] = $this->ion_auth->user()->row();
		$this->load->view('pendaftaran',$data);
	}
	public function about(){
		$this->load->view('about');
	}
	public function coba(){
	$q = $this->db->get('pegawai');
	echo json_encode($q->result_array());
	}
	public function video(){
		$this->load->view('video');
	}
	public function source(){
		$this->load->view('source');
	}
	public function kontak(){
		$this->load->view('kontak');
	}
	function insert(){
 $this->load->helper('date');
		$date = date('Y-m-d H:i:s');
		$time = date('YmdHis');
		$config['upload_path']          = 'gambar/';
        $config['allowed_types']        = 'jpg|png|gif';
		$config['file_name'] 			= "F".$time;
		
		$this->load->library('upload', $config);
	$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required|min_length[5]|max_length[100]|xss_clean');
		$this->form_validation->set_rules('jenis', 'jenis', 'trim|required|xss_clean');
		$this->form_validation->set_rules('telpon', 'telpon', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('pemrog', 'pemrog', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE)
		{
			echo " data gagal di input" ;
			return false;
		}
		else if($this->upload->do_upload('file')){
			echo"sukses";
			
		 
		
			$extendtion = explode(".", $_FILES['file']['name']);
			$foto_path = "gambar/F".$time.".".$extendtion[count($extendtion)-1];
             $nama = htmlspecialchars($this->input->post("nama")) ;  				//Simpan data ke mysql
             $alamat = htmlspecialchars($this->input->post("alamat"));   				//Simpan data ke mysql
             $jenis = htmlspecialchars($this->input->post("jenis")) ;  				//Simpan data ke mysql
             $telpon = htmlspecialchars($this->input->post("telpon"));   				//Simpan data ke mysql
             $pemrog = htmlspecialchars($this->input->post("pemrog")); 

				$enkrpsinama = $this->encrypt->encode($nama);
				$enkrpsialamat = $this->encrypt->encode($alamat);
				$enkrpsijenis = $this->encrypt->encode($jenis);
				$enkrpsitelpon = $this->encrypt->encode($telpon);
				$enkrpsipemrog = $this->encrypt->encode($pemrog);
			 //Simpan data ke mysql
   $val=array(
    'nama' => $this->encrypt->decode($enkrpsinama),
    'alamat' => $this->encrypt->decode($enkrpsialamat),
    'jenis' => $this->encrypt->decode($enkrpsijenis),
    'telpon' => $this->encrypt->decode($enkrpsitelpon),
	 'pemrograman' =>$this->encrypt->decode($enkrpsipemrog),
	'foto' =>$foto_path
   );
   $this->db->insert('pegawai', $val);
		}else{
			echo"masukkan file gambar";
			return false;
		}
		}
	
}
?>