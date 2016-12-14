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
            $correo = $_POST["correo"];
            $password = $_POST["pass"];
            // die($correo . "-" . $password);

            $asig = $this->Trabajador_model->login($correo,$password);
            // die(json_encode($asig));
            if($asig != false) 
            {
                
                $log = array('IdTrabajador' => $asig[0]->IdTrabajador, 'Email'=> $asig[0]->Email, 'Password' => $asig[0]->Password);
                $this->session->set_userdata($log);
                redirect('login/dashboard');
               
            }

            
            


        }

        function dashboard()
        {

            if(isset($_SESSION['Email'])) //si existe la variable
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