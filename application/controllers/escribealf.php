<?php

class escribealf extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
                      
        $content = array(
                'title=' > 'Escribir - Alfabeto : LSC',
                'main' => 'escribealf_view'
            );
            $this->load->view('include/main_template', $content);
        }
    }
?>
