'<?php
class Trabajador extends CI_Controller {

        public function index()
        {

          $this->load->model('Trabajador_model');
          $data['datos_trabajador'] =  $this->Trabajador_model->get_trabajadores();
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
            $this->load->view('trabajador/trabajador_crear_v', $data);
              

        }

        public function edit($id){
            $this->load->model('TipoTrab_model');
            $data['tipos']= $this->TipoTrab_model->get_tipotrabs();
            $this->load->model('Local_model');
            $data['local']= $this->Local_model->get_locales();
            $this->load->model('Local_model');
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

        public function login()
        {

          $this->load->model('Trabajador_model');
          $data['datos_trabajador'] =  $this->Trabajador_model->get_trabajadores();
          $this->load->view('trabajador/login', $data);
        }



}