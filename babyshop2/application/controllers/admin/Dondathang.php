<?php
Class dondathang extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('dondathang_model');
    }
    
    /*
     * Lay ra danh sach danh muc san pham
     */
    function index()
    {
        $list = $this->dondathang_model->get_list();
        $this->data['list'] = $list;
        
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/dondathang/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Them moi du lieu
     */
    function add()
    {
        
    }
    
    /*
     * Cập nhật du lieu
     */
    function edit()
    {
    }
    
    /*
     * Xoa danh mục
     */
    function delete()
    {
        //lay id danh mục
        $MaDonDatHang = $this->uri->rsegment(3);
        $this->_del($MaDonDatHang);
        
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('dondathang'));
    }
    
    /*
     * Xoa nhieu danh muc san pham
     */
    function delete_all()
    {
        $MaDonDatHang = $this->input->post('MaDonDatHang');
        foreach ($MaDonDatHang as $MaDonDatHang)
        {
            $this->_del($MaDonDatHang , false);
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

