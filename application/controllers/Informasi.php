<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends My_Controller {

	function __construct(){
		parent::__construct();		
	}

	public function index()
	{
        $sayur = $this->db->query("SELECT*FROM sayur LEFT JOIN kategori ON sayur.id_kategori=kategori.id_kategori WHERE sayur.deleted=0 LIMIT 8");
        $kategori = $this->db->query("SELECT*FROM kategori WHERE deleted=0");

         $data=array(
            "sayurku"=>$sayur->result(),
            "kategoriku"=>$kategori->result(),
        );

		 $this->MyPageSayur('isi/front/home',$data);
	}

	public function sayur()
	{
        $sayur = $this->db->query("SELECT*FROM sayur LEFT JOIN kategori ON sayur.id_kategori=kategori.id_kategori WHERE sayur.deleted=0");
        $kategori = $this->db->query("SELECT*FROM kategori WHERE deleted=0");

         $data=array(
            "sayurku"=>$sayur->result(),
            "kategoriku"=>$kategori->result(),
        );

		 $this->MyPageSayur('isi/front/sayur',$data);
	}

	public function about()
	{
        $sayur = $this->db->query("SELECT*FROM sayur LEFT JOIN kategori ON sayur.id_kategori=kategori.id_kategori WHERE sayur.deleted=0");
        $kategori = $this->db->query("SELECT*FROM kategori WHERE deleted=0");

         $data=array(
            "sayurku"=>$sayur->result(),
            "kategoriku"=>$kategori->result(),
        );

		 $this->MyPageSayur('isi/front/about',$data);
	}

    public function cart()
    {
        $idUser= $this->session->userdata("id_user");
        $sayur = $this->db->query("SELECT*FROM keranjang LEFT JOIN sayur ON sayur.id_sayur=keranjang.id_sayur WHERE keranjang.status=1 AND id_user='$idUser' AND keranjang.deleted=0 ");
        $kategori = $this->db->query("SELECT*FROM kategori WHERE deleted=0");

         $data=array(
            "sayurku"=>$sayur->result(),
            "kategoriku"=>$kategori->result(),
        );

         $this->MyPageSayur('isi/front/keranjang',$data);
    }

    public function pembelian()
    {
        $idUser= $this->session->userdata("id_user");
        $sayur = $this->db->query("SELECT*FROM keranjang LEFT JOIN sayur ON sayur.id_sayur=keranjang.id_sayur WHERE keranjang.status=2 AND id_user='$idUser' AND keranjang.deleted=0 ");
        $transaksi = $this->db->query("SELECT transaksi.id_transaksi, transaksi.status, tgl_transaksi, SUM(sayur.harga*keranjang.qty) AS total FROM transaksi LEFT JOIN keranjang ON keranjang.id_transaksi=transaksi.id_transaksi LEFT JOIN sayur ON keranjang.id_sayur=sayur.id_sayur WHERE transaksi.id_user='$idUser' GROUP BY transaksi.id_transaksi");

         $data=array(
            "sayurku"=>$sayur->result(),
            "transaksiku"=>$transaksi->result(),
        );

         $this->MyPageSayur('isi/front/pembelian',$data);
    }


public function register()
    {

        $this->form_validation->set_rules('username', 'Username','trim|required');
        $this->form_validation->set_rules('password', 'Password','trim|required');
        $this->form_validation->set_rules('nm_user', 'Nama User','trim|required');

         if($this->form_validation->run() == false){

         $data=array(
            "sayurku"=>"",
        );

         $this->load->view('register',$data);
         
         }else{
             $idku = uniqid();
             $pass = password_hash ($_POST['password'], PASSWORD_DEFAULT);
             $data=array(
                "username"=>$_POST['username'],
                "password"=>$pass,
                "id_user"=>$idku,
                "nm_user"=>$_POST['nm_user'],
                "foto"=>"1.jpg",
                "level"=>"Konsumen"
            );
            $this->db->insert('user',$data);
            $this->session->set_flashdata('pesan', 'Registrasi berhasil silahkan login...');
            redirect('informasi/register');
         }

        
    }


    public function keranjang($id){

    if($this->session->userdata("level")=="Konsumen"){
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/kategori');
        }else{
            $idUser= $this->session->userdata("id_user");
            $idSayur = $id;
            $cekQuery = $this->db->query("SELECT * FROM keranjang WHERE id_user = '$idUser' AND id_sayur=$idSayur AND status=1 ")->result_array();
            if(count($cekQuery) <= 0){
            $data=array(
                "id_sayur"=>$idSayur,
                "id_user"=>$idUser,
                "status" => 1,
                "deleted" => 0
            );
            $this->db->insert('keranjang',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('informasi/sayur');
            }else{
            $this->session->set_flashdata('sukses',"gagalkeranjang");
            redirect('informasi/sayur');
            }
        }
    }else{
        $this->session->set_flashdata('sukses',"gagaladd");
        redirect('informasi/sayur');
    }

    }


 public function checkout(){
    $check = $this->input->post('pilihanku');
    $qtyCek = $this->input->post('qty');
    $keranjangCek = $this->input->post('keranjang');
    
    $idku = rand();
    for ($i=0; $i < sizeof($check); $i++) {
            $u=0;
            while ($u < sizeof($qtyCek)) {

                if($check[$i] == $keranjangCek[$u]){
                    $data = array(
                    'qty' => $qtyCek[$u],
                    'status' => 2,
                    'id_transaksi' => $idku
                    );
                    $this->db->where('id_keranjang', $check[$i]);
                    $this->db->update('keranjang',$data);
                    break;
                }

                 $u++;
            } 
               
    }
                 $dataTransaksi = array(
                    'id_transaksi' => $idku,
                    'id_user' => $this->session->userdata("id_user")
                  );

            $this->db->insert('transaksi',$dataTransaksi);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('informasi/cart');
  }

	
}
