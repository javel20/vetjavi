<?php
class Analisis_model extends CI_Model {

        // public $IdPaciente;
        public $Codigo;
        public $Tipo;
        public $Descripcion;
        public $IdPaciente;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
        public function get_analisiss()
         {

                $this->db->select('*,paciente.Nombre, paciente.Nombre as NombrePaciente, analisis.descripcion as Descpa');
                $this->db->from('analisis');
                $this->db->join('paciente', 'paciente.IdPaciente = analisis.IdPaciente');
                $query = $this->db->get();
                // die(json_encode($query->result()));
                return $query->result();
         }
         public function post_analisiss()
        {
                $this->Codigo    = $_POST['Codigo'];
                $this->Tipo    = $_POST['Tipo'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->IdPaciente    = $_POST['SelectPaciente'];
                
                 

                $this->db->insert('analisis', $this);
        }

        public function get_analisis($IdAnalisis){
                // $query = $this->db->get('tipotrab');
                // $querytipos = $this->db->query('select * from tipotrab');
                        // 
                // die(var_dump($querytipos->result()));
                $this->db->select('*');
                $this->db->from('analisis');
                $this->db->where('IdAnalisis',$IdAnalisis);   
                $query = $this->db->get();
                return $query->result();     

        }

       

        public function update_analisis($IdAnalisis)
        {
                $this->Codigo    = $_POST['Codigo'];
                $this->Tipo    = $_POST['Tipo'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->IdPaciente = $_POST['SelecPaciente'];

                $this->db->update('analisis', $this, array('IdAnalisis' => $IdAnalisis));
        }

        public function get_buscar_analisis(){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*, paciente.Nombre as NombrePaciente, paciente.descripcion as Descpa');
                $this->db->from('analisis');
                $this->db->join('paciente', 'analisis.IdPaciente = paciente.IdPaciente');
                $this->db->like(  $tipo_dato,$dato_buscar);   
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_analisis($id){
   
                $query = $this->db->delete("analisis", array('IdAnalisis'=>$id));
                 return $query; 
        }


}