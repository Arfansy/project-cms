<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel extends CI_Controller {

	public function index()
	{
        $this->db->from('caraousel');
		$caraousel = $this->db->get()->result_array();
		$data = array(
            'judul_halaman' => 'Halaman Caraousel',
			'caraousel' => $caraousel
		);	
		$this->template->load('template','caraousel_index', $data);
	}

    public function simpan(){

		
        $namafoto = date("YmHis") . '.jpg';
        $config['upload_path']      = 'upload/caraousel/';
        $config['max_size'] = 30 * 1024 * 1024;
        $config['allowed_types'] = '*';
        $config['file_name']        = $namafoto;
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size'] >= 50 * 1024 * 1024) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert">
            Ukuran File terlalu besar
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
          </div>');
            redirect('admin/carousel');
        } elseif (! $this->upload->do_upload('foto')) {
            $error      = array('error' => $this->upload->display_errors());
        } else {
            $data = array('uppload_data' => $this->upload->data());
        }

        $carousel = $this->input->post('judul');
        $this->db->from('caraousel');
        $this->db->where('judul', $carousel);
        $cek = $this->db->get()->result_array();
        if ($cek <> NULL) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert">
            Nama Konten sudah digunakan SILAHKAN GANTI
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
          </div>');
            redirect('admin/carousel');
        }
        $data = array(
            'judul'      => $this->input->post('judul'),
            'foto'      => $namafoto,
        );

        $this->db->insert('caraousel', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert">
        Konten Berhasil Ditambahkan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div>');
        redirect('admin/carousel');

    }

    public function hapus($id){
		$filename=FCPATH.'/upload/caraousel'.$id;
            if(file_exists($filename)){
                unlink("./upload/caraousel".$id);
            }
        $where = array(
            'foto' => $id
        );
        $this->db->delete('caraousel', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert">
        Carousel Berhasil Dihapus
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div>');
        redirect('admin/carousel');
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
