<?php
Class All_Product extends MY_Controller
{	
	function index()
	{   
            $this->load->model('product_model');
        

            $input = array();

            $input['where'] = array('BiXoa' => 0);
            $input['order'] = array('GiaSanPham','DESC');

            //lay tong so luong ta ca cac san pham trong websit
            $total_rows = $this->product_model->get_total($input);
            $this->data['total_rows'] = $total_rows;
            
            //load ra thu vien phan trang
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
            $config['base_url']   = base_url('all_product/index/catalog'); //link hien thi ra danh sach san pham
            $config['per_page']   = 9;//so luong san pham hien thi tren 1 trang
            $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
            $config['next_link']   = ' Trang kế tiếp ';
            $config['prev_link']   = ' Trang trước ';
    
            //khoi tao cac cau hinh phan trang
            $this->pagination->initialize($config);
       
            $segment = $this->uri->segment(4);
            $segment = intval($segment);
            $input['limit'] = array($config['per_page'], $segment);
            
            //lay danh sach tat ca san pham
            $list = $this->product_model->get_list($input);
            $this->data['list'] = $list;
            
            //hiển thị ra view
            $this->data['temp'] = 'site/all_product/catalog';
            $this->load->view('site/all_product/index', $this->data);
    }
}