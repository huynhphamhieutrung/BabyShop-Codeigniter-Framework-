<?php
Class TK extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    /* Lay danh sach tai khoan*/
    function index()
    {
        $input = array();
        $list = $this->User_model->get_list($input);
        $this->data['list'] = $list;

        $total = $this->User_model ->get_total();
        $this->data['total'] = $total;

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/TK/index';
        $this->load ->view('admin/main', $this->data);
    }

    /*
     * Kiểm tra username đã tồn tại chưa
     */
    function check_username()
    {
        $username = $this->input->post('TenDangNhap');
        $where = array('TenDangNhap' => $TenDangNhap);
        //kiêm tra xem username đã tồn tại chưa
        if($this->User_model->check_exists($where))
        {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
            return false;
        }
        return true;
    }

      /* Them moi quan tri vien*/
    function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('TenHienThi', 'Tên', 'required|min_length[8]');
            $this->form_validation->set_rules('TenDangNhap', 'Tài khoản đăng nhập', 'required|min_length[8]');
            $this->form_validation->set_rules('MatKhau', 'Mật khẩu', 'required|min_length[6]');
            $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[MatKhau]');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $TenHienThi  = $this->input->post('TenHienThi');
                $TenDangNhap = $this->input->post('TenDangNhap');
                $MatKhau = $this->input->post('MatKhau');
                $DiaChi = $this->input->post('DiaChi');
                $DienThoai  = $this->input->post('DienThoai');
                $Email = $this->input->post('Email');
                $MaLoaiTaiKhoan = 2;
                
                $data = array(
                    'TenDangNhap' => $TenDangNhap,
                    'MatKhau' => md5($MatKhau),
                    'TenHienThi' => $TenHienThi,
                    'DiaChi' => $DiaChi,
                    'DienThoai' => $DienThoai,
                    'Email' => $Email,
                    'MaLoaiTaiKhoan' => $MaLoaiTaiKhoan
                );
                if($this->User_model->create($data))
                { 
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(admin_url('TK'));
            }
        }
        $this->data['temp'] = 'admin/TK/add';
        $this->load->view('admin/main', $this->data);
    }
    
    function edit()
    {
       //lay id can chinh sua
       $MaTaiKhoan = $this->uri->rsegment('3');
       $MaTaiKhoan = intval($MaTaiKhoan);
       
       $this->load->library('form_validation');
       $this->load->helper('form');
       
       //lay thong cua quan trị viên
       $info  = $this->User_model->get_info($MaTaiKhoan);
       if(!$info)
       {
           $this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
           redirect(admin_url('TK'));
       }
       $this->data['info'] = $info;
       
       if($this->input->post())
       {

           $this->form_validation->set_rules('TenHienThi', 'Tên', 'required|min_length[8]');
           $this->form_validation->set_rules('TenDangNhap', 'Tài khoản đăng nhập', 'required||min_length[8]');
           
           $password = $this->input->post('password');
           if($password)
           {
               $this->form_validation->set_rules('MatKhau', 'Mật khẩu', 'required|min_length[6]');
               $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[MatKhau]');
           }

           if($this->form_validation->run())
           {
               //them vao csdl
               $TenHienThi     = $this->input->post('TenHienThi');
               $TenDangNhap = $this->input->post('TenDangNhap');
               $DiaChi = $this->input->post('DiaChi');
               $DienThoai  = $this->input->post('DienThoai');
               $Email = $this->input->post('Email');

              
               $data = array(
                'TenDangNhap' => $TenDangNhap,
                'TenHienThi' => $TenHienThi,
                'DiaChi' => $DiaChi,
                'DienThoai' => $DienThoai,
                'Email' => $Email
               );

               //neu ma thay doi mat khau thi moi gan du lieu
               if($MatKhau)
               {
                   $data['MatKhau'] = md5($MatKhau);
               }
               
               if($this->User_model->update($MaTaiKhoan, $data))
               {
                   //tạo ra nội dung thông báo
                   $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
               }else{
                   $this->session->set_flashdata('message', 'Không cập nhật được');
               }
               //chuyen tới trang danh sách quản trị viên
               redirect(admin_url('TK'));
           }
       }
       
       $this->data['temp'] = 'admin/TK/edit';
       $this->load->view('admin/main', $this->data);
   }
   
   /*
    * Hàm xóa dữ liệu
    */
   function delete()
   {
        $MaTaiKhoan = $this->uri->rsegment('3');
        $MaTaiKhoan = intval($MaTaiKhoan);
        //lay thong tin cua quan tri vien
       $info = $this->User_model->get_info($MaTaiKhoan);
       if(!$info)
       {
           $this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
           redirect(admin_url('TK'));
       }
       //thuc hiện xóa
       $this->User_model->delete($MaTaiKhoan);
       
       $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
       redirect(admin_url('TK'));
   }
   
   /*
    * Thuc hien dang xuat
    */
   function logout()
   {
       if($this->session->userdata('login'))
       {
           $this->session->unset_userdata('login');
       }
       redirect(admin_url('login'));
   }
}



