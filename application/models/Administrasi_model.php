<?php
	
class Administrasi_model extends CI_Model
{
	public $table='user';

	public function get_jadwal_kegiatan($id)
    {
        $this->db->select('*');
        $this->db->from('adm_jadwal_kegiatan');
        
        
        if($id != NULL)
        {
            $this->db->where('id_jadwal', $id);
        }
        
        $this->db->order_by('id_jadwal', 'DESC');
        
        return $this->db->get();
    }
    
    public function get_peserta_undangan()
    {
        $this->db->select('*');
        $this->db->from('adm_peserta_undangan');
        
        return $this->db->get();
    }
    
    public function tambah_peserta_kegiatan($data)
    {
        $this->db->insert('adm_peserta_undangan', $data);
        return $this->db->insert_id();
    }
    
    public function tambah_undangan_baru($data)
    {
        $this->db->insert('adm_jadwal_kegiatan', $data);
        return $this->db->insert_id();
    }
    
    public function get_notulensi($id_jadwal)
    {
        $this->db->select('*');
        $this->db->from('adm_notulensi');
        $this->db->where('id_jadwal', $id_jadwal);
        
        return $this->db->get();
    }
}
