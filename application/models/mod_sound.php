
<?php
    class Mod_sound extends CI_Model{

        var $sound_path;
        var $sound_path_url;

        function __construct(){
            parent::__construct();
            $this->sound_path = realpath(APPPATH . '../asset/sound');
            
        }
        function isound($sound = ''){
            if(!$sound){
                $data = array(
                    'judul' => $this->input->post('judul'),
                    'keterangan' => $this->input->post('keterangan'),

                );
            }else{
                $data = array(
                    'judul' => $this->input->post('judul'),
                    'keterangan' => $this->input->post('keterangan'),

                    'sound' => $sound,


                );
            }
            if($this->input->post('id_sound')){
                $this->db->where("id_sound",$this->input->post('id_sound'));
                $this->db->update('sound',$data);
            }else{
                $sound = $this->db->insert('sound',$data);

            }
        }

        function do_upload($sound){
            $config = array(
                'allowed_types'=>'mp3|wav',
                'upload_path'=> $this->sound_path,
                'max_size'=>20000

            );
            $this->load->library('upload',$config);
            $this->upload->do_upload($sound);
            $data = $this->upload->data($sound);
            $image_data = $this->upload->data();
            $nama_filenya = $image_data['file_name'];

           

            return $nama_filenya;

        }
        function get_sound(){
            $this->db->select('*');
            $this->db->order_by('tanggal','desc');
            $this->db->from('sound');

            $query = $this->db->get();
            return $query->result();
        }
    }
?>
