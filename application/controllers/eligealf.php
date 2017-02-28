<?php

class eligealf extends CI_Controller{
    public function __construct() {
        parent::__construct();
        /*$this->load->model('alfabeto_model');*/
    }
    
    public function index(){
                      
        $content = array(
                'title=' > 'Elegir - Alfabeto : LSC',
                'main' => 'eligealf_view'
            );
            $this->load->view('include/main_template', $content);
        }
    }
?>
