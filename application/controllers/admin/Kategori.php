<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function index()
	{
        $this->db->from('kategori');
		$this->db->order_by('nama_kategori', 'ASC');
		$kategori = $this->db->get()->result_array();
		$data = array(
			'kategori' => $kategori
		);	
		$this->template->load('template','kategori', $data);
	}

    public function simpan(){
        $this->db->from('kategori');
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );

        $this->db->insert('kategori', $data);
        echo "
		<script>
		alert('Berhasil ditambah');
		window.location = '".site_url('admin/kategori')."'
		</script>
		";

    }

    public function hapus($id){
		$where = array('id_kategori'=>$id);
		$this->db->delete('kategori',$where);
		echo "
		<script>
		alert('Berhasil dihapus');
		window.location = '".site_url('admin/kategori')."'
		</script>
		";
	}




	
    public function edit($id){
		$this->db->select('*')->from('kategori');
		$this->db->where('id_kategori',$id);
		$kategori = $this->db->get()->result_array();
		$data = array(
			'kategori' => $kategori
		);
		$this->template->load('template','kategori_edit',$data); 

	}

    public function update()
	{


		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori'),
		);

		$where = array('id_kategori' => $this->input->post('id_kategori'));
		$this->db->update('kategori',$data,$where);
		redirect('admin/kategori');
	}
}


