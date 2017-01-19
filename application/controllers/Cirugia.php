<?php
include APPPATH ."helpers/Permisos_trait.php";
class Cirugia extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(17); 
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
          $this->load->model('Cirugia_model');
          $data['datos_cirugia'] =  $this->Cirugia_model->get_cirugias($inicio,$limite);
          $config['base_url'] = base_url().'index.php/cirugia/pagina/';
          $config['total_rows'] = count($this->Cirugia_model->get_cirugias());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/cirugia/pagina/1';
          $this->pagination->initialize($config);

          $this->load->view('cirugia/cirugia_v', $data);
        }

        public function store(){
             $this->load->model('Cirugia_model');
             $result = $this->Cirugia_model->post_cirugias();
             redirect(base_url().'index.php/cirugia', 'refresh');

        }

        public function create(){
          
            $this->load->view('cirugia/cirugia_crear_v');

        }

        public function edit($id){

            $this->load->model('Cirugia_model');
            $data['dato_cirugia'] =  $this->Cirugia_model->get_cirugia($id);

            $this->load->view('cirugia/cirugia_editar_v', $data);

        }


        public function update($id){
             $this->load->model('Cirugia_model');
             $result = $this->Cirugia_model->update_cirugia($id);
             redirect(base_url().'index.php/cirugia', 'refresh');

        }

        public function search(){
          $this->load->model('Cirugia_model');
          $data['datos_cirugia'] =  $this->Cirugia_model->get_buscar_cirugia();
          $this->load->view('cirugia/cirugia_v', $data);
        }

        public function delete($id){
           $this->load->model('Cirugia_model');
           $this->Cirugia_model->get_eliminar_cirugia($id);
            redirect(base_url().'index.php/cirugia', 'refresh');

        }


}