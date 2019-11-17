<?php

    class Sound extends CI_Controller{

        function __construct(){

            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('mod_sound');

             

        }

        function add(){

            $this->load->view('add_sound');

             

        }

        function isound(){

 

            $this->form_validation->set_rules('judul','Judul','required');

            $this->form_validation->set_rules('keterangan','Keterangan','required');

 

            if($this->form_validation->run()== FALSE){

                $this->add();

            }else{

                $nm_sound = $this->mod_sound->do_upload('sound');

                $this->mod_sound->isound($nm_sound);

                redirect('sound/tampil_sound');

            }

 

        }

        function tampil_sound(){

            $data['sounds']=$this->mod_sound->get_sound();

            $this->load->view('sound',$data);

        }

 

    }

?>
