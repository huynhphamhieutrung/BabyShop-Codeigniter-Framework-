<?php
Class Login extends MY_controller{

    function index()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if($this->input->post())
        {
            $this->form_validation->set_rules('login' ,'login', 'callback_check_login');
            if($this->form_validation->run())
            {
                $this->session->set_userdata('login', true);
                redirect(admin_url('Home'));
            }
        }
        $this->load->view('admin/login/index');
    }

    /*
     * Kiem tra username va password co chinh xac khong
     */
    
    function check_login()
    {
        $TenDangNhap = $this->input->post('TenDangNhap');
        $MatKhau = $this->input->post('MatKhau');
        
        $this->load->model('TK_model');
        $where = array('TenDangNhap' => $TenDangNhap , 'MatKhau' => $MatKhau);
        if($this->TK_model->check_exists($where))
        {
            return true;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công');
        return false;
    }

}