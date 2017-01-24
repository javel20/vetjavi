<?php
class Cita_model extends CI_Model {


        // public $IdCita;
        public $FechaReserva;
        public $HoraC;
        // public $FechaRegistro;
        public $CodigoC;
        public $Peso;
        public $FrecuenciaCardiaca;
        public $FrecuenciaRespiratoria;
        public $PrecioTotal;
        public $Descripcion;
        public $IdPaciente;
        public $IdTipoCita;
        public $Estado;
        public $IdCirugia;
        public $IdAnalisis;




        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_citas($inicio=FALSE,$limite=FALSE)
        {

                $this->db->select('*, Cita.IdAnalisis as analisis, tipocita.NombreTC  as NombreTipoCita, paciente.Nombre as NombrePaciente, cita.descripcion as descita');
                $this->db->from('Cita');
                $this->db->join('paciente', 'paciente.IdPaciente = cita.IdPaciente');

                $this->db->join('tipocita', 'tipocita.IdTipoCita = cita.IdTipoCita','left');
                $this->db->join('cirugia', 'cirugia.IdCirugia = cita.IdCirugia','left');
                $this->db->join('analisis', 'analisis.IdAnalisis = cita.IdCirugia','left');

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }
                // $this->db->limit(10);
                $query = $this->db->get();

                // die(var_dump($query->result()));
                return $query->result();
                

        }
         public function post_citas()
        {

                $this->CodigoC = $_POST['CodigoC'];
                
                $fechar = $_POST['FechaReserva'];
                $array = explode('/', $fechar);
                $fecha_php =  $array[2] ."-". $array[0] ."-". $array[1];
                // die($fecha_php);
                // $date=date('Y-m-d H:i:s', strtotime($fecha_php));

                $this->FechaReserva    =  strval(trim($fecha_php));
                $this->HoraC = $_POST['HoraC'];
                $this->Peso    = $_POST['Peso'];
                $this->FrecuenciaCardiaca    = $_POST['FrecuenciaCardiaca'];
                $this->FrecuenciaRespiratoria    = $_POST['FrecuenciaRespiratoria'];
                $this->PrecioTotal    = $_POST['PrecioTotal'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->IdPaciente    = $_POST['listPaciente'];
                $this->Estado    = true;
                

                if($_POST['listTipo']=="cirugia"){

                        $this->IdCirugia    = $_POST['listCirugia'];  

                }else if($_POST['listTipo']=="analisis"){

                        $this->IdAnalisis    = $_POST['listAnalisis'];

                }else{
                        $this->IdTipoCita    = $_POST['listTipo'];
                }

               
               

                if(($_POST['listCirugia']=="--seleccionar--")&&($_POST['listAnalisis']=="--seleccionar--")){
                        $this->IdCirugia =  NULL;
                        $this->IdAnalisis=NULL;
                               
                }
                
                if($_POST['listAnalisis']=="--seleccionar--"){
                        $this->IdAnalisis=NULL;
                        
                }
                                
                if($_POST['listCirugia']=="--seleccionar--"){
                        $this->IdCirugia =  NULL;
                        
                }


                // die(json_encode($this));
               $this->db->insert('cita', $this);
        }

        public function get_cita($IdCita){

                $this->db->select('*');
                $this->db->from('cita');
                $this->db->where('IdCita',$IdCita);   
                $query = $this->db->get();

                $fecha = $query->result()[0]->FechaReserva;
                 $pos = preg_match('/[-]+/',$fecha);
                if($pos == true){
                        $array = explode('-', $fecha);
                        $fecha_php =  $array[2] ."/". $array[1] ."/". $array[0];

                } else{
                       $fecha_php = $fecha; 
                }

                $query->result()[0]->FechaReserva= $fecha_php;
                // die(var_dump($query->result()));

                return $query->result();     
               

        }

       

        public function update_cita($IdCita)
        {
                $fechar = $_POST['FechaReserva'];
                $pos = preg_match('/[\/]+/',$fechar);
                if($pos == true){
                        $array = explode('/', $fechar);
                        $fecha_php =  $array[2] ."-". $array[0] ."-". $array[1];

                } else{
                       $fecha_php = $fechar; 
                }
                // die($fecha_php);
                // $date=date('Y-m-d H:i:s', strtotime($fecha_php));

                $this->CodigoC = $_POST['CodigoC'];
                $this->HoraC = $_POST['HoraC'];
                $this->FechaReserva    =  strval(trim($fecha_php));
                $this->Peso    = $_POST['Peso'];
                $this->FrecuenciaCardiaca    = $_POST['FrecuenciaCardiaca'];
                $this->FrecuenciaRespiratoria    = $_POST['FrecuenciaRespiratoria'];
                $this->PrecioTotal    = $_POST['PrecioTotal'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->IdPaciente    = $_POST['listPaciente'];
                $this->IdTipoCita    = $_POST['listTipo'];
                $this->Estado    = true;

                if($_POST['listTipo']=="cirugia"){

                        $this->IdCirugia    = $_POST['listCirugia'];  

                }else if($_POST['listTipo']=="analisis"){

                        $this->IdAnalisis    = $_POST['listAnalisis'];

                }else{
                        $this->IdTipoCita    = $_POST['listTipo'];
                }

               

                if(($_POST['listCirugia']=="--seleccionar--")&&($_POST['listAnalisis']=="--seleccionar--")){
                        $this->IdCirugia =  NULL;
                        $this->IdAnalisis=NULL;
                               
                }
                
                if($_POST['listAnalisis']=="--seleccionar--"){
                        $this->IdAnalisis=NULL;
                        
                }
                                
                if($_POST['listCirugia']=="--seleccionar--"){
                        $this->IdCirugia =  NULL;
                        
                }
         

                // die(var_dump($this));
                $this->db->update('cita', $this, array('IdCita' => $IdCita));
        }

        public function get_buscar_cita(){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*, tipocita.NombreTC  as NombreTipoCita, paciente.Nombre as NombrePaciente, cita.descripcion as descita');
                $this->db->from('cita');
                $this->db->join('tipocita', 'tipocita.IdTipoCita = cita.IdTipoCita');
                $this->db->join('paciente', 'paciente.IdPaciente = cita.IdPaciente');
                $this->db->like("cita.".$tipo_dato,$dato_buscar);   
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_cita($id){
   
                $query = $this->db->delete("cita", array('IdCita'=>$id));
                 return $query; 
        }



}