'<?php
class Analisis extends CI_Controller {

        public function index()
        {

          $this->load->model('Analisis_model');
          $data['datos_analisis'] =  $this->Analisis_model->get_analisiss();
        //   die(var_dump($data));
          $this->load->view('analisis/analisis_v', $data);
        }

        public function store(){
             $this->load->model('Analisis_model');
             $result = $this->Analisis_model->post_analisiss();
             redirect(base_url().'index.php/analisis', 'refresh');

        }

        public function create(){
          
            $this->load->model('paciente_model');
             $data['pacientes'] = $this->paciente_model->get_pacientes();

            $this->load->view('analisis/analisis_crear_v', $data);
              


        }

        public function edit($id){
/*            $this->load->model('StockPresen_model');
            $data['tipos']= $this->StockPresen_model->get_stockpresens();
            */
               $this->load->model('paciente_model');
             $data['pacientes'] = $this->paciente_model->get_pacientes();
             $this->load->model('Analisis_model');
            $data['dato_analisis'] =  $this->Analisis_model->get_analisis($id);

            $this->load->view('analisis/analisis_editar_v', $data);

        }


        public function update($id){
          // die($Datos);
             $this->load->model('analisis_model');
             $result = $this->analisis_model->update_analisis($id);
             redirect(base_url().'index.php/analisis', 'refresh');

        }

        public function search(){
          $this->load->model('Analisis_model');
          $data['datos_analisis'] =  $this->Analisis_model->get_buscar_analisis();
          $this->load->view('analisis/analisis_v', $data);
        }

        public function delete($id){
           $this->load->model('Analisis_model');
           $this->Analisis_model->get_eliminar_analisis($id);
            redirect(base_url().'index.php/Analisis', 'refresh');

        }



}