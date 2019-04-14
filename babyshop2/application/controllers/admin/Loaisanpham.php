<?php
Class loaisanpham extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('loaisanpham_model');
    }
    
    /*
     * Lay ra danh sach danh muc san pham
     */
    function index()
    {
        $list = $this->loaisanpham_model->get_list();
        $this->data['list'] = $list;
        
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/loaisanpham/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Them moi du lieu
     */
    function add()
    {
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('Maloaisanpham', 'Tenloaisanpham', 'Bixoa');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $Tenloaisanpham  = $this->input->post('Tenloaisanpham');
                $Bixoa = 0;
                
                //luu du lieu can them
                $data = array(
                    'Tenloaisanpham' => $Tenloaisanpham,
                    'Bixoa' =>  $Bixoa
                );

                //them moi vao csdl
                if($this->loaisanpham_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('loaisanpham'));
            }
        }
        
        //lay danh sach danh muc cha
        $input = array();
        $input['where'] = array('Maloaisanpham' => 0);
        $list = $this->loaisanpham_model->get_list($input);
        $this->data['list']  = $list;
        
        $this->data['temp'] = 'admin/loaisanpham/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Cập nhật du lieu
     */
    function edit()
    {
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
    
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $info = $this->loaisanpham_model->get_info($id);
        if(!$info)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            redirect(admin_url('loaisanpham'));
        }
        $this->data['info'] = $info;
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('Maloaisanpham', 'Tenloaisanpham', 'Bixoa');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $Tenloaisanpham  = $this->input->post('Tenloaisanpham');
                $Bixoa = 0;
                
                //luu du lieu can them
                $data = array(
                    'Tenloaisanpham' => $Tenloaisanpham,
                    'Bixoa' =>  $Bixoa
                );

                //them moi vao csdl
                if($this->loaisanpham_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('loaisanpham'));
            }
        }
    
        //lay danh sach danh muc cha
        $input = array();
        $input['where'] = array('Maloaisanpham' => 0);
        $list = $this->loaisanpham_model->get_list($input);
        $this->data['list']  = $list;
    
        $this->data['temp'] = 'admin/loaisanpham/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Xoa danh mục
     */
    function delete()
    {
        //lay id danh mục
        $Maloaisanpham = $this->uri->rsegment(3);
        $this->_del($Maloaisanpham);
        
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('loaisanpham'));
    }
    
    /*
     * Xoa nhieu danh muc san pham
     */
    function delete_all()
    {
        $Maloaisanpham = $this->input->post('Maloaisanpham');
        foreach ($Maloaisanpham as $Maloaisanpham)
        {
            $this->_del($Maloaisanpham , false);
        }
    }
    
    /*
     * Thuc hien xoa
     */
    private function _del($Maloaisanpham, $rediect = true)
    {
        $info = $this->loaisanpham_model->get_info($Maloaisanpham);
        if(!$info)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại loại này');
            if($rediect)
            {
                redirect(admin_url('loaisanpham'));
            }else{
                return false;
            }
        }
        
        //kiem tra xem danh muc nay co san pham khong
        $this->load->model('sanpham_model');
        $product = $this->sanpham_model->get_info_rule(array('Maloaisanpham' => $Maloaisanpham), 'Masanpham');
        if($product)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Masanpham'.$info->name.' có chứa sản phẩm,bạn cần xóa các sản phẩm trước khi xóa danh mục');
            if($rediect)
            {
                redirect(admin_url('loaisanpham'));
            }else{
                return false;
            }
        }
        
        //xoa du lieu
        $this->loaisanpham_model->delete($Maloaisanpham);
        
    }
}

