<?php
class Muser extends CI_model{
	public function getlogin($u, $p, $user){
		if ($user == "dokter") {
			$this->db->where('username',$u);
	        $pw = md5($p);
	        $this->db->where('password',$pw);    
	        $query = $this->db->get('tb_dokter');
	        if($query->num_rows()>0)
	        {
	            foreach ($query->result() as $row) {
	                $sess = array('username' => $row->username, 'nama_dokter' => $row->fullname, 'hak_akses' => $row->hak_akses);
	                $this->session->set_userdata($sess);
	                redirect("".base_url()."home");
	            }
	        }
	        else
	        {
	            $this->session->set_flashdata('info','Username dan password salah!');
	            redirect("".base_url()."login/dokter");
	        }
		}elseif ($user == "pasien") {
			$this->db->where('email',$u);
	        $pw = md5($p);
	        $this->db->where('password',$pw);

	        $query = $this->db->get('tb_user');
	        if($query->num_rows()>0)
	        {
	            foreach ($query->result() as $row) {
	                $sess = array('username' => $row->username, 'nama_pengguna' => $row->fullname, 'hak_akses' => $row->hak_akses);
	                $this->session->set_userdata($sess);
	                redirect("".base_url()."home");
	            }
	        }
	        else
	        {
	            $this->session->set_flashdata('info','Email dan password salah!');
	            redirect("".base_url()."login");
	        }
		}
        
    }

    public function get_user($email, $password){
        $this->db->from('tb_user');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_dokter($username, $password){
    	$this->db->from('tb_dokter');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function deleteUser($username){
    	// $this->db->insert('tb_artikel', $data);
     //    $insert_id = $this->db->insert_id();
    }

    public function updateTokenUser($email,$token){
        $data['token'] = $token;

        $this->db->where('email', $email);
        $this->db->update('tb_user', $data);

        return true;
    }

    function updateTokenDokter($username, $token){
    	$data['token'] = $token;

        $this->db->where('username', $username);
        $this->db->update('tb_dokter', $data);

        return true;
    }

    public function getTokenUser($id){
    	$this->db->where('username', $id);
		// here we select every column of the table
		$q = $this->db->get('tb_user');
		$data = $q->result_array();

		return $data[0]['token'];
    }

    public function getTokenDokter($id){
    	$this->db->where('username', $id);
		// here we select every column of the table
		$q = $this->db->get('tb_dokter');
		$data = $q->result_array();

		return $data[0]['token'];
    }

    public function getNamaDokter($pengirim){
    	$this->db->where('username', $pengirim);
		// here we select every column of the table
		$q = $this->db->get('tb_dokter');
		$data = $q->result_array();

		return $data[0]['fullname'];
    }

    public function dataRegister($data){
    	$this->db->insert('tb_user', $data);

        return TRUE;
    }

    public function cek_user($username){
    	$this->db->from('tb_user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
        	return TRUE;
        }else{
        	return FALSE;
        }
    }

    public function cek_email($email){
    	$this->db->from('tb_user');
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        	return TRUE;
        }else{
        	return FALSE;
        }
    }
}
