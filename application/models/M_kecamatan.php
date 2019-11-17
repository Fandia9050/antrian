<?php
	class M_kecamatan extends CI_Model {
		public function getAll()
		{
				$query = $this->db->get('kecamatan');
				return $query->result();
		}

		public function insert($data){
			$this->db->insert('kecamatan',$data);
		}
		public function update($id, $data){
			$this->db->where('id', $id);
			$this->db->update('kecamatan', $data);
		}
		public function findone($id){
			$model = $this->db->select('*')->where('id', $id)->get('kecamatan');
			return ($model) ? $model->row() : null;
		}
		public function delete($id){
			$this->db->where('id',$id)->delete('kecamatan');
		}
	}

?>