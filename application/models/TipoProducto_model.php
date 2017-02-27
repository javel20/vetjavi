<?php
class TipoProducto_model extends CI_Model {

        // public $IdLocal;
        public $NombreTipoP;
        // public $Porcentaje;
        public $Descripcion;


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_tipoproductos($inicio=FALSE,$limite=FALSE)
        {
                $this->db->select('*');
                $this->db->from('tipoproducto');

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get();
                return $query->result();
        }
         public function post_tipoproductos()
        {
                $this->NombreTipoP    = $_POST['NombreTipoP'];
                // $this->Porcentaje    = $_POST['Porcentaje'];
                $this->Descripcion    = $_POST['Descripcion'];
                 

                $this->db->insert('tipoproducto', $this);
        }

        public function get_tipoproducto($IdTipoProducto){

                $this->db->select('*'); 
                $this->db->from('tipoproducto');
                $this->db->where('IdTipoProducto',$IdTipoProducto);   
                $query = $this->db->get();
                return $query->result();     

        }

       

        public function update_tipoproducto($IdTipoProducto)
        {
                $this->NombreTipoP    = $_POST['NombreTipoP'];
                // $this->Porcentaje    = $_POST['Porcentaje'];
                $this->Descripcion    = $_POST['Descripcion'];
                
                $this->db->update('tipoproducto', $this, array('IdTipoProducto' => $IdTipoProducto));
        }

        public function get_buscar_tipoproducto($inicio=FALSE,$limite=FALSE){
                $dato_buscar = $_GET['nombre_buscar'];
                 $tipo_dato = $_GET['tipo_dato'];
                 $this->db->select('*');
                $this->db->from('tipoproducto');
                $this->db->like("tipoproducto.".$tipo_dato,$dato_buscar);   

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_tipoproducto($id){
   
                $query = $this->db->delete("tipoproducto", array('IdTipoProducto'=>$id));
                 return $query; 
        }



}