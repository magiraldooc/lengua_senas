<?php

class validationaudilearningali extends CI_Controller{
    public function __construct() {
        parent::__construct();
        /*$this->load->model('alfabeto_model');*/
    }
    
    public function index(){
                      
        $content = array(
                'title=' > 'Validación : LSC',
                'main' => 'validationaudilearningali_view'
            );
            $this->load->view('include/main_template', $content);
        }
    }
?>
