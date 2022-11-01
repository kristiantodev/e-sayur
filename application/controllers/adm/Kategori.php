  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends My_Controller {

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

        $kategori = $this->db->query("SELECT*FROM kategori WHERE deleted=0");

         $data=array(
            "kategoriku"=>$kategori->result(),
        );
		 $this->Mypage('isi/adm/kategori',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_kategori', 'nm_kategori', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/kategori');
        }else{
            $data=array(
                "nm_kategori"=>$_POST['nm_kategori'],
                "deleted" => 0
            );
            $this->db->insert('kategori',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/kategori');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('id_kategori', 'id_kategori', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/kategori');
        }else{
            $data=array(
                "nm_kategori"=>$_POST['nm_kategori'],
            );
            $this->db->where('id_kategori', $_POST['id_kategori'] );
            $this->db->update('kategori',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/kategori');
        }
    }



    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/kategori');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_kategori', $id);
            $this->db->update('kategori',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/kategori');
        }
    }


	
}
