<?php
Class Sanpham extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('sanpham_model');
    }
    
    /*
     * Hien thi danh sach san pham
     */
    function index()
    {
        //lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->sanpham_model->get_total();
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('sanpham/index'); //link hien thi ra danh sach san pham
        $config['per_page']   = 5;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        
        //kiem tra co thuc hien loc du lieu hay khong
        $MaSanPham = $this->input->get('MaSanPham');
        $MaSanPham = intval($MaSanPham);
        $input['where'] = array();
        if($MaSanPham > 0)
        {
            $input['where']['MaSanPham'] = $MaSanPham;
        }
        $name = $this->input->get('name');
        if($name)
        {
            $input['like'] = array('name', $name);
        }
        $Mahangsanxuat = $this->input->get('hangsanxuat');
        $Mahangsanxuat = intval($Mahangsanxuat);
        if($Mahangsanxuat > 0)
        {
            $input['where']['Mahangsanxuat'] = $Mahangsanxuat;
        }
        
        //lay danh sach san pha
        $list = $this->sanpham_model->get_list($input);
        $this->data['list'] = $list;
       
        //lay danh sach danh muc san pham
        $this->load->model('hangsanxuat_model');
        $input = array();
        $input['where'] = array('Mahangsanxuat' => 0);
        $hangsanxuats = $this->hangsanxuat_model->get_list($input);
        foreach ($hangsanxuats as $row)
        {
            $input['where'] = array('Mahangsanxuat' => $row->Mahangsanxuat);
            $subs = $this->hangsanxuat_model>get_list($input);
            $row->subs = $subs;
        }
        $this->data['hangsanxuats'] = $hangsanxuats;
        
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/sanpham/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Them san pham moi
     */
    function add()
    {
        //lay danh sach danh muc san pham
        $this->load->model('loaisanpham_model');
        $input = array();
        $input['where'] = array('MaLoaiSanPham' => 0);
        $loaisanphams = $this->loaisanpham_model->get_list($input);
        foreach ($loaisanphams as $row)
        {
            $input['where'] = array('MaLoaiSanPham' => $row->MaSanPham);
            $subs = $this->loaisanpham_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['loaisanpham'] = $loaisanphams;
        
        //load thư viện valMaSanPhamate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('TenSanPham', 'Tên', 'required');
            $this->form_validation->set_rules('MaHangSanXuat', 'Mã hãng sản xuất', 'required');
            $this->form_validation->set_rules('GiaSanPham', 'Giá', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $TenSanPham        = $this->input->post('TenSanPham');
                $MaHangSanXuat  = $this->input->post('MaHangSanXuat');
                $GiaSanPham       = $this->input->post('GiaSanPham');
                $GiaSanPham       = str_replace(',', '', $GiaSanPham);
                
                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/sanpham';
                $upload_data = $this->upload_library->upload($upload_path, 'image');  
                $image_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }
                //upload cac anh kem theo
                $HinhURL = array();
                $HinhURL = $this->upload_library->upload_file($upload_path, 'HinhURL');
                $HinhURL = json_encode($HinhURL);
                
                //luu du lieu can them
                $data = array(
                    'TenSanPham'       => $TenSanPham,
                    'MaHangSanXuat' => $MaHangSanXuat,
                    'GiaSanPham'      => $GiaSanPham,
                    'HinhURL' => $HinhURL
                ); 
                //them moi vao csdl
                if($this->sanpham_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('sanpham'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/sanpham/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Chinh sua san pham
     */
    function edit()
    {
         //lay danh sach danh muc san pham
         $this->load->model('loaisanpham_model');
         $input = array();
         $input['where'] = array('MaLoaiSanPham' => 0);
         $loaisanphams = $this->loaisanpham_model->get_list($input);
         foreach ($loaisanphams as $row)
         {
             $input['where'] = array('MaLoaiSanPham' => $row->MaSanPham);
             $subs = $this->loaisanpham_model->get_list($input);
             $row->subs = $subs;
         }
         $this->data['loaisanpham'] = $loaisanphams;
         
         //load thư viện validate dữ liệu
         $this->load->library('form_validation');
         $this->load->helper('form');
         
         //neu ma co du lieu post len thi kiem tra
         if($this->input->post())
         {
             $this->form_validation->set_rules('TenSanPham', 'Tên', 'required');
             $this->form_validation->set_rules('MaHangSanXuat', 'Mã hãng sản xuất', 'required');
             $this->form_validation->set_rules('GiaSanPham', 'Giá', 'required');
             
             //nhập liệu chính xác
             if($this->form_validation->run())
             {
                 //them vao csdl
                 $TenSanPham        = $this->input->post('TenSanPham');
                 $MaHangSanXuat  = $this->input->post('MaHangSanXuat');
                 $GiaSanPham       = $this->input->post('GiaSanPham');
                 $GiaSanPham       = str_replace(',', '', $GiaSanPham);
                 
                 //lay ten file anh minh hoa duoc update len
                 $this->load->library('upload_library');
                 $upload_path = './upload/sanpham';
                 $upload_data = $this->upload_library->upload($upload_path, 'image');  
                 $image_link = '';
                 if(isset($upload_data['file_name']))
                 {
                     $image_link = $upload_data['file_name'];
                 }
                 //upload cac anh kem theo
                 $HinhURL = array();
                 $HinhURL = $this->upload_library->upload_file($upload_path, 'HinhURL');
                 $HinhURL = json_encode($HinhURL);
                 
                 //luu du lieu can them
                 $data = array(
                     'TenSanPham'       => $TenSanPham,
                     'MaHangSanXuat' => $MaHangSanXuat,
                     'GiaSanPham'      => $GiaSanPham,
                     'HinhURL' => $HinhURL
                 ); 
                 //them moi vao csdl
                 if($this->sanpham_model->create($data))
                 {
                     //tạo ra nội dung thông báo
                     $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                 }else{
                     $this->session->set_flashdata('message', 'Không thêm được');
                 }
                 //chuyen tới trang danh sách
                 redirect(admin_url('sanpham'));
             }
        }
    }
    
    /*
     * Xoa du lieu
     */
    function del()
    {
        $MaSanPham = $this->uri->rsegment(3);
        $this->_del($MaSanPham);
        
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
        redirect(admin_url('sanpham'));
    }
    
    /*
     * Xóa nhiều sản phẩm
     */
    function delete_all()
    {
        $MaSanPhams = $this->input->post('MaSanPhams');
        foreach ($MaSanPhams as $MaSanPham)
        {
            $this->_del($MaSanPham);
        }
    }
    
    /*
     *Xoa san pham
     */
    private function _del($MaSanPham)
    {
        $sanpham = $this->sanpham_model->get_info($MaSanPham);
        if(!$sanpham)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
            redirect(admin_url('sanpham'));
        }
        //thuc hien xoa san pham
        $this->sanpham_model->delete($MaSanPham);
        //xoa cac anh cua san pham
        $image_link = './upload/sanpham/'.$sanpham->image_link;
        if(file_exists($image_link))
        {
            unlink($image_link);
        }
        //xoa cac anh kem theo cua san pham
        $image_list = json_decode($sanpham->image_list);
        if(is_array($image_list))
        {
            foreach ($image_list as $img)
            {
                $image_link = './upload/sanpham/'.$img;
                if(file_exists($image_link))
                {
                    unlink($image_link);
                }
            }
        }
    }
}



