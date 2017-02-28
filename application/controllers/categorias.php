<?php

class categorias extends CI_Controller{
    public function __construct() {
        parent::__construct();
        /*$this->load->model('alfabeto_model');*/
    }
    
    public function index(){
                      
        $content = array(
                'title=' > 'Categorías : LSC',
                'main' => 'categorias_view'
            );
            $this->load->view('include/main_template', $content);
        }
    }
?>
