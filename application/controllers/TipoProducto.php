<?php
include APPPATH ."helpers/Permisos_trait.php";
class TipoProducto extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(13);
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
          $this->load->model('TipoProducto_model');
          $data['datos_tipoprod'] =  $this->TipoProducto_model->get_tipoproductos($inicio,$limite);
          $config['base_url'] = base_url().'index.php/tipoproducto/pagina/';
          $config['total_rows'] = count($this->TipoProducto_model->get_tipoproductos());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/tipoproducto/pagina/1';
          $this->pagination->initialize($config);

          $this->load->view('tipoproducto/tipoproducto_v', $data);
        }

        public function store(){
             $this->load->model('TipoProducto_model');
             $result = $this->TipoProducto_model->post_tipoproductos();
             redirect(base_url().'index.php/tipoproducto', 'refresh');

        }

        public function create(){
          
            $this->load->view('tipoproducto/tipoproducto_crear_v');

        }

        public function edit($id){

            $this->load->model('TipoProducto_model');
            $data['dato_tipoprod'] =  $this->TipoProducto_model->get_tipoproducto($id);

            $this->load->view('tipoproducto/tipoproducto_editar_v', $data);

        }


        public function update($id){
             $this->load->model('TipoProducto_model');
             $result = $this->TipoProducto_model->update_tipoproducto($id);
             redirect(base_url().'index.php/tipoproducto', 'refresh');

        }

        public function search(){
          $inicio=0;
          $limite=10;

          if(isset($_GET['per_page'])){
            // die($pagina);
            $inicio=(($_GET['per_page'])-1) * $limite;
          }

          $this->load->library('pagination');
          $this->load->model('TipoProducto_model');
          $data['datos_tipoprod'] =  $this->TipoProducto_model->get_buscar_tipoproducto($inicio,$limite);
          $config['base_url'] = base_url().'index.php/tipoproducto/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato'];
          $config['total_rows'] = count($this->TipoProducto_model->get_buscar_tipoproducto());
          $config['per_page'] = 10;

          $config['first_url'] = base_url().'index.php/tipoproducto/search?nombre_buscar='.$_GET['nombre_buscar'].'&tipo_dato='.$_GET['tipo_dato'].'&nombre_dato='.$_GET['nombre_dato']."&per_page=1";
          $config['page_query_string'] = TRUE;
          $this->pagination->initialize($config);

          $this->load->view('tipoproducto/tipoproducto_v', $data);
        }

        public function delete($id){
            $this->load->model('TipoProducto_model');
            $this->TipoProducto_model->get_eliminar_tipoproducto($id);
            redirect(base_url().'index.php/tipoproducto', 'refresh');

        }

        public function get_tipoprod(){

           $query = $this->db->get('tipoproducto');
           return $query->result();

         }



}