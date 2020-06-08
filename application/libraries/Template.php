<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template{
    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }
    
    function back($content, $data = NULL){ 
    	$data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
    	$data['sidebar'] = $this->_ci->load->view('template/sidebar', $data, TRUE);
        $data['content'] = $this->_ci->parser->parse($content, $data, TRUE);
        
        $this->_ci->parser->parse('template/index', $data);
    }
    
    function front($content, $data = NULL){ 
    	$data['header'] = $this->_ci->load->view('template/header_f', $data, TRUE);
        $data['content'] = $this->_ci->parser->parse($content, $data, TRUE);
        $data['footer'] = $this->_ci->load->view('template/footer_f', $data, TRUE);
        
        $this->_ci->parser->parse('template/index_f', $data);
    }
}