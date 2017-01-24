<?php
class Cirugia_model extends CI_Model {

        // public $IdTipoCita;
        public $NombreC;
        public $PrecioC;
        public $PorcentajeC;
        public $DescripcionC;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_cirugias($inicio=FALSE,$limite=FALSE)
        {

                $this->db->select('*');
                $this->db->from('cirugia');

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }
                // $this->db->limit(10);
                // $query = $this->db->get();

                $query = $this->db->get();
                return $query->result();
        }
         public function post_cirugias()
        {
              
                $this->NombreC    = $_POST['NombreC'];
                $this->PrecioC       = $_POST['PrecioC'];
                $this->PorcentajeC    = $_POST['PorcentajeC'];
                $this->DescripcionC    = $_POST['DescripcionC'];

                $this->db->insert('cirugia', $this);
        }

        public function get_cirugia($IdCirugia){

                $this->db->select('*');
                $this->db->from('cirugia');
                $this->db->where('IdCirugia',$IdCirugia);
                $query = $this->db->get();
                return $query->result();     

        }

        public function update_cirugia($IdCirugia)
        {

                $this->NombreC    = $_POST['NombreC']; 
                $this->PrecioC    = $_POST['PrecioC']; 
                $this->PorcentajeC    = $_POST['PorcentajeC']; 
                $this->DescripcionC   = $_POST['DescripcionC']; 



                $this->db->update('cirugia', $this, array('IdCirugia' => $IdCirugia));
        }

        public function get_buscar_cirugia($inicio=FALSE,$limite=FALSE){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*');
                $this->db->from('cirugia');
                $this->db->like(  $tipo_dato,$dato_buscar);
                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get();
                return $query->result();   
        }

        public function get_eliminar_cirugia($id){
   
                $query = $this->db->delete("cirugia", array('IdCirugia'=>$id));
                 return $query; 
        }

        public function get_cirugiaajax($id){
                $this->db->select('*');
                $this->db->from('cirugia');
                $this->db->where('IdCita',$id);
                
                $query = $this->db->get('');
                return $query->result();
        }

    

}