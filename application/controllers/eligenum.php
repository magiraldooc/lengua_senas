<?php

class eligenum extends CI_Controller{
    public function __construct() {
        parent::__construct();
        /*$this->load->model('alfabeto_model');*/
    }
    
    public function index(){
                      
        $content = array(
                'title=' > 'Elegir - Números : LSC',
                'main' => 'eligenum_view'
            );
            $this->load->view('include/main_template', $content);
        }
    }
?>