<?php
include APPPATH ."helpers/Permisos_trait.php";
class Reportes extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();

          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(10);
          $this->authenticate();

        }

        function authenticate()
        {
          if(!$this->session->userdata('Email'))
          {
            redirect('login');
          }
        }
        


          public function reportetotal(){
            $this->load->model('Reporte_model');
            if(isset($_GET['Fechareporte'])){
              $fecha=$_GET['Fechareporte'];
            }else{

              $fecha="";

            }

            $data['datos_reportes'] =  $this->Reporte_model->get_reporte($fecha);
            

            
            // die($_GET['Fechareporte']);

            $acum=0;
            foreach($data['datos_reportes'] as $dato){
                
                $acum+=$dato->precio;
              
                  
            }

            $data["acum"]=$acum;

            $this->load->view('reportes/reporte_venta_dia', $data);
            
            // die((string)$acum);
          
        }





}