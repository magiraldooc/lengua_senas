<?php

class inicio extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
                      
        $content = array(
                'title=' > 'Inicio : LSC',
                'main' => 'inicio_view'
            );
            $this->load->view('include/main_template', $content);
            $this->load->view('include/global/bodyEncabezadoInicio', $content);

            
        }
    }
?>
