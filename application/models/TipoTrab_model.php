<?php
class TipoTrab_model extends CI_Model {

        // public $IdTipoTrab;
        public $NombreTP;
        public $DescripcionTP;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_tipotrabs($inicio=FALSE,$limite=FALSE)
        {
                $this->db->select('*');
                $this->db->from('tipotrab');

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get();
                return $query->result();
        }
         public function post_tipotrabs()
        {
              
                $this->NombreTP   = $_POST['Nombre'];
                $this->DescripcionTP   = $_POST['Descripcion'];

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

                $this->NombreTP    = $_POST['Nombre']; 
                $this->DescripcionTP   = $_POST['Descripcion'];


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