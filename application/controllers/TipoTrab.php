<?php
include APPPATH ."helpers/Permisos_trait.php";
class TipoTrab extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(14);
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
          $this->load->model('TipoTrab_model');
          $data['datos_tipotrab'] =  $this->TipoTrab_model->get_tipotrabs($inicio,$limite);
          $config['base_url'] = base_url().'index.php/tipotrab/pagina/';
          $config['total_rows'] = count($this->TipoTrab_model->get_tipotrabs());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/tipotrab/pagina/1';
          $this->pagination->initialize($config);

          $this->load->view('tipotrab/tipotrab_v', $data);
        }

        public function store(){
             $this->load->model('TipoTrab_model');
             $result = $this->TipoTrab_model->post_tipotrabs();
             redirect(base_url().'index.php/TipoTrab', 'refresh');

        }

        public function create(){
          
            $this->load->view('tipotrab/tipotrab_crear_v');

        }

        public function edit($id){

            $this->load->model('tipotrab_model');
            $data['dato_tipotrab'] =  $this->tipotrab_model->get_tipotrab($id);

            $this->load->view('tipotrab/tipotrab_editar_v', $data);

        }


        public function update($id){
             $this->load->model('tipotrab_model');
             $result = $this->tipotrab_model->update_tipotrab($id);
             redirect(base_url().'index.php/tipotrab', 'refresh');

        }

        public function search(){
          $inicio=0;
          $limite=10;

          if(isset($_GET['per_page'])){
            // die($pagina);
            $inicio=(($_GET['per_page'])-1) * $limite;
          }

          $this->load->library('pagination');
          $this->load->model('tipotrab_model');
          $data['datos_tipotrab'] =  $this->tipotrab_model->get_buscar_tipotrab($inicio,$limite);
          $config['base_url'] = base_url().'index.php/tipotrab/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato'];
          $config['total_rows'] = count($this->tipotrab_model->get_buscar_tipotrab());
          $config['per_page'] = 10;

          $config['first_url'] = base_url().'index.php/tipotrab/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato']."&per_page=1";
          $config['page_query_string'] = TRUE;
          $this->pagination->initialize($config);
          $this->load->view('tipotrab/tipotrab_v', $data);
        }

        public function delete($id){
           $this->load->model('tipotrab_model');
           $this->tipotrab_model->get_eliminar_tipotrab($id);
            redirect(base_url().'index.php/tipotrab', 'refresh');

        }


}