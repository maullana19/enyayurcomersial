<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation', 'session');
        $this->load->model('m_auth');
    }

    public function login_user()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Di isi !',
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Di isi !'
        ));


        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->user_login->login($username, $password);
        }
        $data = array(
            'title' => 'Login User',
        );
        $this->load->view('v_login_user', $data, FALSE);
    }

    public function logout_user()
    {
        $this->user_login->logout();
    }
}
