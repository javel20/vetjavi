<?php
include APPPATH ."helpers/Permisos_trait.php";
class Local extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(6);
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
          $this->load->model('Local_model');
          $data['datos_local'] =  $this->Local_model->get_locales($inicio,$limite);
          $config['base_url'] = base_url().'index.php/local/pagina/';
          $config['total_rows'] = count($this->Local_model->get_locales());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/local/pagina/1';
          $this->pagination->initialize($config);
          $this->load->view('local/local_v', $data);
        }

        public function store(){
             $this->load->model('Local_model');
             $result = $this->Local_model->post_locales();
             redirect(base_url().'index.php/local', 'refresh');

        }

        public function create(){
          
            $this->load->view('local/local_crear_v');

        }

        public function edit($id){

            $this->load->model('Local_model');
            $data['dato_local'] =  $this->Local_model->get_local($id);

            $this->load->view('local/local_editar_v', $data);

        }


        public function update($id){
             $this->load->model('Local_model');
             $result = $this->Local_model->update_local($id);
             redirect(base_url().'index.php/local', 'refresh');

        }

        public function search(){
          $inicio=0;
          $limite=10;

          if(isset($_GET['per_page'])){
            // die($pagina);
            $inicio=(($_GET['per_page'])-1) * $limite;
          }

          $this->load->library('pagination');
          $this->load->model('Local_model');
          $data['datos_local'] =  $this->Local_model->get_buscar_local($inicio,$limite);
          $config['base_url'] = base_url().'index.php/local/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato'];
          $config['total_rows'] = count($this->Local_model->get_buscar_local());
          $config['per_page'] = 10;

          $config['first_url'] = base_url().'index.php/local/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato']."&per_page=1";
          $config['page_query_string'] = TRUE;
          $this->pagination->initialize($config);

          $this->load->view('local/local_v', $data);
        }

        public function delete($id){
           $this->load->model('Local_model');
           $this->Local_model->get_eliminar_local($id);
            redirect(base_url().'index.php/local', 'refresh');

        }



}