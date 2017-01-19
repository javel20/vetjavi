<?php
class Reporte_model extends CI_Model {


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_reporte($fecha, $inicio=FALSE,$limite=FALSE)
        {

            if($fecha=="")
            {
                $fecha_php = date('y-d-m');
                // echo $fecha_php;

                
                
                $sql= ('select Descripcion, venta.CodV as codigo, venta.Fecha as fecharealizada,venta.PrecioTotalVenta as precio , venta.Estado as estado from venta
                                            where venta.Fecha="'.strval(trim($fecha_php)).'"
                                            UNION
                                            select Descripcion, cita.CodigoC as codigo, cita.FechaRegistro as fecharealizada,cita.PrecioTotal as precio, cita.Estado as estado from cita
                                            where FechaRegistro like
                                             "'.strval(trim($fecha_php)).'%"
                                            ');

                $query = $this->db->query($sql);


                return $query->result();


            }
            else{
                
                $array = explode('/', $fecha);
                $fecha_php =  $array[2] ."-". $array[0] ."-". $array[1];
              //  die($fecha_php);
              
                $query = $this->db->query('(select Descripcion, venta.CodV as codigo, venta.Fecha as fecharealizada,venta.PrecioTotalVenta as precio , venta.Estado as estado from venta
                                            where venta.Fecha="'.strval(trim($fecha_php)).'")
                                            UNION
                                            (select Descripcion, cita.CodigoC as codigo, cita.FechaRegistro as fecharealizada,cita.PrecioTotal as precio, cita.Estado as estado from cita
                                            where FechaRegistro like
                                             "'.strval(trim($fecha_php)).'%")
                                            ');


                return $query->result();


        }
        }
}