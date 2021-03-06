<?php
class Analisis_model extends CI_Model {

        // public $IdPaciente;
        public $Codigo;
        public $NombreA;
        public $Descripcion;
        public $PrecioAnalisis;
        public $PorcentajeA;




        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
        public function get_analisiss($inicio=FALSE,$limite=FALSE)
         {


                $this->db->select('*');
                $this->db->from('Analisis');

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }
                // $this->db->limit(10);
                $query = $this->db->get();
                // die(json_encode($query->result()));
                return $query->result();
         }
         public function post_analisiss()
        {
                $this->Codigo    = $_POST['Codigo'];
                $this->NombreA    = $_POST['NombreA'];

                $this->Descripcion    = $_POST['Descripcion'];
                $this->PrecioAnalisis    = $_POST['PrecioAnalisis'];
                $this->PorcentajeA    = $_POST['PorcentajeA'];

                
                 

                $this->db->insert('analisis', $this);
        }

        public function get_analisis($IdAnalisis){
                // $query = $this->db->get('NombreAtrab');
                // $queryNombreAs = $this->db->query('select * from NombreAtrab');
                        // 
                // die(var_dump($queryNombreAs->result()));
                $this->db->select('*');
                $this->db->from('analisis');
                $this->db->where('IdAnalisis',$IdAnalisis);   
                $query = $this->db->get();

                return $query->result();     

        }

       

        public function update_analisis($IdAnalisis)
        {
                $this->Codigo    = $_POST['Codigo'];
                $this->NombreA    = $_POST['NombreA'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->PrecioAnalisis    = $_POST['PrecioAnalisis'];
                $this->PorcentajeA    = $_POST['PorcentajeA'];


                $this->db->update('analisis', $this, array('IdAnalisis' => $IdAnalisis));
        }

        public function get_buscar_analisis($inicio=FALSE,$limite=FALSE){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $Tipo = $_GET['tipo_dato'];
                $this->db->select('*');
                $this->db->from('analisis');
                $this->db->like(  $tipo_dato,$dato_buscar);   

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_analisis($id){
   
                $query = $this->db->delete("analisis", array('IdAnalisis'=>$id));
                 return $query; 
        }

        public function getAnalisis($codigo){
                $this->db->select('*');
                $this->db->from('analisis');
                $this->db->where('Codigo',$codigo);
                $query = $this->db->get();
                // die(json_encode($query->result()));
                return $query->result();
        }


}