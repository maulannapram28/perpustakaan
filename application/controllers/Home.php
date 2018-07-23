<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('buku_model');
		$this->load->model('jenis_model');
		$this->load->model('bahasa_model');
		$this->load->model('File_buku_model');
	}

	public function index()
	{
		$slider	= $this->berita_model->slider();
		$berita = $this->berita_model->berita();
		$buku   = $this->buku_model->buku();

		$data = array( 	'title'		=> 'Sistem Informasi Katalog Buku Online',
						'slider'	=> $slider,
						'berita'	=> $berita,
						'buku'		=> $buku,
					 	'isi'		=> 'home/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */