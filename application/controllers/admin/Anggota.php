<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('anggota_model');
	}

	public function index()
	{
		$anggota = $this->anggota_model->listing();

		$data = array(	'title' => 'Data Anggota ('.count($anggota).')',
						'anggota'  => $anggota,
						'isi'	=> 'admin/anggota/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah(){

		$valid = $this->form_validation;

		$valid->set_rules('nama_anggota','Nama','required',
			array('required' => 'Nama harus di isi'));

		$valid->set_rules('email','Email','required|valid_email',
			array('required' => 'password harus di isi',
					'valid_email'  => 'Format emailtidak benar'));

		$valid->set_rules('username','Username','required|is_unique[anggota.username]',
			array('required' => 'username harus di isi',
					'is_unique'  => 'username <strong>'.$this->input->post('username').
									'<strong> sudah ada.Buat Username Baru'));

		$valid->set_rules('password','Password','required|min_length[6]',
			array( 'required'  => 'password harus di isi',
					'min_length'  => 'password minimal 6 karakter'));

		if($valid->run()=== FALSE) {

		
		$data = array(	'title' => 'Tambah Anggota',
						'isi'	=> 'admin/anggota/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array( 	'id_user'			=> $this->session->userdata('id_user'),
							'status_anggota'	=> $i->post('status_anggota'),
							'nama_anggota'		=> $i->post('nama_anggota'),
							'email'				=> $i->post('email'),
							'telepon'			=> $i->post('telepon'),
							'instansi'			=> $i->post('instansi'),
							'username'			=> $i->post('username'),
							'password'			=> sha1($i->post('password')),
						);
			$this->anggota_model->tambah($data);
			$this->session->set_flashdata('sukses', 'data telah di tambah');
			redirect(base_url('admin/anggota'),'refresh');
		}
		
	}

		public function edit($id_anggota){

		$anggota = $this->anggota_model->detail($id_anggota);

		$valid = $this->form_validation;

		$valid->set_rules('nama_anggota','Nama','required',
			array('required' => 'Nama harus di isi'));

		$valid->set_rules('email','Email','required|valid_email',
			array('required' => 'password harus di isi',
					'valid_email'  => 'Format email tidak benar'));

		if($valid->run()=== FALSE) {

		
		$data = array(	'title' => 'Edit Anggota: '.$anggota->nama_anggota,
						'anggota'  => $anggota,
						'isi'	=> 'admin/anggota/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{
			$i = $this->input;

			if(strlen($i->post('password')) > 6){
		$data = array( 		'id_anggota'		=> $id_anggota,
							'id_user'			=> $this->session->userdata('id_user'),
							'status_anggota'	=> $i->post('status_anggota'),
							'nama_anggota'		=> $i->post('nama_anggota'),
							'email'				=> $i->post('email'),
							'telepon'			=> $i->post('telepon'),
							'instansi'			=> $i->post('instansi'),
							'password'			=> sha1($i->post('password')),
						);
			}else{
				$data = array( 	'id_anggota'		=> $id_anggota,
								'id_user'			=> $this->session->userdata('id_user'),
								'status_anggota'	=> $i->post('status_anggota'),
								'nama_anggota'		=> $i->post('nama_anggota'),
								'email'				=> $i->post('email'),
								'telepon'			=> $i->post('telepon'),
								'instansi'			=> $i->post('instansi'),
						);
			}
			$this->anggota_model->edit($data);
			$this->session->set_flashdata('sukses', 'data telah diupdate');
			redirect(base_url('admin/anggota'),'refresh');
		}

	}

		public function delete($id_anggota){

			if($this->session->userdata('username') == "" && $this->session->userdata('akses_level')=="") {
				$this->session->set_flashdata('sukses', 'silahkan login dahulu');
				redirect(base_url('login'),'refresh');
			}

			$data = array( 'id_anggota'	=> $id_anggota);
			$this->anggota_model->delete($data);
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('admin/anggota'),'refresh');
	}

}

/* End of file Anggota.php */
/* Location: ./application/controllers/admin/Anggota.php */