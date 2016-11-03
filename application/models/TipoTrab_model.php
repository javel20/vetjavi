<?php
class TipoTrab_model extends CI_Model {

        public $IdTipoTrab;
        public $Nombre;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_tipotrabs()
        {
                $query = $this->db->get('tipotrab');
                return $query->result();
        }
         public function post_tipotrabs()
        {
              
                $this->Nombre   = $_POST['Nombre'];

                $this->db->insert('tipotrab', $this);
        }

        public function get_tipotrab($IdTipoTrab){
                
                $this->db->select('*');
                $this->db->from('tipotrab');
                $this->db->where('IdTipoTrab',$IdTipoTrab);
                $query = $this->db->get();
                return $query->result();     

        }

        public function update_tipotrab($IdTipoTrab)
        {

                $this->Nombre    = $_POST['Nombre']; 



                $this->db->update('tipotrab', $this, array('IdTipoTrab' => $IdTipoTrab));
        }

        public function get_buscar_tipotrab(){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*');
                $this->db->from('tipotrab');
                $this->db->like(  $tipo_dato,$dato_buscar);
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_tipotrab($id){
   
                $query = $this->db->delete("tipotrab", array('IdTipoTrab'=>$id));
                 return $query; 
        }

    

}