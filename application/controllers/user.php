<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('user_model');
	}

	public function register(){

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 
			'required|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 
			'matches[password]');

		if($this->form_validation->run() === FALSE){
			$this->load->view('navbar');
			$this->load->view('register');
		} else {
            // Encrypt password
			$enc_password = md5($this->input->post('password'));

			$this->user_model->register($enc_password);

            // Tampilkan pesan
			$this->session->set_flashdata('user_registered', 'Anda telah teregistrasi.');

			redirect('blog');
		}

	}


	public function login(){

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('navbar');
			$this->load->view('login');
		} else {
        	// Get username
			$username = $this->input->post('username');
    		// Get & encrypt password
			$password = md5($this->input->post('password'));

    		// Login user
			$user_id = $this->user_model->login($username, $password);

			if($user_id){
        		// Buat session
				$user_data = array(
					'id_user' => $id_user,
					'username' => $username,
					'logged_in' => true
				);

				$this->session->set_userdata($user_data);

       			 // Set message
				$this->session->set_flashdata('user_loggedin', 'You are now logged in');

				redirect('blog');

			} else {
        		// Set message
				$this->session->set_flashdata('login_failed', 'Login is invalid');

				redirect('user/login');
			}       

		}

	}


	public function logout(){
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

        redirect('user/login');
    }






}

/* End of file user.php */
/* Location: ./application/controllers/user.php */


?>