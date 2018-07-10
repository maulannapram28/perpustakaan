<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$user = $this->user_model->listing();

		$data = array(	'title' => 'Data User ('.count($user).')',
						'user'  => $user,
						'isi'	=> 'admin/user/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah(){

		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array('required' => 'Nama harus di isi'));

		$valid->set_rules('email','Email','required|valid_email',
			array('required' => 'password harus di isi',
					'valid_email'  => 'Format emailtidak benar'));

		$valid->set_rules('username','Username','required|is_unique[user.username]',
			array('required' => 'username harus di isi',
					'is_unique'  => 'username <strong>'.$this->input->post('username').
									'<strong> sudah ada.Buat Username Baru'));

		$valid->set_rules('password','Password','required|min_length[6]',
			array( 'required'  => 'password harus di isi',
					'min_length'  => 'password minimal 6 karakter'));

		if($valid->run()=== FALSE) {

		
		$data = array(	'title' => 'Tambah User',
						'isi'	=> 'admin/user/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array( 	'nama'			=> $i->post('nama'),
							'email'			=> $i->post('email'),
							'username'		=> $i->post('username'),
							'password'		=> sha1($i->post('password')),
							'akses_level'	=> $i->post('akses_level'),
							'keterangan'	=> $i->post('keterangan')
						);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'data telah di tambah');
			redirect(base_url('admin/user'),'refresh');
		}
		
	}

		public function edit($id_user){

		$user = $this->user_model->detail($id_user);

		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array('required' => 'Nama harus di isi'));

		$valid->set_rules('email','Email','required|valid_email',
			array('required' => 'password harus di isi',
					'valid_email'  => 'Format email tidak benar'));

		if($valid->run()=== FALSE) {

		
		$data = array(	'title' => 'Edit User: '.$user->nama,
						'user'  => $user,
						'isi'	=> 'admin/user/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{
			$i = $this->input;

			if(strlen($i->post('password')) > 6){
		$data = array( 		'id_user'		=> $id_user,
							'nama'			=> $i->post('nama'),
							'email'			=> $i->post('email'),
							'password'		=> sha1($i->post('password')),
							'akses_level'	=> $i->post('akses_level'),
							'keterangan'	=> $i->post('keterangan')
						);
			}else{
				$data = array( 	'id_user'		=> $id_user,
								'nama'			=> $i->post('nama'),
								'email'			=> $i->post('email'),
								'akses_level'	=> $i->post('akses_level'),
								'keterangan'	=> $i->post('keterangan')
						);
			}
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'data telah diupdate');
			redirect(base_url('admin/user'),'refresh');
		}

	}

		public function delete($id_user){
			$data = array( 'id_user'	=> $id_user);
			$this->user_model->delete($data);
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('admin/user'),'refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */