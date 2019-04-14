<?php
Class Home extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('loaisanpham_model');
        $this->load->model('dondathang_model');
        $this->load->model('User_model');
    }
    
    function index()
    {
        $list = $this->dondathang_model->get_list();
        $this->data['list'] = $list;
        
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/main', $this->data);
    }
}