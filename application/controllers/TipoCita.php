<?php
include APPPATH ."helpers/Permisos_trait.php";
class TipoCita extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(12); 
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
          $this->load->model('tipocita_model');
          $data['datos_tipocita'] =  $this->tipocita_model->get_tipocitas($inicio,$limite);
          $config['base_url'] = base_url().'index.php/tipocita/pagina/';
          $config['total_rows'] = count($this->tipocita_model->get_tipocitas());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/tipocita/pagina/1';
          $this->pagination->initialize($config);

          $this->load->view('tipocita/tipocita_v', $data);
        }

        public function store(){
             $this->load->model('tipocita_model');
             $result = $this->tipocita_model->post_tipocitas();
             redirect(base_url().'index.php/tipocita', 'refresh');

        }

        public function create(){
          
            $this->load->view('tipocita/tipocita_crear_v');

        }

        public function edit($id){

            $this->load->model('tipocita_model');
            $data['dato_tipocita'] =  $this->tipocita_model->get_tipocita($id);

            $this->load->view('tipocita/tipocita_editar_v', $data);

        }


        public function update($id){
             $this->load->model('tipocita_model');
             $result = $this->tipocita_model->update_tipocita($id);
             redirect(base_url().'index.php/tipocita', 'refresh');

        }

        public function search(){
          $this->load->model('tipocita_model');
          $data['datos_tipocita'] =  $this->tipocita_model->get_buscar_tipocita();
          $this->load->view('tipocita/tipocita_v', $data);
        }

        public function delete($id){
           $this->load->model('tipocita_model');
           $this->tipocita_model->get_eliminar_tipocita($id);
            redirect(base_url().'index.php/tipocita', 'refresh');

        }


}