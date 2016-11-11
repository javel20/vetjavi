<?php
class Local_model extends CI_Model {

        // public $IdLocal;
        public $Nombre;
        public $Direccion;
        public $Telefono;
        public $Estado;


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_locales()
        {
                $query = $this->db->get('local');
                return $query->result();
        }
         public function post_locales()
        {
                $this->Nombre    = $_POST['Nombre'];
                $this->Direccion    = $_POST['Direccion'];
                $this->Telefono    = $_POST['Telefono'];
                $this->Estado = "Habilitado";
                 

                $this->db->insert('local', $this);
        }

        public function get_local($IdLocal){

                $this->db->select('*');
                $this->db->from('local');
                $this->db->where('IdLocal',$IdLocal);   
                $query = $this->db->get();
                return $query->result();     

        }

       

        public function update_local($IdLocal)
        {
                $this->Nombre    = $_POST['Nombre'];
                $this->Direccion    = $_POST['Direccion'];
                $this->Telefono    = $_POST['Telefono'];
                $this->Estado    =  $_POST['Estado'];

                $this->db->update('local', $this, array('IdLocal' => $IdLocal));
        }

        public function get_buscar_local(){
                $dato_buscar = $_GET['nombre_buscar'];
                 $tipo_dato = $_GET['tipo_dato'];
                 $this->db->select('*');
                $this->db->from('local');
                $this->db->like(  $tipo_dato,$dato_buscar);   
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_local($id){
   
                $query = $this->db->delete("local", array('IdLocal'=>$id));
                 return $query; 
        }



}