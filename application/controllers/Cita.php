<?php
class Cita extends CI_Controller {

        public function index()
        {

          $this->load->model('Cita_model');
          $data['datos_cita'] =  $this->Cita_model->get_citas();
          //  die(var_dump($data));
          $this->load->view('cita/cita_v', $data);
        } 

        public function store(){
             $this->load->model('Cita_model');

             $result = $this->Cita_model->post_citas();
             redirect(base_url().'index.php/cita', 'refresh');

        }

        public function create(){
          
            $this->load->model('Paciente_model');
            $data['pacientes'] = $this->Paciente_model->get_pacientes();
            $this->load->model('TipoCita_model');
            $data['citas'] = $this->TipoCita_model->get_tipocitas();
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



}