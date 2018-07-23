<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

		public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
	}

	public function index()
	{
		$berita 	= $this->berita_model->berita();
		$data = array( 	'title'		=> $berita->judul_berita,
						'berita'	=> $berita,
					 	'isi'		=> 'berita/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}
		public function read($slug_berita) {
		$berita = $this->berita_model->read($slug_berita);
		$berita_lain = $this->berita_model->berita_lain();

		$data = array( 	'title'			=> 'Berita Terbaru',
						'berita'		=> $berita,
						'berita_lain' 	=> $berita_lain,
					 	'isi'			=> 'berita/read');
		$this->load->view('layout/wrapper', $data, FALSE);
		}
}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */