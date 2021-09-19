<?php
	
class Inventarisasi_model extends CI_Model
{
	private $table='inv_sumber_dana';

    function __construct()
    {
	   parent::__construct();
    }

	public function get_sumber_dana()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        
        return $this->db->get();
    }
    
    public function getValidationRules()
	{
		return [
		[
			'field' => 'nama_barang',
			'label' => 'Nama Barang',
			'rules' => 'required'
		],
		[
			'field' => 'tahun_pendanaan',
			'label' => 'Tahun Pendanaan',
			'rules' => 'required'
		],
        [
			'field' => 'lokasi',
			'label' => 'Lokasi',
			'rules' => 'required'
		],
		];
	}
    
    public function validate()
	{
		$this->load->library('form_validation');
		$rules = $this->getValidationRules();
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters('<span class="form-error">', '</span>');
		return $this->form_validation->run();
	}
    
    public function tambah_data($tbl, $post_data)
    {
        $this->db->insert($tbl, $post_data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
    
    public function get_all_assets($id_inventaris = NULL)
    {
        $this->db->select('a.id_inventaris, a.nama_barang, a.id_sumber_dana, b.sumber_dana, a.tahun_pendanaan, a.lokasi, a.kondisi');
        $this->db->from('inv_inventaris a');
        $this->db->join('inv_sumber_dana b','b.id_sumber_dana = a.id_sumber_dana');
        if($id_inventaris != NULL)
        {
            $this->db->where('a.id_inventaris', $id_inventaris);
        }
        
        return $this->db->get();
    }
    
    public function get_tindakan($id_inventaris)
    {
        $this->db->select('*');
        $this->db->from('inv_tindakan');
        $this->db->where('id_barang', $id_inventaris);
        
        return $this->db->get();
    }
    
    public function simpan_data($data)
    {
        $this->db->insert('inv_tindakan',$data);
	   return $this->db->insert_id();
    }
    
    public function tambah_laporan_kerusakan($data)
    {
        $this->db->insert('inv_laporan', $data);
        return $this->db->insert_id();
    }
    
    public function get_laporan_inventaris()
    {
        $this->db->select('*');
        $this->db->from('inv_laporan');
        
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
            
        $this->db->order_by('id_laporan', 'DESC');
        
        return $this->db->get();
    }
    
    public function simpan_sumber_dana($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    
    public function tambah_data_log_asset($data)
    {
        $this->db->insert('log_histori_status_aset', $data);
        return $this->db->insert_id();
    }
    
    public function get_log_aset()
    {
        $this->db->select('*');
        $this->db->from('log_histori_status_aset a');
        $this->db->join('user b', 'b.id_user = a.id_user');
        $this->db->join('inv_inventaris c', 'c.id_inventaris = a.id_inventaris');
        $this->db->order_by('a.id_log', 'DESC');
        
        return $this->db->get();
    }
    
     public function get_ruangan()
    {
        $this->db->select('*');
        $this->db->from('inv_ruangan');
        
        return $this->db->get();
    }
    
    public function simpan_ruangan($data)
    {
        $this->db->insert('inv_ruangan', $data);
        $this->db->insert_id();
    }
    
    public function get_laporan_inventaris_by_id($id_laporan)
    {
        $this->db->select('*');
        $this->db->from('inv_laporan');
        $this->db->where('id_laporan', $id_laporan);
        
        return $this->db->get();
    }
    
    public function get_komentar_laporan($id_laporan)
    {
        $this->db->select('*');
        $this->db->from('inv_komentar_laporan a');
        $this->db->join('user b', 'b.id_user = a.id_user');
        $this->db->where('a.id_laporan', $id_laporan);
        
        return $this->db->get();
    }
    
    public function simpan_komentar_baru($data)
    {
        $this->db->insert('inv_komentar_laporan', $data);
        return $this->db->insert_id();
    }
//    
//    public function get_komentar_laporan_komen($id_laporan)
//    {
//        $this->db->select('*');
//        $this->db->from('inv_komentar_laporan a');
//        $this->db->join('user b', 'b.id_user = a.id_user');
//        $this->db->where('a.id_laporan', $id_laporan);
//        $this->db->order_by('a.id_komentar', 'DESC');
//        
//        return $this->db->get();
//    }
    
    public function get_user_bersangkutan()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('sub_bagian', $_SESSION['sub_bagian']);
        $this->db->where('id_user !=', $_SESSION['id_user']);
        
        return $this->db->get();
    }
    
    public function simpan_notifikasi_baru($data)
    {
        $this->db->insert('inv_notifikasi', $data);
        return $this->db->insert_id();
    }
}
