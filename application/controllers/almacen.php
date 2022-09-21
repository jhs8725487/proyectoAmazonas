
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Almacen extends CI_Controller {


    public function testAdmin()
    {
        if($this->session->userdata('Rol')=='Administrador'){
            //$data2['msg'] = $this->uri->segment(3);
            //$data['infoUsuarios'] = $this->usuario_model->lista();
           /* $data  = array(
                'infoUsuarios' => $this->usuario_model->lista(), 
            );*/
            $this->load->view('layout/head');
            $this->load->view('layout/menu-sidenav');
            $this->load->view('layout/menu-topnav');
            //$this->load->view('usuarios/usuarios_view', $data);
            $this->load->view('layout/footer');
        }else{
            //$data2['msg'] = $this->uri->segment(3);
            //$data['infoUsuarios'] = $this->usuario_model->lista();
           /* $data  = array(
                'infoUsuarios' => $this->usuario_model->lista(), 
                'roles' => $this->usuario_model->getRoles(),
            );*/
            $this->load->view('layout/head');
            $this->load->view('layout/menu-sidenav');
            $this->load->view('layout/menu-topnav');
           // $this->load->view('usuarios/usuarios_view', $data);
            $this->load->view('layout/footer');
        }
    }

       
}