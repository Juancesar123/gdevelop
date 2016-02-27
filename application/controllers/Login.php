<?php
class Login extends CI_Controller{
public function index(){
	$this->load->view('login');
	
	
}
public function pross_login(){
	$nama = xss_clean($_POST['email']);
	$password = xss_clean($_POST['password']);
	$remember = TRUE;
	
	$this->ion_auth->login($nama,$password,$remember);
	
	   redirect('admin');
}
public function register(){
	$this->load->view('register');
}
public function pross_register(){
	$data = (array)json_decode(file_get_contents('php://input'));
	$this->form_validation->set_rules('firstname', 'firstname', 'trim|required|xss_clean');
	$this->form_validation->set_rules('lastname', 'lastname', 'trim|required|xss_clean');
	$this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
	$this->form_validation->set_rules('repassword', 'repassword', 'trim|required|xss_clean');
	if ($this->form_validation->run() == FALSE){
		echo"data gagal di input";
		return false;
	}else{
	$nama = array($data["repass"]);
	$group=array('2');
	$first_name = xss_clean($data["firstname"]);
	$last_name = xss_clean($data["lastname"]);
	$password = xss_clean($data["password"]);
	$additional_data = array(
								'first_name' => $first_name,
								'last_name' => $last_name,
								);
	$email = xss_clean($data["email"]);
		if (!$this->ion_auth->email_check($email))
		{
	$this->ion_auth->register($first_name,$password,$email,$additional_data,$group);
	echo "data sukses di input";
		}else{
			echo"username sudah terdaftar";
		}
	}
}
public function logout(){
	$this->ion_auth->logout();
	redirect('login');
}
public function forgotpass(){
	$this->load->view("forgotpass");
}
public function pross_forgot(){
		$this->form_validation->set_rules('email', 'Email Address', 'required');
			if ($this->form_validation->run() == false) {
				//setup the input
				$this->data['email'] = array('name'    => 'email',
											 'id'      => 'email',
											);
				//set any errors and display the form
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				$this->load->view('auth/forgot_password', $this->data);
			}
			else {
				//run the forgotten password method to email an activation code to the user
				$forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

				if ($forgotten) { //if there were no errors
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
				}
				else {
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect("auth/forgot_password", 'refresh');
				}
			}
}
}
?>