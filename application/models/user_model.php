<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function register($enc_password){
       // Array data user
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $enc_password,
			'type' => $this->input->post('type'),
		);

       // Insert user
		return $this->db->insert('user', $data);
	}

	 public function login($username, $password){
       // Validasi
       $this->db->where('username', $username);
       $this->db->where('password', $password);

       $result = $this->db->get('user');


       if($result->num_rows() > 0 ){
           return $result->row(0)->id_user;
       } else {
           return false;
       }
   }

   public function getType($username, $password){
       // Validasi
       $this->db->where('username', $username);
       $this->db->where('password', $password);

       $result = $this->db->get('user');


       if($result->num_rows() > 0 ){
           return $result->row(0)->type;
       } else {
           return false;
       }
   }


	

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */


?>