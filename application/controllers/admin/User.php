<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent ::__construct();	
	
	}

	public function index()
	{
		$this->db->from('user');
		$this->db->order_by('nama','ASC');
		$user = $this->db->get()->result_array();
		$data = array(
			'user' => $user
		);	
		$this->template->load('template','user_index',$data); 	
	}

	public function simpan()
	{
		$this->db->from('user');
		$this->db->where('username');

		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'level' => $this->input->post('level'),
		);
		$this->db->insert('user',$data);
		redirect('admin/user');
	}
	public function update()
	{


		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'level' => $this->input->post('level'),
		);

		$where = array('id_user' => $this->input->post('id_user'));
		$this->db->update('user',$data,$where);
		redirect('admin/user');   
	}


	public function hapus($id){
		$where = array('id_user'=>$id);
		$this->db->delete('user',$where);
		echo "
		<script>
		alert('Berhasil dihapus');
		window.location = '".site_url('admin/user')."'
		</script>
		";
	}

	public function edit($id){
		$this->db->select('*')->from('user');
		$this->db->where('id_user',$id);
		$user = $this->db->get()->result_array();
		$data = array(
			'user' => $user
		);
		$this->template->load('template','user_edit',$data); 

	}
}
