<?php
include APPPATH ."helpers/Permisos_trait.php";
class Trabajador extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(15);
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
          $this->load->model('Trabajador_model');
          $data['datos_trabajador'] =  $this->Trabajador_model->get_trabajadores($inicio,$limite);
          $config['base_url'] = base_url().'index.php/trabajador/pagina/';
          $config['total_rows'] = count($this->Trabajador_model->get_trabajadores());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/trabajador/pagina/1';  

          $this->load->view('trabajador/trabajador_v', $data);
        }

        public function store(){
             $this->load->model('Trabajador_model');
             $result = $this->Trabajador_model->post_trabajadores();
             redirect(base_url().'index.php/trabajador', 'refresh');

        }

        public function create(){
          
            $this->load->model('TipoTrab_model');
            $data['tipos'] = $this->TipoTrab_model->get_tipotrabs();
            $this->load->model('Local_model');
            $data['local'] = $this->Local_model->get_locales();
            $this->load->model('Permiso_model');
            $data['permisos'] = $this->Permiso_model->get_permisos();
            $this->load->view('trabajador/trabajador_crear_v', $data);
              

        }

        public function edit($id){
            $this->load->model('TipoTrab_model');
            $data['tipos']= $this->TipoTrab_model->get_tipotrabs();
            $this->load->model('Local_model');
            $data['local']= $this->Local_model->get_locales();
            $this->load->model('Trabajador_model');
            $data['dato_trabajador'] =  $this->Trabajador_model->get_trabajador($id);

            $this->load->view('trabajador/trabajador_editar_v', $data);

        }


        public function update($id){
             $this->load->model('Trabajador_model');
             $result = $this->Trabajador_model->update_trabajador($id);
             redirect(base_url().'index.php/trabajador', 'refresh');

        }

        public function search(){
          $this->load->model('Trabajador_model');
          $data['datos_trabajador'] =  $this->Trabajador_model->get_buscar_trabajador();
          $this->load->view('trabajador/trabajador_v', $data);
        }

        public function delete($id){
           $this->load->model('Trabajador_model');
           $this->Trabajador_model->get_eliminar_trabajador($id);
            redirect(base_url().'index.php/trabajador', 'refresh');

        }





}