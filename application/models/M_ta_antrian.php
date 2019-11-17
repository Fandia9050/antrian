<?php
    class M_ta_antrian extends CI_Model {
    
        public function getAll()
        {
                
            $this->db->select('ta_antrian.id, ta_antrian.no_antrian, kecamatan.nama_kecamatan, ref_loket.nama_loket')
            ->from('ta_antrian')
            ->join('ref_loket', 'ref_loket.id=ta_antrian.id_loket')
            ->join('kecamatan', 'kecamatan.id=ta_antrian.id_kecamatan');
            $query = $this->db->get();
            return $query->result();
            
        }

        public function insert($data){
            $this->db->insert('ta_antrian', $data);
        }
        public function update($id, $data){
            $this->db->where('id', $id);
            $this->db->update('ta_antrian', $data);
        }

        public function findOne($id){
            $model = $this->db->select('*')->where('id', $id)->get('ta_antrian');
            return ($model) ? $model->row() : null;
        }

        public function delete($id){
            $this->db->where('id', $id)->delete('ta_antrian');
        }
        public function getIdloket(){
             $model = $this->db->select('*')->get('ref_loket');
            return ($model) ? $model->result_array() : null;
        }
          public function getIdkecamatan(){
             $model = $this->db->select('*')->get('kecamatan');
            return ($model) ? $model->result_array() : null;
        }

    }
?>