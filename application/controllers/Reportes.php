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
        


          public function reportetotalventa(){
            $this->load->model('Reporte_model');
            if(isset($_GET['Fechareporte'])){
              $fecha=$_GET['Fechareporte'];
            }else{

              $fecha="";

            }

            $data['data_venta'] =  $this->Reporte_model->get_reporte_ingreso($fecha);
            $data['data_perdida'] = $this->Reporte_model->get_reporte_perdida($fecha);

            
            // die($_GET['Fechareporte']);

            $acum=0;
           $acum2=0; 
           $acum3=0;

          foreach($data['data_perdida'] as $dato){
            $acum3+=$dato->perdida;
          }

            foreach($data['data_venta'] as $dato){
                
                $acum+=$dato->precio;
                $acum2+=$dato->ganancia;
                  
            }
            $data["acum3"]=$acum3;
            $data["acum2"]=$acum2;

            $data["acum"]=$acum;

            $data["resta"]=$acum-$acum3;
            // die($data["resta"]);

            $this->load->view('reportes/reporte_venta_dia', $data);
            
            // die((string)$acum);
          
        }


        public function reportetotalcompra(){
            $this->load->model('Reporte_model');
            if(isset($_GET['Fechareporte'])){
              $fecha=$_GET['Fechareporte'];
            }else{

              $fecha="";

            }

            $data['data_compra'] =  $this->Reporte_model->get_reporte_ingreso_compra($fecha);
            // $data['data_perdida'] = $this->Reporte_model->get_reporte_perdida($fecha);

            
            // die($_GET['Fechareporte']);

            $acum=0;
           $acum2=0; 
           $acum3=0;

          
            foreach($data['data_compra'] as $dato){
                
                $acum+=$dato->PrecioTotalCompra;
                
                  
            }
            $data["acum3"]=$acum3;
            $data["acum2"]=$acum2;

            $data["acum"]=$acum;

            $data["resta"]=$acum-$acum3;
            // die($data["resta"]);

            $this->load->view('reportes/reporte_compra_dia', $data);
            
            // die((string)$acum);
          
        }




}