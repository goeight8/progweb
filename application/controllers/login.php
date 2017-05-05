<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function index()
	{
		$form_data = $this->input->post('data');
        if (!empty($form_data)){
            if ($this->m_login->login($form_data['username'], $form_data['password']))
            {
                    redirect('login/admin');
            }
            else
            {
                redirect('login');
            }
        }else{
            if ($this->session->userdata('group') == 'admin') {
                    redirect('admin');
                }
        }

        $this->load->view('login');
    
	}
    public function cek_login()
    {
        $data = array("admin",
        $this->input->post('username'),
        $this->input->post('password'));
        $this->load->model('m_login');
        $record = $this->m_login->cek($data);
        
        if($record==0){
            $this->index();
        }else{
            $this->session->set_userdata(array('username'=>$data[1]));
            $this->session->set_userdata(array('group'=>$data[0]));
            redirect('admin');
        }
    }


    function admin()
    {
        if ($this->session->userdata('logged_in')) 
        {
                $this->load->view('home_admin');
            }

        else
        {
            redirect('login/login');
        }
    }

    function logout(){
        $this->session->sess_destroy();;
        redirect('login');
    }
}