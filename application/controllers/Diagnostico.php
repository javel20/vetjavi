<?php 
include APPPATH ."helpers/Permisos_trait.php";
class Diagnostico extends CI_Controller {

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
          $this->load->model('Diagnostico_model');
          $data['datos_diagnostico'] =  $this->Diagnostico_model->get_diagnosticos($inicio,$limite);
          $config['base_url'] = base_url().'index.php/diagnostico/pagina/';
          $config['total_rows'] = count($this->Diagnostico_model->get_diagnosticos());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/diagnostico/pagina/1';
          $this->pagination->initialize($config);
        //   die(var_dump($data));
          $this->load->view('diagnostico/diagnostico_v', $data);
        }

        public function store(){
             $this->load->model('Diagnostico_model');
             $result = $this->Diagnostico_model->post_diagnosticos();
             redirect(base_url().'index.php/diagnostico', 'refresh');

        }

        public function create(){
          
            $this->load->model('Cita_model');
             $data['citas'] = $this->Cita_model->get_citas();

            $this->load->view('diagnostico/diagnostico_crear_v', $data);
              


        }

        public function edit($id){
/*            $this->load->model('StockPresen_model');
            $data['tipos']= $this->StockPresen_model->get_stockpresens();
            */
               $this->load->model('Cita_model');
             $data['citas'] = $this->Cita_model->get_citas();
             $this->load->model('Diagnostico_model');
            $data['dato_diagnosticos'] =  $this->Diagnostico_model->get_diagnostico($id);

            $this->load->view('diagnostico/diagnostico_editar_v', $data);

        }


        public function update($id){
          // die($Datos);
             $this->load->model('Diagnostico_model');
             $result = $this->Diagnostico_model->update_diagnostico($id);
             redirect(base_url().'index.php/diagnostico', 'refresh');

        }

        public function search(){
          $this->load->model('Diagnostico_model');
          $data['datos_diagnostico'] =  $this->Diagnostico_model->get_buscar_diagnostico();
          $this->load->view('diagnostico/diagnostico_v', $data);
        }

        public function delete($id){
           $this->load->model('Diagnostico_model');
           $this->Diagnostico_model->get_eliminar_diagnostico($id);
            redirect(base_url().'index.php/Diagnostico', 'refresh');

        }



}