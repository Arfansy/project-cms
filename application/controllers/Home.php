<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent :: __construct();
	}

	public function index()
	{



		$this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
		$konten = $this->db->get()->result_array();
		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();
		$data = [
			'konten' => $konten,
			'kategori' => $kategori,
		];
		$this->load->view('beranda',$data);
	}
	public function all()
	{



		$this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
		$konten = $this->db->get()->result_array();
		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();
		$data = [
			'konten' => $konten,
			'kategori' => $kategori,
		];
		$this->load->view('all',$data);
	}
	public function explore()
	{



		$this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
		$konten = $this->db->get()->result_array();
		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();
		$data = [
			'konten' => $konten,
			'kategori' => $kategori,
		];
		$this->load->view('explore',$data);
	}
	public function kategori($id)
	{
		$this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
		$this->db->where('a.id_kategori',$id);
		$konten = $this->db->get()->result_array();
		
		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('kategori');
		$this->db->where('id_kategori' , $id);
		$nama_kategori = $this->db->get()->row()->nama_kategori;
		$data = [
			'konten' => $konten,
			'nama_kategori' => $nama_kategori,
			'kategori' => $kategori,
		];
		$this->load->view('view_kategori',$data);
	}

	public function detail($id)
	{

		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();
		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();
		$this->db->from('konten a');
		$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
		$this->db->join('user c', 'a.username=c.username', 'left');
		$this->db->where('slug', $id);
		$konten = $this->db->get()->row();
		$data = array(
			'judul'   => $konten->judul,
			'konfig' => $konfig,
			'kategori' => $kategori,
			'konten' => $konten
		);
		$this->load->view('detail',$data);
	}
}
