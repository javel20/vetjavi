'<?php
class Paciente extends CI_Controller {

        public function index()
        {

          $this->load->model('paciente_model');
          $data['datos_paciente'] =  $this->paciente_model->get_pacientes();
        //   die(var_dump($data));
          $this->load->view('paciente/paciente_v', $data);
        }

        public function store(){
             $this->load->model('paciente_model');
             $result = $this->paciente_model->post_pacientes();
             redirect(base_url().'index.php/paciente', 'refresh');

        }

        public function create(){
          
            $this->load->model('cliente_model');
             $data['clientes'] = $this->cliente_model->get_clientes();

            $this->load->view('paciente/paciente_crear_v', $data);
              


        }

        public function edit($id){
            $this->load->model('cliente_model');
            $data['clientes']= $this->cliente_model->get_clientes();
            $this->load->model('paciente_model');
            $data['dato_paciente'] =  $this->paciente_model->get_paciente($id);
            // die(var_dump($data['dato_paciente']));
            $this->load->view('paciente/paciente_editar_v', $data);

        }


        public function update($id){
          // die($Datos);
             $this->load->model('paciente_model');
             $result = $this->paciente_model->update_paciente($id);
             redirect(base_url().'index.php/paciente', 'refresh');

        }

        public function search(){
          $this->load->model('paciente_model');
          $data['datos_paciente'] =  $this->paciente_model->get_buscar_paciente();
          $this->load->view('paciente/paciente_v', $data);
        }

        public function delete($id){
           $this->load->model('paciente_model');
           $this->paciente_model->get_eliminar_paciente($id);
            redirect(base_url().'index.php/paciente', 'refresh');

        }



}