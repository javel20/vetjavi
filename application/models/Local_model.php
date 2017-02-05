<?php
class Local_model extends CI_Model {

        // public $IdLocal;
        public $NombreL;
        public $DireccionL;
        public $TelefonoL;
        public $EstadoL;


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_locales($inicio=FALSE,$limite=FALSE)
        {

                $this->db->select('*');
                $this->db->from('local');

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get();
                return $query->result();
        }
         public function post_locales()
        {
                $this->NombreL    = $_POST['Nombre'];
                $this->DireccionL    = $_POST['Direccion'];
                $this->TelefonoL    = $_POST['Telefono'];
                $this->EstadoL = "Habilitado";
                 

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
                $this->NombreL    = $_POST['Nombre'];
                $this->DireccionL    = $_POST['Direccion'];
                $this->TelefonoL    = $_POST['Telefono'];
                $this->EstadoL   =  $_POST['Estado'];

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