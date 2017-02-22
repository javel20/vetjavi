<?php
class Salida_model extends CI_Model {

        // public $IdPaciente; 

        public $NombreS;
        public $FechaS;
        public $PrecioS;
        public $DescripcionS;
        public $IdCita;



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
        public function get_salidas($inicio=FALSE,$limite=FALSE)
         {

                $this->db->select('*');
                $this->db->from('salida');
                $this->db->join('cita', 'salida.IdCita = cita.IdCita');

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }

                // die(json_encode($query->result()));
                $query = $this->db->get();
                return $query->result();
         }
         public function post_salidas()
        {

                $this->NombreS      =   $_POST['NombreS'];
                 $fechar = $_POST['FechaS'];
                $array = explode('/', $fechar);
                $fecha_php =  $array[2] ."-". $array[0] ."-". $array[1];


                $this->FechaS = strval(trim($fecha_php));
                $this->PrecioS      =   $_POST['PrecioS'];
                $this->DescripcionS    = $_POST['DescripcionS'];
                $this->IdCita    =      $_POST['SelectCita'];
                
                 

                $this->db->insert('salida', $this);
        }

        public function get_salida($IdSalida){
                // $query = $this->db->get('tipotrab');
                // $querytipos = $this->db->query('select * from tipotrab');
                        // 
                // die(var_dump($querytipos->result()));
                $this->db->select('*');
                $this->db->from('salida');
                $this->db->where('IdSalida',$IdSalida);   
                $query = $this->db->get();

                $fecha = $query->result()[0]->FechaS;
                 $pos = preg_match('/[-]+/',$fecha);
                if($pos == true){
                        $array = explode('-', $fecha);
                        $fecha_php =  $array[2] ."/". $array[1] ."/". $array[0];

                } else{
                       $fecha_php = $fecha; 
                }

                $query->result()[0]->FechaS= $fecha_php;
                
                return $query->result();     

        }

       

        public function update_salida($IdSalida)
        {

                $this->NombreS      =   $_POST['NombreS'];
                $fechar = $_POST['FechaS'];
                $pos = preg_match('/[\/]+/',$fechar);
                if($pos == true){
                        $array = explode('/', $fechar);
                        $fecha_php =  $array[2] ."-". $array[0] ."-". $array[1];

                } else{
                       $fecha_php = $fechar; 
                }

                $this->FechaS = strval(trim($fecha_php));
                $this->PrecioS      =   $_POST['PrecioS'];
                $this->DescripcionS    = $_POST['DescripcionS'];

                $this->IdCita = $_POST['SelectCita'];

                $this->db->update('salida', $this, array('IdSalida' => $IdSalida));
        }

        public function get_buscar_salida($inicio=FALSE,$limite=FALSE){
                $dato_buscar = $_GET['nombre_buscar'];
                $tipo_dato = $_GET['tipo_dato'];
                $this->db->select('*, cita.Descripcion as Descci');
                $this->db->from('salida');
                $this->db->join('cita',  'cita.IdCita = salida.IdCita');
                $this->db->like(  $tipo_dato,$dato_buscar);  

                if($inicio!==FALSE && $limite!==FALSE){
                        $this->db->limit($limite,$inicio);
                }
                 
                $query = $this->db->get();
                return $query->result();     
        }

        public function get_eliminar_salida($id){
   
                $query = $this->db->delete("salida", array('IdSalida'=>$id));
                 return $query; 
        }


}