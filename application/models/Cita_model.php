<?php
class Cita_model extends CI_Model {


        // public $IdCita;
        public $FechaReserva;
        // public $FechaRegistro;
        public $Talla;
        public $Peso;
        public $FrecuenciaCardiaca;
        public $FrecuenciaRespiratoria;
        public $IdPaciente;
        public $IdTipoCita;
        public $Estado;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_citas()
        {

                $this->db->select('*, tipocita.Nombre  as NombreTipoCita, paciente.Nombre as NombrePaciente');
                $this->db->from('Cita');
                $this->db->join('tipocita', 'tipocita.IdTipoCita = cita.IdTipoCita');
                $this->db->join('paciente', 'paciente.IdPaciente = cita.IdPaciente');
                $query = $this->db->get();
                // die(var_dump($query->result()));
                return $query->result();
                

        }
         public function post_citas()
        {
        
                $fechar = $_POST['FechaReserva'];
                $array = explode('/', $fechar);
                $fecha_php =  $array[2] ."-". $array[1] ."-". $array[0];
                // die($fecha_php);
                // $date=date('Y-m-d H:i:s', strtotime($fecha_php));

                $this->FechaReserva    =  strval(trim($fecha_php));
                $this->Talla    = $_POST['Talla'];
                $this->Peso    = $_POST['Peso'];
                $this->FrecuenciaCardiaca    = $_POST['FrecuenciaCardiaca'];
                $this->FrecuenciaRespiratoria    = $_POST['FrecuenciaRespiratoria'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->IdPaciente    = $_POST['listPaciente'];
                $this->IdTipoCita    = $_POST['listTipo'];
                $this->Estado    = true;

              

                // die(var_dump($this));
                 $this->db->insert('cita', $this);
        }

        public function get_cita($IdCita){

                $this->db->select('*');
                $this->db->from('cita');
                $this->db->where('IdCita',$IdCita);   
                $query = $this->db->get();
                return $query->result();     

        }

       

        public function update_cita($IdCita)
        {
                $fechar = $_POST['FechaReserva'];
                $pos = strpos($fechar, '/');
                if($pos === true){
                        $array = explode('/', $fechar);
                        $fecha_php =  $array[2] ."-". $array[1] ."-". $array[0];

                } else{
                       $fecha_php = $fechar; 
                }
                // die($fecha_php);
                // $date=date('Y-m-d H:i:s', strtotime($fecha_php));

                
                $this->Talla    = $_POST['Talla'];
                $this->FechaReserva    =  strval(trim($fecha_php));
                $this->Peso    = $_POST['Peso'];
                $this->FrecuenciaCardiaca    = $_POST['FrecuenciaCardiaca'];
                $this->FrecuenciaRespiratoria    = $_POST['FrecuenciaRespiratoria'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->IdPaciente    = $_POST['listPaciente'];
                $this->IdTipoCita    = $_POST['listTipo'];
                 $this->Estado    = true;

               // die(var_dump($this));
                $this->db->update('cita', $this, array('IdCita' => $IdCita));
        }

        public function get_buscar_cita(){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*');
                $this->db->from('cita');
                $this->db->like($tipo_dato,$dato_buscar);   
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_cita($id){
   
                $query = $this->db->delete("cita", array('IdCita'=>$id));
                 return $query; 
        }



}