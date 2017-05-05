<?php
class M_login extends CI_Model
{
    private $table = 'admin'; 
 
    function __construct()
    {
        parent::__construct();
    }
 
    function register($data)
    {
        $this->db->insert($this->table, $data);
    }
 
    function login($username, $password)
    {
        $data = $this->db
                ->where(array('username' => $username, 'password' => md5($password)))
                ->get('admin');
 
         
        if ($data->num_rows() > 0)
        {
            $user = $data->row();
 
            $session = array(
                'logged_in' => 1,
                'idadmin' => $user->idadmin,
                'namaadmin' => $user->namaadmin,
                'username' => $user->username,
                'password'=>$user->password    
                
            );
            $this->session->set_userdata($session);

            return true;
        }
        else
        {
            $this->session->set_flashdata('notification', 'Username dan Password tidak cocok');
            return false;
        }
    }

    function cek($data){
        $data[2] = md5($data[2]);
        $datas = $this->db->query("SELECT * FROM admin WHERE username='$data[1]' and password= '$data[2]' ");
 
         
        if ($datas->num_rows() > 0)
        {
            $user = $datas->row();
 
            $session = array(
                'logged_in' => 1,
                'idadmin' => $user->idadmin,
                'namaadmin' => $user->namaadmin,
                'username' => $user->username,
                'password'=>$user->password             
                
            );
            $this->session->set_userdata($session);

            return true;
        }
        else
        {
            $this->session->set_flashdata('notification', 'Username dan Password tidak cocok');
            return false;
        }

        // $data[2] = md5($data[2]);

        // return $this->db->query("SELECT * FROM anggota WHERE username='$data[1]' and password= '$data[2]' and `group` = 'anggota'")->num_rows();

    }
    function cekp($data){

        $data[2] = md5($data[2]);
        $datas = $this->db->query("SELECT * FROM anggota WHERE username='$data[1]' and password= '$data[2]' and `group` = 'admin'");
 
         
        if ($datas->num_rows() > 0)
        {
            $user = $datas->row();
 
            $session = array(
                'logged_in' => 1,
                'id_anggota' => $user->id_anggota,
                'nama_lengkap' => $user->nama_lengkap,
                'username' => $user->username,
                'password'=>$user->ulangi_password,
                'alamat' => $user->alamat,
                'tgl_lhr' => $user->tgl_lhr,
                'foto' => $user->foto,
                'ktp' => $user->ktp,
                'group' => $user->group                
                
            );
            $this->session->set_userdata($session);

            return true;
        }
        else
        {
            $this->session->set_flashdata('notification', 'Username dan Password tidak cocok');
            return false;
        }
        // $data[2] = md5($data[2]);

        // return $this->db->query("SELECT * FROM anggota WHERE username='$data[1]' and password= '$data[2]' and `group` = 'admin'")->num_rows();
    }
 
    function logout()
    {
        $session['logged_in'] = 0;
        $this->session->sess_destroy();
    }

    
}