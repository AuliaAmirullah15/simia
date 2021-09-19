<?php
	
class Sistem_model extends CI_Model
{
	public $table='user';

	public function get_data_profile($id_profile)
    {
        $this->db->select('*');
        $this->db->from('user');
        
        if($_SESSION['level'] != 'master_admin')
        {
            $this->db->where('id_user', $_SESSION['id_user']);
        }
        else if($id_profile != NULL)
        {
            $this->db->where('id_user', $id_profile);
        }
        return $this->db->get();
    }
    
    public function get_notifikasi()
    {
        $this->db->select('*');
        $this->db->from('inv_notifikasi a');
        $this->db->join('inv_komentar_laporan b', 'b.id_komentar = a.id_komentar');
        $this->db->join('user c', 'c.id_user = b.id_user'); 
        $this->db->where('a.id_user', $_SESSION['id_user']);
        $this->db->where('a.status', 'belum');
        $this->db->order_by('a.id_notifikasi', 'DESC');
        
        return $this->db->get();
    }
    
    public function get_notifikasi_all()
    {
        $this->db->select('*');
        $this->db->from('inv_notifikasi a');
        $this->db->join('inv_komentar_laporan b', 'b.id_komentar = a.id_komentar');
        $this->db->join('user c', 'c.id_user = b.id_user'); 
        $this->db->where('a.id_user', $_SESSION['id_user']);
        $this->db->order_by('a.id_notifikasi', 'DESC');
        
        return $this->db->get();
    }
    
    public function get_aset()
    {
        $this->db->select('*');
        $this->db->from('inv_inventaris');
        
        return $this->db->get();
    }
    
    public function get_laporan()
    {
        $this->db->select('*');
        $this->db->from('inv_laporan');
        
        return $this->db->get();
    }
    
    public function get_ruangan()
    {
        $this->db->select('*');
        $this->db->from('inv_ruangan');
        
        return $this->db->get();
    }
    
    public function get_laporan_selesai()
    {
        $this->db->select('*');
        $this->db->from('inv_laporan');
        $this->db->where('status_proses', 'sudah');
          if($_SESSION['level'] == 'wd1' || $_SESSION['level'] == 'akademik')
        {
            $this->db->where('jenis_laporan','akademik');
        }
        else if($_SESSION['level'] == 'wd2' || $_SESSION['level'] == 'aset')
        {
            $this->db->where('jenis_laporan','aset');
        }
        else if($_SESSION['level'] == 'wd3' || $_SESSION['level'] == 'penelitian')
        {
            $this->db->where('jenis_laporan','penelitian');
        }
       
        if($_SESSION['level'] == 'akademik' || $_SESSION['level'] == 'aset' || $_SESSION['level'] == 'penelitian')
        {
            $this->db->where('tingkat_kerahasiaan', 'umum');
        }
        
        return $this->db->get();
    }
}










