<?php
    class M_auth extends CI_Model {
    

        public function masuk($table,$username){
            return $this->db->get_where($table,$username);
        }

        public function daftar($data){
            $this->db->insert('user', $data);
        }

        public function logout($id){
            unset($_SESSION['username']);
        }

       
    }
?>