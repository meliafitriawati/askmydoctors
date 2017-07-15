<?php
class Madmin extends CI_model{

    public function getlogin($u, $p){
        $this->db->where('username',$u);
        $pw = md5($p);
        $this->db->where('password',$pw);    
        $query = $this->db->get('tb_admin');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row) {
                $sess = array('username' => $row->username, 'nama_admin' => $row->nama);
                $this->session->set_userdata($sess);
                redirect("".base_url()."admin");
            }
        }
        else
        {
            $this->session->set_flashdata('info','Username dan password salah!');
            redirect("".base_url()."admin/login");
        }
    }

    //SPESIALISASI
    function getAllSpesialisasi(){
        $query = $this->db->query('SELECT * FROM tb_spesialisasi ORDER BY nama_spesialisasi');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    function spesialisasiById($id){
        $sql = "SELECT * FROM tb_spesialisasi WHERE id=$id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data;
        } else {
            return false;
        }
    }

    function updateSpesialisasiById(){
        $id = $this->input->post('inputID');
        $data['id'] = $id;
        $data['nama_spesialisasi'] = $this->input->post('inputEditNama');

        $this->db->where('id', $id);
        $this->db->update('tb_spesialisasi', $data);
        return true;
    }

    function addSpesialisasi(){
        $this->db->from("tb_spesialisasi");
        $data['nama_spesialisasi'] = $this->input->post('inputNama');
        $this->db->insert("tb_spesialisasi", $data);
    }

    function deleteSpesialisasi($id){
        $sql = "DELETE FROM tb_spesialisasi WHERE id='$id'";
        $query = $this->db->query($sql);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    //DOKTER
    function getAllDokter(){
        $query = $this->db->query('SELECT * FROM view_dokter');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    function addDokter(){
        $this->db->from("tb_dokter");
        $data['username'] = $this->input->post('inputUsername');
        $data['password'] = md5($this->input->post('inputPassword'));
        $data['email'] = $this->input->post('inputEmail');
        $data['fullname'] = $this->input->post('inputFullname');
        $data['gender'] = $this->input->post('inputJK');
        $data['hak_akses'] = 2;
        $data['id_spesialisasi'] = $this->input->post('inputSpesialisasi');
        $data['tentang'] = $this->input->post('inputAbout');
        $data['pendidikan'] = $this->input->post('inputPendidikan');
        $data['nama_klinik'] = $this->input->post('inputKlinik');
        $data['lokasi'] = $this->input->post('inputLokasi');
        $data['kota'] = $this->input->post('inputKota');

        if ($data['gender']=="Laki-laki") {
            $data['image'] = "dokter_man.png";
        }else if ($data['gender']=="Perempuan") {
            $data['image'] = "dokter_woman.png";
        }

        $this->db->insert("tb_dokter", $data);
    }

    function deleteDokter($username){
        $sql = "DELETE FROM tb_dokter WHERE username='$username'";
        $query = $this->db->query($sql);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function dokterById($username){
        $sql = 'SELECT * FROM tb_dokter WHERE username="'.$username.'"';
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data;
        } else {
            return false;
        }
    }

    function updateDokterById(){
        $username = $this->input->post('inputEditUsername');
        
        $data['username'] = $this->input->post('inputEditUsername');
        $data['email'] = $this->input->post('inputEditEmail');
        $data['fullname'] = $this->input->post('inputEditFullname');
        $data['gender'] = $this->input->post('inputEditJK');
        $data['id_spesialisasi'] = $this->input->post('inputEditSpesialisasi');
        $data['tentang'] = $this->input->post('inputEditAbout');
        $data['pendidikan'] = $this->input->post('inputEditPendidikan');
        $data['nama_klinik'] = $this->input->post('inputEditKlinik');
        $data['lokasi'] = $this->input->post('inputEditLokasi');
        $data['kota'] = $this->input->post('inputEditKota');

        if ($data['gender']=="Laki-laki") {
            $data['image'] = "dokter_man.png";
        }else if ($data['gender']=="Perempuan") {
            $data['image'] = "dokter_woman.png";
        }

        $this->db->where('username', $username);
        $this->db->update('tb_dokter', $data);
        return true;
    }

    //PASIEN
    function getAllPasien(){
        $query = $this->db->query('SELECT * FROM tb_user');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    function deleteUser($username){
        $sql = "DELETE FROM tb_user WHERE username='$username'";
        $query = $this->db->query($sql);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    //PERTANYAAN
    function getAllPertanyaan(){
        $query = $this->db->query('SELECT * FROM view_pertanyaan');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    //ARTIKEL
    function getAllArtikel(){
        $query = $this->db->query('SELECT * FROM tb_artikel');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    //NOTIF

    function getIdSpesialisasi($id_pertanyaan){
        $this->db->where('id_diskusi', $id_pertanyaan);
        // here we select every column of the table
        $q = $this->db->get('tb_diskusi');
        $data = $q->result_array();

        return $data[0]['id_spesialis'];
    }

    function getTokenbyID($id){
        $sql = "SELECT * FROM tb_dokter WHERE id_spesialisasi='$id'";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }

}