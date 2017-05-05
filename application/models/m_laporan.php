<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');
class M_laporan extends CI_Model{

	public function __construct(){
	  parent::__construct();
	}

	public function simpan_data_laporan($data){
		 
   		$hasil=$this->db->insert('laporan', $data); 
		return $hasil;
	}

	public function tampil_laporan()
 { 	
	$ret = $this->db->get('laporan');
	return $ret->result(); 
 }

 public function tampil_laporan_acc()
 { 	

 	$this->db->where_in('keterangan',array('ket'=>'belum diterima'));
	$ret = $this->db->get('laporan');
	return $ret->result(); 
 }
public function terima($idlaporan)
	{
		return $this->db->query("UPDATE `laporan` SET `keterangan`='diterima' WHERE idlaporan= '$idlaporan'");

	}

public function hapus_data_laporan($idlaporan)
	{
	  	return $this->db->query("DELETE FROM `laporan` WHERE `idlaporan`= '$idlaporan'");
	}
 
}