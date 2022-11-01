<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sayur extends My_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('level')!="Administrator"){
            $this->session->set_flashdata('pesan', 'Silahkan LOGIN Terlebih Dahulu Untuk Mengakses Halaman Tersebut !!');
            redirect(site_url('login/'));
        }
	}

	public function index()
	{

        $sayur = $this->db->query("SELECT*FROM sayur LEFT JOIN kategori ON sayur.id_kategori=kategori.id_kategori WHERE sayur.deleted=0");
        $kategori = $this->db->query("SELECT*FROM kategori WHERE deleted=0");

         $data=array(
            "sayurku"=>$sayur->result(),
            "kategoriku"=>$kategori->result(),
        );
		 $this->Mypage('isi/adm/sayur',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_sayur', 'nm_sayur', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/sayur');
        }else{
            $id = rand();
            $config['upload_path']          = './assets/images/sayur/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            $upload_image = $_FILES['foto']['name'];

            if($upload_image){
              if ($this->upload->do_upload('foto')) {
                 $img = $this->upload->data('file_name');
                  }else{
                    $this->session->set_flashdata('sukses',"gagal");
                    redirect('adm/sayur');
                  }

              }else{
                $img = 'default.jpg';
              }

            $data=array(
                "nm_sayur"=>$_POST['nm_sayur'],
                "keterangan"=>$_POST['keterangan'],
                "id_kategori"=>$_POST['id_kategori'],
                "harga"=>$_POST['harga'],
                "foto" => $img,
                "deleted" => 0
            );
            $this->db->insert('sayur',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/sayur');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('id_sayur', 'id_sayur', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/sayur');
        }else{
            $id = rand();
            $config['upload_path']          = './assets/images/sayur/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            $upload_image = $_FILES['foto']['name'];

            if($upload_image){
                 if ($this->upload->do_upload('foto')) {

                 $img = $this->upload->data('file_name');

                 if($_POST['old_image'] != 'default.jpg'){
                    $path = './assets/images/sayur/'.$_POST['old_image'];
                    chmod($path, 0777);
                    unlink($path);
                 }

                  }else{
                    $this->session->set_flashdata('sukses',"gagal");
                    redirect('adm/sayur');
                  }

              }else{
                $img = $_POST['old_image'];
              }

            $data=array(
                "nm_sayur"=>$_POST['nm_sayur'],
                "keterangan"=>$_POST['keterangan'],
                "id_kategori"=>$_POST['id_kategori'],
                "harga"=>$_POST['harga'],
                "foto" => $img
            );
            $this->db->where('id_sayur', $_POST['id_sayur'] );
            $this->db->update('sayur',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/sayur');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/sayur');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_sayur', $id);
            $this->db->update('sayur',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/sayur');
        }
    }


	
}
