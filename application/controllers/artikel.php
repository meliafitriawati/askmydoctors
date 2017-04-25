<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('martikel');	
    }

    public function index()
	{
		$data['artikel'] = $this->martikel->getArtikel();
		$this->load->view('user/artikel', $data);
	}

	public function tambah()
	{
		$this->load->view('user/tambah_artikel');
	}

	public function in(){
		$judul = $this->input->post('judul');
		$artikel = $this->input->post('news_detail');
		$waktu = date('Y-m-d H:i:s');
		$publisher = "meliafitriawati";
		$kode_publisher = 2;

		$data = array('judul' => $judul, 'artikel' => $artikel, 'tgl_publish'=>$waktu, 'publisher'=>$publisher, 
			'kode_publisher'=>$kode_publisher);
		//echo $artikel;
		$return = $this->martikel->tambahArtikel($data);
		redirect("".base_url()."artikel/detail/".$return."");
	}

	public function detail($id)
	{
		$data['id'] = $id;
		$data['detail'] = $this->martikel->getDetailArtikel($id);
		$this->load->view('user/detail_artikel',$data);
	}

}