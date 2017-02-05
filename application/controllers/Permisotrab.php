<?php
include APPPATH ."helpers/Permisos_trait.php";
class Permisotrab extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(7);
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
          $this->load->model('Permisotrab_model');
          $data['datos_permiso'] =  $this->Permisotrab_model->get_permisos($inicio,$limite);
          $config['base_url'] = base_url().'index.php/permiso/pagina/';
          $config['total_rows'] = count($this->Permisotrab_model->get_permisos());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/permiso/pagina/1';
          $this->pagination->initialize($config);
        //   die(var_dump($data));
          $this->load->view('permisotrab/permisotrab_v', $data);
        }

        public function store(){
             $this->load->model('Permisotrab_model');
             $result = $this->Permisotrab_model->post_permisos();
             redirect(base_url().'index.php/permisotrab', 'refresh');

        }

        public function create(){
          
            $this->load->model('Trabajador_model');
            $data['trabajadores'] = $this->Trabajador_model->get_trabajadores();

            $this->load->view('permisotrab/permisotrab_crear_v', $data);
              


        }

        public function edit($id){
            $this->load->model('Trabajador_model');
            $data['trabajadores']= $this->Trabajador_model->get_trabajadores();
            $this->load->model('Permisotrab_model');
            $data['dato_permiso'] =  $this->Permisotrab_model->get_permiso($id);
            // die(var_dump($data['dato_permiso']));
            $this->load->view('permisotrab/permisotrab_editar_v', $data);

        }


        public function update($id){
          // die($Datos);
             $this->load->model('Permisotrab_model');
             $result = $this->Permisotrab_model->update_permiso($id);
             redirect(base_url().'index.php/permisotrab', 'refresh');

        }

        public function search(){
          $inicio=0;
          $limite=10;

          if(isset($_GET['per_page'])){
            // die($pagina);
            $inicio=(($_GET['per_page'])-1) * $limite;
          }

          $this->load->library('pagination');
          $this->load->model('Permisotrab_model');
          $data['datos_permiso'] =  $this->Permisotrab_model->get_buscar_permiso($inicio,$limite);
          $config['base_url'] = base_url().'index.php/permiso/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato'];
          $config['total_rows'] = count($this->Permisotrab_model->get_buscar_permiso());
          $config['per_page'] = 10;

          $config['first_url'] = base_url().'index.php/permiso/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato']."&per_page=1";
          $config['page_query_string'] = TRUE;
          $this->pagination->initialize($config);

          $this->load->view('permisotrab/permisotrab_v', $data);
        }

        public function delete($id){
           $this->load->model('Permisotrab_model');
           $this->Permisotrab_model->get_eliminar_permiso($id);
            redirect(base_url().'index.php/permisotrab', 'refresh');

        }



}