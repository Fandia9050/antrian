<?php
    class M_loket extends CI_Model {
    
        public function getAll()
        {
                $query = $this->db->get('ref_loket');
                return $query->result();
        }

        public function insert($data){
            $this->db->insert('ref_loket', $data);
        }
         public function update($id, $data){
            $this->db->where('id', $id);
            $this->db->update('ref_loket', $data);
        }

        public function findOne($id){
            $model = $this->db->select('*')->where('id', $id)->get('ref_loket');
            return ($model) ? $model->row() : null;
        }

        public function delete($id){
            $this->db->where('id', $id)->delete('ref_loket');
        }

    }
?>