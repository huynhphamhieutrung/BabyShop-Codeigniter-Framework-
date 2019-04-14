<?php
Class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load model san pham
        $this->load->model('product_model');
    }
    
    /*
     * Hiển thị danh sách sản phẩm theo mã loại 
     */
    function catalog()
    {
        //lấy ID của thể loại
        $id = intval($this->uri->rsegment(3));

        //lay ra thông tin của thể loại
        $this->load->model('catalog_model');
        $catalog = $this->catalog_model->get_info($id);
        if(!$catalog)
        {
            redirect();
        }
        
        $this->data['catalog'] = $catalog;
        $input = array();
        
        $input['where'] = array('MaLoaiSanPham' => $id);
 
        //lấy ra danh sách sản phẩm thuộc danh mục đó
        //lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->product_model->get_total($input);
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = base_url('product/catalog/'.$id); //link hien thi ra danh sach san pham
        $config['per_page']   = 9;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = ' Trang kế tiếp ';
        $config['prev_link']   = ' Trang trước ';

        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
   
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'], $segment);
        
        //lay danh sach san pham
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
        
        //hiển thị ra view
        $this->data['temp'] = 'site/product/catalog';
        $this->load->view('site/product/index', $this->data);
    }

    function producer()
    {
        //lấy ID của thể loại
        $id = intval($this->uri->rsegment(3));

        //lay ra thông tin của thể loại
        $this->load->model('producer_model');
        $producer = $this->producer_model->get_info($id);
        if(!$producer)
        {
            redirect();
        }
        
        $this->data['producer'] = $producer;
        $input = array();
        
        $input['where'] = array('MaHangSanXuat' => $id);
 
        //lấy ra danh sách sản phẩm thuộc danh mục đó
        //lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->product_model->get_total($input);
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = base_url('product/producer/'.$id); //link hien thi ra danh sach san pham
        $config['per_page']   = 9;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = ' Trang kế tiếp ';
        $config['prev_link']   = ' Trang trước ';

        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
   
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'], $segment);
        
        //lay danh sach san pham
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
        
        //hiển thị ra view
        $this->data['temp'] = 'site/product/producer';
        $this->load->view('site/product/index2', $this->data);
    }

    
    /*
     * Xem chi tiết sản phẩm
     */
    function view()
    {
        //lay id san pham muon xem
        $id = $this->uri->rsegment(3);
        $product = $this->product_model->get_info($id);
        if(!$product) redirect();
        $this->data['product'] = $product;

        $productInfo ="SELECT s.MaSanPham, s.TenSanPham, s.GiaSanPham, 
        s.SoLuongTon, s.SoLuocXem, s.HinhURL, s.MoTa, h.TenHangSanXuat, l.TenLoaiSanPham 
        FROM  SanPham s, HangSanXuat h, LoaiSanPham l 
        WHERE s.BiXoa = 0 AND s.MaHangSanXuat = h.MaHangSanXuat AND s.MaLoaiSanPham = l.MaLoaiSanPham 
        AND s.MaSanPham = $id";
        // $this->db->select('s.MaSanPham, s.TenSanPham, s.GiaSanPham, s.SoLuongTon, s.SoLuocXem, s.HinhURL, s.MoTa,
        // h.TenHangSanXuat, l.TenLoaiSanPham');
        // $this->db->from('SanPham s, HangSanXuat h, LoaiSanPham l');
        // $this->db->where('s.BiXoa = 0');
        // $this->db->where('s.MaHangSanXuat = h.MaHangSanXuat');
        // $this->db->where('s.MaLoaiSanPham = l.MaLoaiSanPham');
        // $this->db->where('s.MaSanPham', $id);
        $query = $this->db->query($productInfo);
        $this->data['query'] = $query->result();
        
         
        //hiển thị ra view
        $this->data['temp'] = 'site/product/view';
        $this->load->view('site/product/index3', $this->data);
    }
	 
    /*
     * Tim kiem theo ten san pham
     */
    function search()
    {
        if($this->uri->rsegment('3') == 1)
        {
            //lay du lieu tu autocomplete
            $key =  $this->input->get('term');
        }else{
            $key =  $this->input->get('key-search');
        }
        
        $this->data['key'] = trim($key);
        $input = array();
        $input['like'] = array('name', $key);
        $list = $this->product_model->get_list($input);
        $this->data['list']  = $list;
        
        if($this->uri->rsegment('3') == 1)
        {
            //xu ly autocomplete
            $result = array();
            foreach ($list as $row)
            {
                $item = array();
                $item['id'] = $row->id;
                $item['label'] = $row->name;
                $item['value'] = $row->name;
                $result[] = $item;
            }
            //du lieu tra ve duoi dang json
            die(json_encode($result));
        }else{

            //load view
            $this->data['temp'] = 'site/product/search';
            $this->load->view('site/layout', $this->data);
        }
		
		
		
		
    }
}