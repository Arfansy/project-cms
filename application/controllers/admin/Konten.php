<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {

	public function index()
	{
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
		$kategori = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->join('user c', 'a.username=c.username', 'left');
        $this->db->order_by('tanggal', 'DESC');
        $konten = $this->db->get()->result_array();
		$data = array(
            'judul_halaman' => 'Halaman Konten',
			'kategori' => $kategori,
            'konten'   => $konten
		);	
		$this->template->load('template','konten', $data);
	}

    public function simpan() {
        $uploadPath = 'upload/konten/';
        $namafoto1 = date("YmHis") . '_1.jpg';
        $audio = date("YmHis") . '_2.mp3';
        
        $config = [
            'upload_path'   => $uploadPath,
            'max_size'      => 50 * 1024, // 50 MB
            'allowed_types' => '*',
        ];


        $config['file_name'] = $namafoto1;
        $this->load->library('upload');
    
        // Upload Foto
        
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
            die;
            return;
        }


        $config = [
            'upload_path'   => $uploadPath,
            'max_size'      => 50 * 1024, // 50 MB
            'allowed_types' => '*',
        ];
        $config['file_name'] = $audio;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('audio')) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
            die;
            return;
        }
    
        // Prepare data for update
        $data = [
            'judul'       => $this->input->post('judul'),
            'id_kategori' => $this->input->post('id_kategori'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal'     => date('Y-m-d'),
            'foto'        => $namafoto1,
            'audio'       => $audio,
            'username'    => $this->session->userdata('username'),
            'slug'        => str_replace(' ', '-', $this->input->post('judul')),
        ];
   $this->db->insert('konten' , $data);
   echo "
   <script>
   alert('berhasil');
   window.location = '".base_url('admin/konten')."'
   </script>
   ";
    }
    

    public function edit($id)
    {
        $this->db->select('*')->from('konten');
        $this->db->where('id_kategori', $id);
        $user = $this->db->get()->result_array();
        $data = array('konten' => $user);
        $this->load->view('admin/konten_edit', $data);
    }

    public function update()
    {
        $namafoto = $this->input->post('nama_foto');
        $config['upload_path']      = 'upload/konten/';
        $config['max_size'] = 500 * 1024;
        $config['allowed_types'] = '*';
        $config['file_name']        = $namafoto;
        $config['overwrite']        = true;
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size'] >= 500 * 1024) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert">
            Ukuran File terlalu besar
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
          </div>');
            redirect('admin/konten');
        } elseif (! $this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('uppload_data' => $this->upload->data());
        }
        $data = array(
            'judul'      => $this->input->post('judul'),
            'id_kategori'      => $this->input->post('id_kategori'),
            'keterangan'      => $this->input->post('keterangan'),
            'slug'      => str_replace(' ', '-', $this->input->post('judul'))
        );
        $where = array(
            'foto'  => $this->input->post('nama_foto')
        );
        $this->db->update('konten', $data,$where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert">
        Konten Berhasil Ditambahkan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div>');
        redirect('admin/konten');
    }

    public function hapus($id){
		$where = array('id_konten'=>$id);
		$this->db->delete('konten',$where);
		echo "
		<script>
		alert('Berhasil dihapus');
		window.location = '".site_url('admin/konten')."'
		</script>
		";
	}
	
}
