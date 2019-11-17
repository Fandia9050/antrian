<?php
    class M_dataantrian extends CI_Model {
    
        public function getAll()
        {
                $query = $this->db->get('kecamatan');
                return $query->result();
        }

        public function insert($data){
            $this->db->insert('ta_loket', $data);
        }

         public function simpanAntrian($data){
            $this->db->insert('ta_antrian', $data);
        }

        public function getkecamatan($loket){
            $this->db->select('ta_loket.id_kecamatan, kecamatan.nama_kecamatan')
            ->from('ta_loket')
            ->where('id_loket', $loket)
            ->join('kecamatan', 'kecamatan.id=ta_loket.id_kecamatan');
            $query = $this->db->get();
            return $query->result();
        }

        public function getAntrian($loket){
            $model = $this->db->select('MAX(no_antrian) as no_antrian')->where('id_loket', $loket)->get('ta_antrian');
            return ($model) ? $model->row() : null;
        }

    }
?>