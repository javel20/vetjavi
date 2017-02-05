<?php
class Diagnostico_model extends CI_Model {

        // public $IdPaciente; 
        public $CodigoD;
        public $Descripcion;
        public $IdCita;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
        public function get_diagnosticos($inicio=FALSE,$limite=FALSE)
         {

                $this->db->select('*,  cita.Descripcion as Descci, diagnostico.Descripcion as descdi');
                $this->db->from('diagnostico');
                $this->db->join('cita', 'cita.IdCita = diagnostico.IdCita');

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                // die(json_encode($query->result()));
                $query = $this->db->get();
                return $query->result();
         }
         public function post_diagnosticos()
        {
                $this->CodigoD      =   $_POST['CodigoD'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->IdCita    =      $_POST['SelectCita'];
                
                 

                $this->db->insert('diagnostico', $this);
        }

        public function get_diagnostico($IdDiagnostico){
                // $query = $this->db->get('tipotrab');
                // $querytipos = $this->db->query('select * from tipotrab');
                        // 
                // die(var_dump($querytipos->result()));
                $this->db->select('*');
                $this->db->from('diagnostico');
                $this->db->where('IdDiagnostico',$IdDiagnostico);   
                $query = $this->db->get();

                
                return $query->result();     

        }

       

        public function update_diagnostico($IdDiagnostico)
        {

                $this->CodigoD =$_POST['CodigoD'];
                $this->Descripcion    = $_POST['descdi'];

                $this->IdCita = $_POST['SelecCita'];

                $this->db->update('diagnostico', $this, array('IdDiagnostico' => $IdDiagnostico));
        }

        public function get_buscar_diagnostico(){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*, cita.Descripcion as Descci, diagnostico.Descripcion as descdi');
                $this->db->from('diagnostico');
                $this->db->join('cita',  'cita.IdCita = diagnostico.IdCita');
                $this->db->like(  $tipo_dato,$dato_buscar);   
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_diagnostico($id){
   
                $query = $this->db->delete("diagnostico", array('IdDiagnostico'=>$id));
                 return $query; 
        }


}