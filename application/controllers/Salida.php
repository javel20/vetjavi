<?php 
include APPPATH ."helpers/Permisos_trait.php";
class Salida extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(5);
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
          $this->load->model('Salida_model');
          $data['datos_salida'] =  $this->Salida_model->get_salidas($inicio,$limite);
          $config['base_url'] = base_url().'index.php/salida/pagina/';
          $config['total_rows'] = count($this->Salida_model->get_salidas());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/salida/pagina/1';
          $this->pagination->initialize($config);
        //   die(var_dump($data));
          $this->load->view('salida/salida_v', $data);
        }

        public function store(){
             $this->load->model('Salida_model');
             $result = $this->Salida_model->post_salidas();
             redirect(base_url().'index.php/salida', 'refresh');

        }

        public function create(){
          
            $this->load->model('Cita_model');
             $data['citas'] = $this->Cita_model->get_citas();

            $this->load->view('salida/salida_crear_v', $data);
              


        }

        public function edit($id){
/*            $this->load->model('StockPresen_model');
            $data['tipos']= $this->StockPresen_model->get_stockpresens();
            */
            $this->load->model('Salida_model');
            $data['dato_salidas'] =  $this->Salida_model->get_salida($id);
            $this->load->model('Cita_model');
            $data['citas'] = $this->Cita_model->get_citas();

            $this->load->view('salida/salida_editar_v', $data);

        }


        public function update($id){
          // die($Datos);
             $this->load->model('Salida_model'); 
             $result = $this->Salida_model->update_salida($id);
             redirect(base_url().'index.php/salida', 'refresh');

        }

        public function search(){
          $inicio=0;
          $limite=10;

          if(isset($_GET['per_page'])){
            // die($pagina);
            $inicio=(($_GET['per_page'])-1) * $limite;
          }

          $this->load->library('pagination');
          $this->load->model('Salida_model');
          $data['datos_salida'] =  $this->Salida_model->get_buscar_salida($inicio,$limite);
          $config['base_url'] = base_url().'index.php/salida/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato'];
          $config['total_rows'] = count($this->Salida_model->get_buscar_salida());
          $config['per_page'] = 10;

          $config['first_url'] = base_url().'index.php/salida/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato']."&per_page=1";
          $config['page_query_string'] = TRUE;
          $this->pagination->initialize($config);

          $this->load->view('salida/salida_v', $data);
        }

        public function delete($id){
           $this->load->model('Salida_model');
           $this->Salida_model->get_eliminar_salida($id);
            redirect(base_url().'index.php/salida', 'refresh');

        }



}