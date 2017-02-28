<?php

class audilearningali extends CI_Controller{
    public function __construct() {
        parent::__construct();
        /*$this->load->model('alfabeto_model');*/
    }
    
    public function index(){
                      
        $content = array(
                'title=' > 'Alimentos : LSC',
                'main' => 'audilearningali_view'
            );
            $this->load->view('include/main_template', $content);
        }
    }
?>
