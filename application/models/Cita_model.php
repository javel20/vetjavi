<?php
class Cita_model extends CI_Model {


        // public $IdCita;
        public $FechaReserva;
        public $HoraC;
        // public $FechaRegistro;
        public $CodigoC;
        public $Peso;
        public $TemperaturaC;
        public $FrecuenciaCardiaca;
        public $FrecuenciaRespiratoria;
        public $Ganancia;
        public $PrecioTotal;
        public $Descripcion;
        public $IdPaciente;
        public $IdTipoCita;
        public $EstadoC;
        public $IdCirugia;
        public $IdAnalisis;




        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_citas($inicio=FALSE,$limite=FALSE)
        {

                $this->db->select('*, cita.IdAnalisis as analisis, tipocita.NombreTC  as NombreTipoCita, paciente.Nombre as NombrePaciente, cita.descripcion as descita');
                $this->db->from('cita');
                $this->db->join('paciente', 'paciente.IdPaciente = cita.IdPaciente');
                $this->db->join('cliente','cliente.IdCliente = paciente.IdCliente');
                $this->db->join('tipocita', 'tipocita.IdTipoCita = cita.IdTipoCita','left');
                $this->db->join('cirugia', 'cirugia.IdCirugia = cita.IdCirugia','left');
                $this->db->join('analisis', 'analisis.IdAnalisis = cita.IdAnalisis','left');

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
                $fecha_php =  $array[2] ."-". $array[1] ."-". $array[0];
                // die($fecha_php);
                // $date=date('Y-m-d H:i:s', strtotime($fecha_php));
                
                $this->FechaReserva    =  strval(trim($fecha_php));

                $fecha=strftime( "%Y-%m-%d %H:%M:%S", time() );
                $this->FechaRegistro    =  $fecha;

                // die($fecha);

                $this->HoraC = $_POST['HoraC'];
                $this->Peso    = $_POST['Peso'];
                $this->TemperaturaC    = $_POST['TemperaturaC'];
                $this->FrecuenciaCardiaca    = $_POST['FrecuenciaCardiaca'];
                $this->FrecuenciaRespiratoria    = $_POST['FrecuenciaRespiratoria'];
                $this->Ganancia    = $_POST['Ganancia'];
                $this->PrecioTotal    = $_POST['PrecioTotal'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->IdPaciente    = $_POST['listPaciente'];
                $this->EstadoC    = "En espera";
                

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
                        $fecha_php =  $array[2] ."-". $array[1] ."-". $array[0];

                } else{
                       $fecha_php = $fechar; 
                }
                // die($fecha_php);
                // $date=date('Y-m-d H:i:s', strtotime($fecha_php));

                $this->CodigoC = $_POST['CodigoC'];
                $this->HoraC = $_POST['HoraC'];
                $this->FechaReserva    =  strval(trim($fecha_php));
                $this->Peso    = $_POST['Peso'];
                $this->TemperaturaC    = $_POST['TemperaturaC'];
                $this->FrecuenciaCardiaca    = $_POST['FrecuenciaCardiaca'];
                $this->FrecuenciaRespiratoria    = $_POST['FrecuenciaRespiratoria'];
                $this->Ganancia    = $_POST['Ganancia'];
                $this->PrecioTotal    = $_POST['PrecioTotal'];
                $this->Descripcion    = $_POST['Descripcion'];
                $this->IdPaciente    = $_POST['listPaciente'];
                $this->IdTipoCita    = $_POST['listTipo'];
                $this->EstadoC    = $_POST['EstadoC'];

                if($_POST['listTipo']=="cirugia"){

                        $this->IdCirugia    = $_POST['listCirugia'];  
                        $this->IdTipoCita    = NULL;

                }else if($_POST['listTipo']=="analisis"){

                        $this->IdAnalisis    = $_POST['listAnalisis'];
                        $this->IdTipoCita    = NULL;

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

        public function get_buscar_cita($inicio=FALSE,$limite=FALSE){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                 //die($dato_buscar . " . " . $tipo_dato);
                 $this->db->select('*, cita.IdAnalisis as analisis, tipocita.NombreTC  as NombreTipoCita, paciente.Nombre as NombrePaciente, cita.descripcion as descita');
                $this->db->from('cita');
                $this->db->join('paciente', 'paciente.IdPaciente = cita.IdPaciente');
                $this->db->join('cliente','cliente.IdCliente = paciente.IdCliente');
                $this->db->join('tipocita', 'tipocita.IdTipoCita = cita.IdTipoCita','left');
                $this->db->join('cirugia', 'cirugia.IdCirugia = cita.IdCirugia','left');
                $this->db->join('analisis', 'analisis.IdAnalisis = cita.IdCirugia','left');
                $this->db->like("cita.".$tipo_dato,  $dato_buscar);
                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                $query = $this->db->get();
               // die(json_encode($query->result()));
                return $query->result();     
        }

        public function get_eliminar_cita($id){
   
                $query = $this->db->delete("cita", array('IdCita'=>$id));
                 return $query; 
        }

        public function getCita($codigo){
                $this->db->select('*');
                $this->db->from('cita');
                $this->db->where('CodigoC',$codigo);
                $query = $this->db->get();
                // die(json_encode($query->result()));
                return $query->result();
        }





}