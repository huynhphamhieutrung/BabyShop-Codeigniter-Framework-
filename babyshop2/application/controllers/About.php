<?php
class About extends MY_Controller
{
    function index()
    {
        //this->data['temp'] = 'site/about/index';
		$this->load->view('site/about/index');
    }
}
