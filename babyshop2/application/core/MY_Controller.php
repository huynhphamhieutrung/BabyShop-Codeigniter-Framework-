<?php
Class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $controller = $this->uri->segment(1);
        switch($controller)
        {
            case 'admin':
            {
                $this->load->helper('admin');
                $this->check_login();
                break;
            }
            default:
            {
                // truy xuất điều kiện BiXoa = 0
                $input = array();
                $input['where'] = array('BiXoa' => 0);
                
                // truy xuất điều kiện BiXoa = 0, order theo NgayNhap, limit 5 dữ liệu
                $input1 = array();
                $input1['where'] = array('BiXoa' => 0);
                $input1['order'] = array('NgayNhap','');
                $input1['limit'] = array('5','0');
                
                // truy xuất điều kiện BiXoa = 0, order theo SoLuocXem và SoLuongBan, limit 3 dữ liệu
                $input2 = array();
                $input2['where'] = array('BiXoa' => 0);
                $input2['order'] = array('SoLuocXem,SoLuongBan','');         
                $input2['limit'] = array('3','0');

                // truy xuất điều kiện BiXoa = 0, order theo SoLuongTon và SoLuongBan, limit 3 dữ liệu
                $input3 = array();
                $input3['where'] = array('BiXoa' => 0);
                $input3['order'] = array('SoLuongTon','') && array('SoLuongBan','');          
                $input3['limit'] = array('3','0');

                // load danh sách hãng sản xuất
                {
                    $this->load->model('producer_model');
                    $producer_list = $this->producer_model->get_list($input);
                    $this->data['producer_list'] = $producer_list;
                }
                
                // load danh sách loại sản phẩm
                {
                    $this->load->model('catalog_model');
                    $catalog_list = $this->catalog_model->get_list($input);
                    $this->data['catalog_list'] = $catalog_list;
                }
                
                // load sản phẩm mới nhất
                {
                    $this->load->model('product_model');
                    $productNewest = $this->product_model->get_list($input1);
                    $this->data['productNewest'] = $productNewest;
                }
                
                // load sản phẩm đang hot
                {
                    $this->load->model('product_model');
                    $productHot = $this->product_model->get_list($input2);
                    $this->data['productHot'] = $productHot;
                }


                // load sản phẩm đang cold
                {
                    $this->load->model('product_model');
                    $productCold = $this->product_model->get_list($input3);
                    $this->data['productCold'] = $productCold;
                }             

                // lấy tổng số sản phẩm
                {
                    $totalProduct = $this->product_model->get_total($input);
                    $this->data['totalProduct'] = $totalProduct;
                }

                {
                    $this->load->library('cart');
                    $this->data['total_items'] = $this->cart->total_items();
                }
            }
        }
    }

    /*
     * Kiem tra trang thai dang nhap cua admin
     */
    private function check_login()
    {
        $controller = $this->uri->segment('1');
        $controller = strtolower($controller);

        $login = $this->session->userdata('Login');
        //neu ma chua dang nhap,ma truy cap 1 controller khac login
        // if(!$login && $controller != 'Login')
        // {
        //     redirect(admin_url('login'));
        // }
        //neu ma admin da dang nhap thi khong cho phep vao trang login nua.
        if($login && $controller == 'login')
        {
            redirect(admin_url('home'));
        }
    }
}