<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

        // function __construct()
        // {

        //     parent::__construct();

        // }

        function index()
        {


          $this->load->helper(array('form'));
          $this->load->view('trabajador/login');
        }

        function acceso()
        {

            $this->load->model('Trabajador_model');
            // $this->load->model('StockPresen_model');
            $correo = $_POST["correo"];
            $password = $_POST["pass"];

            // die($correo . "-" . $password);

           $asig = $this->Trabajador_model->login($correo,$password);
            // die(json_encode($notif));
            if($asig != false) 
            {
                
            // $notif = $this->StockPresen_model->get_notificacion();
                $log = array('IdTrabajador' => $asig[0]->IdTrabajador, 
                                'Email'=> $asig[0]->Email, 
                                'Password' => $asig[0]->Password,
                                'Permisos'=>$asig[0]->permisos);

                $this->session->set_userdata($log);
                // $this->session->set_userdata($notif);
                redirect('login/dashboard');
               
            }else{

                $this->session->set_flashdata('error','Datos incorrectos');
                $this->session->set_flashdata('email',$_POST["correo"]);
                redirect('login','refresh');
                
            }

            
            


        }

        function dashboard()
        {

            if(isset($_SESSION['Email'])) //si existe la variable
            $this->load->model('StockPresen_model');
            $notif = $this->StockPresen_model->get_notificacion();
            $this->session->set_userdata( 'StockMin',$notif);
            $notif2 = $this->StockPresen_model->get_notificacion_fechaven();
            $this->session->set_userdata( 'FechaVen',$notif2);
            // die(json_encode($_SESSION['FechaVen']));
            // die($notif2);
            $this->load->view('dashboard');


            
        }

        function logout()
        {

            $data = array ('IdTrabajador' => '','Email' => '','Password' => '');
            $this->session->unset_userdata($data);
            $this->session->sess_destroy();
            redirect('login'); 

        }



}