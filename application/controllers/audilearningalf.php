<?php

class audilearningalf extends CI_Controller{
    public function __construct() {
        parent::__construct();
        /*$this->load->model('alfabeto_model');*/
    }
    
    public function index(){
                      
        $content = array(
                'title=' > 'Alfabeto : LSC',
                'main' => 'audilearningalf_view'
            );
            $this->load->view('include/main_template', $content);
        }
    }
?>
