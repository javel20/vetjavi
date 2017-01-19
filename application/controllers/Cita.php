<?php
include APPPATH ."helpers/Permisos_trait.php";
class Cita extends CI_Controller {

    use Permisos_trait;

        public function __construct()
        {

          parent::__construct();
          // if(!isset($_SESSION['Email'])){ die('login'); }
          $this->autorizado(2);
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
          $this->load->model('Cita_model');
          $data['datos_cita'] =  $this->Cita_model->get_citas($inicio,$limite);
          $config['base_url'] = base_url().'index.php/cita/pagina/';
          $config['total_rows'] = count($this->Cita_model->get_citas());
          $config['per_page'] = 10;
          $config['first_url'] = base_url().'index.php/cita/pagina/1';
          $this->pagination->initialize($config);
          //  die(var_dump($data));
          $this->load->view('cita/cita_v', $data);
        } 

        public function store(){
             $this->load->model('Cita_model');

             $result = $this->Cita_model->post_citas();
            //  die(var_dump($result));
            redirect(base_url().'index.php/cita', 'refresh');

        }

        public function create(){
          
            $this->load->model('Paciente_model');
            $data['pacientes'] = $this->Paciente_model->get_pacientes();
            $this->load->model('TipoCita_model');
            $data['citas'] = $this->TipoCita_model->get_tipocitas();
            $this->load->model('Cirugia_model');
            $data['cirugias'] = $this->Cirugia_model->get_cirugias();
            $this->load->view('cita/cita_crear_v', $data);
              


        }

        public function edit($id){
            $this->load->model('Paciente_model');
            $data['pacientes']= $this->Paciente_model->get_pacientes();
            $this->load->model('tipocita_model');
            $data['tipocitas']= $this->tipocita_model->get_tipocitas();//para el foreach del edit
            $this->load->model('Cita_model');
            $data['dato_cita'] =  $this->Cita_model->get_cita($id);
            // die(var_dump($data['dato_paciente']));
            $this->load->view('cita/cita_editar_v', $data);

        }


        public function update($id){
          // die($Datos);
             $this->load->model('Cita_model');
             $result = $this->Cita_model->update_cita($id);
             //die(var_dump($result));
             redirect(base_url().'index.php/cita', 'refresh');

        }

        public function search(){

          $this->load->model('Cita_model');
          $data['datos_cita'] =  $this->Cita_model->get_buscar_cita();
          $this->load->view('cita/cita_v', $data);
        }

        public function delete($id){
           $this->load->model('Cita_model');
           $this->Cita_model->get_eliminar_cita($id);
            redirect(base_url().'index.php/cita', 'refresh');

        }

        public function cirugia($id){

            $this->load->model('Cirugia_model');
            $cirugia['dato_cirugia'] =$this->Cirugia_model->get_cirugiaajax($id);
            echo json_encode($cirugia);

        }



}