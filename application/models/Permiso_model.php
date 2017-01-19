<?php
class Permiso_model extends CI_Model {

        // public $IdPaciente;
        public $NombreP;




        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
        public function get_permisos()
         {

                $this->db->select('*');
                $this->db->from('permisos');

                $query = $this->db->get();
                return $query->result();
         }

}