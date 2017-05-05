<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {

	    function __construct(){
      parent::__construct();

      $this->load->model('m_laporan');
      $this->load->helper('html');
      $this->load->library('table','pagination'); 
      //$this->auth->restrict();
    }

	public function index()
	{
		$this->load->view('lapor');
	}

	function simpan_laporan(){

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('gambar'))
                {
                        $this->form_validation->set_rules('gambar', 'gambar', 'required');
                }
                else
                {
                        $nama_gambar = $this->upload->data('file_name');
                }
                

      if(isset($_POST['mysubmit'])){

          $data = array(
          'idlaporan'     => $this->input->post('idlaporan'),
          'judullaporan'   => $this->input->post('judullaporan'),    
          'jenislaporan'   => $this->input->post('jenislaporan'),                                  
           'namapelapor'       => $this->input->post('namapelapor'),                                          
           'nomorpelapor'         => $this->input->post('nomorpelapor'),   
           'lokasi'        => $this->input->post('lokasi'),    
           'isilaporan'        => $this->input->post('isilaporan'),
           'gambar' => $nama_gambar,
           'keterangan'            => 'belum diterima'
           );

            $hasil=$this->m_laporan->simpan_data_laporan($data);
            echo "<script> alert('data berhasil Disimpan dan upload success');location='".base_url()."welcome'</script>";
      }
      else{
        echo  "<script> alert('data gagal Disimpan');location='".base_url()."laporan'</script>";
      }

    }

    function tampil_laporan(){
                  //tampilkan data
                  $this->load->model('m_laporan');
                  $data['laporan'] = $this->m_laporan->tampil_laporan();
                  $this->load->view('galeri',$data);
            // }
    }

    function tampil_laporan_acc(){
                  //tampilkan data
                  $this->load->model('m_laporan');
                  $data['laporan'] = $this->m_laporan->tampil_laporan_acc();
                  $this->load->view('tampillaporanacc',$data);
            // }
    }
    function tampil_laporan_semua(){
                  //tampilkan data
                  $this->load->model('m_laporan');
                  $data['laporan'] = $this->m_laporan->tampil_laporan();
                  $this->load->view('tampillaporansemua',$data);
            // }
    }

    function terima_laporan($idlaporan){
      $this->m_laporan->terima($idlaporan); 
      $this->tampil_laporan_semua();
    }


  function konfirm_hapus($idlaporan)
  {
    echo "<script>

    var txt;
    var r = confirm('Tekan OK untuk menghapus !');
    if (r == true) {
        window.location.href = '".base_url()."laporan/hapus_laporan/".$idlaporan."';

    } else {
      window.location.href = '".base_url()."laporan/tampil_laporan_semua';
    }
    
</script>";

    // $data_laporan['datalaporan']=$this->m_laporan->konfirm_hapus($idlaporan);
    // $this->load->view('konfirmhapuslaporan',$data_laporan);
  }
  function hapus_laporan($idlaporan)
  {
    $hasil=$this->m_laporan->hapus_data_laporan($idlaporan);
    if ($hasil){
      echo "<script> alert('data berhasil Dihapus');location='".base_url()."laporan/tampil_laporan_semua'</script>";
    }else{
      "<script> alert('data gagal Dihapus');location='".base_url()."laporan/tampil_laporan_acc'</script>";
    }
    redirect('laporan/tampil_laporan_semua');
  }

}