<?php
include APPPATH ."helpers/Permisos_trait.php";
class StockPresen extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(11);
          $this->authenticate();

        }

        function authenticate()
        {
          if(!$this->session->userdata('Email'))
          {
            redirect('login');
          }
        }

        
        public function index($pagina=FALSE)
        {
          $inicio=0;
          $limite=10;

          if($pagina){
            $inicio=($pagina-1) * $limite;
          }

          $this->load->library('pagination'); 
          $this->load->model('StockPresen_model');
          $data['datos_stockpresen'] =  $this->StockPresen_model->get_stockpresens($inicio,$limite);
          $config['base_url'] = base_url().'index.php/stockpresen/pagina/';
          $config['total_rows'] = count($this->StockPresen_model->get_stockpresens());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/stockpresen/pagina/1';
          $this->pagination->initialize($config);
        //   die(var_dump($data));
          $this->load->view('stockpresen/stockpresen_v', $data);
        }

        public function store(){
             $this->load->model('StockPresen_model');
             $result = $this->StockPresen_model->post_stockpresens();
             redirect(base_url().'index.php/StockPresen', 'refresh');

        }

        public function create(){
          
            $this->load->model('producto_model');
            $data['productos'] = $this->producto_model->get_productos();

            $this->load->view('stockpresen/stockpresen_crear_v', $data);
              


        }

        public function edit($id){
/*            $this->load->model('StockPresen_model');
            $data['tipos']= $this->StockPresen_model->get_stockpresens();
            */
            $this->load->model('producto_model');
            $data['productos'] = $this->producto_model->get_productos();
            $this->load->model('StockPresen_model');
            $data['dato_stockpresen'] =  $this->StockPresen_model->get_stockpresen($id);

            $this->load->view('stockpresen/stockpresen_editar_v', $data);

        }


        public function update($id){
          // die($Datos);
             $this->load->model('StockPresen_model');
             $result = $this->StockPresen_model->update_stockpresen($id);
             redirect(base_url().'index.php/StockPresen', 'refresh');

        }

        public function search(){
          $this->load->model('StockPresen_model');
          $data['datos_stockpresen'] =  $this->StockPresen_model->get_buscar_stockpresen();
          $this->load->view('StockPresen/stockpresen_v', $data);
        }

        public function delete($id){
           $this->load->model('StockPresen_model');
           $this->StockPresen_model->get_eliminar_stockpresen($id);
            redirect(base_url().'index.php/StockPresen', 'refresh');

        }

        public function stock_api(){

          $this->load->model('StockPresen_model');
          $data['datos_stockpresen'] =  $this->StockPresen_model->get_stockpresens();
            // die(json_encode($data));
          echo json_encode($data);
          
          // return True;

        }


}