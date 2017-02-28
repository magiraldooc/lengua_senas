<?php

class asociaalf extends CI_Controller{
    public function __construct() {
        parent::__construct();
        /*$this->load->model('alfabeto_model');*/
    }
    
    public function index(){
                      
        $content = array(
                'title=' > 'Asociar - Alfabeto : LSC',
                'main' => 'asociaalf_view'
            );
            $this->load->view('include/main_template', $content);
        }
    }
?>
