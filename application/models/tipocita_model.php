<?php
class TipoCita_model extends CI_Model {

        // public $IdTipoCita;
        public $NombreTC;
        public $PrecioTC;
        public $PorcentajeTC;
        public $DescripcionTC;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_tipocitas($inicio=FALSE,$limite=FALSE)
        {

                $this->db->select('*');
                $this->db->from('tipocita');

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get();
                return $query->result();
        }
         public function post_tipocitas()
        {
              
                $this->NombreTC    = $_POST['Nombre'];
                $this->PrecioTC    = $_POST['Precio'];
                $this->PorcentajeTC    = $_POST['Porcentaje'];
                $this->DescripcionTC    = $_POST['Descripcion'];

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

                $this->NombreTC    = $_POST['Nombre']; 
                $this->PrecioTC    = $_POST['Precio'];
                $this->PorcentajeTC    = $_POST['Porcentaje']; 
                $this->DescripcionTC    = $_POST['Descripcion']; 



                $this->db->update('tipocita', $this, array('IdTipoCita' => $IdTipoCita));
        }

        public function get_buscar_tipocita($inicio=FALSE,$limite=FALSE){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*');
                $this->db->from('tipocita');
                $this->db->like(  $tipo_dato,$dato_buscar);
                
                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_tipocita($id){
   
                $query = $this->db->delete("tipocita", array('IdTipoCita'=>$id));
                 return $query; 
        }

    

}