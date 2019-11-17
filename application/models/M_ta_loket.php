<?php
    class M_ta_loket extends CI_Model {
    
        public function getAll()
        {
                
            $this->db->select('ta_loket.id, kecamatan.nama_kecamatan, ref_loket.nama_loket')
            ->from('ta_loket')
            ->join('ref_loket', 'ref_loket.id=ta_loket.id_loket')
            ->join('kecamatan', 'kecamatan.id=ta_loket.id_kecamatan');
            $query = $this->db->get();
            return $query->result();
        }

        public function insert($data){
            $this->db->insert('ta_loket', $data);
        }
        public function update($id, $data){
            $this->db->where('id', $id);
            $this->db->update('ta_loket', $data);
        }

        public function findOne($id){
            $model = $this->db->select('*')->where('id', $id)->get('ta_loket');
            return ($model) ? $model->row() : null;
        }

        public function delete($id){
            $this->db->where('id', $id)->delete('ta_loket');
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