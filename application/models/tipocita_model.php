<?php
class TipoCita_model extends CI_Model {

        public $IdTipoCita;
        public $Nombre;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_tipocitas()
        {
                $query = $this->db->get('tipocita');
                return $query->result();
        }
         public function post_tipocitas()
        {
              
                $this->Nombre    = $_POST['Nombre'];

                $this->db->insert('tipocita', $this);
        }

        public function get_tipocita($IdTipoCita){

                $this->db->select('*');
                $this->db->from('tipocita');
                $this->db->where('IdTipoCita',$IdTipoCita);
                $query = $this->db->get();
                return $query->result();     

        }

        public function update_tipocita($IdTipoCita)
        {

                $this->Nombre    = $_POST['Nombre']; 



                $this->db->update('tipocita', $this, array('IdTipoCita' => $IdTipoCita));
        }

        public function get_buscar_tipocita(){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*');
                $this->db->from('tipocita');
                $this->db->like(  $tipo_dato,$dato_buscar);
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_tipocita($id){
   
                $query = $this->db->delete("tipocita", array('IdTipoCita'=>$id));
                 return $query; 
        }

    

}