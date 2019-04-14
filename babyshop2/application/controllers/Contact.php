<?php
class Contact extends MY_Controller
{
    function index()
    {
        //this->data['temp'] = 'site/about/index';
		$this->load->view('site/contact/index');
    }
}
