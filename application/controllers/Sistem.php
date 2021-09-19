<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistem extends CI_Controller {
    /**
	 * Halaman ini mengatur: 
     
     Fungsionalitas Sistem Inventaris Asset dan Administrasi Kegiatan
     
	 */
    
    private $header = 'SIMIA';
    private $version = 'V1.0';
    
    function __construct()
	{
		parent::__construct();
            
		#load library, helper dan model yang dibutuhkan
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->library('session');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->model('Sistem_model','',true);
	}
    
    function index()
    {
        // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        
        // NOTIFIKASI
        $data['notifikasi'] = $this->Sistem_model->get_notifikasi()->result();
        $data['jlh_notifikasi'] = $this->Sistem_model->get_notifikasi()->num_rows();
//        var_dump($data['notifikasi']);die();
        
        //DATA
        $data['jlh_aset'] = $this->Sistem_model->get_aset()->num_rows();
        $data['jlh_laporan'] = $this->Sistem_model->get_laporan()->num_rows();
        $data['jlh_ruangan'] = $this->Sistem_model->get_ruangan()->num_rows();
        $data['jlh_laporan_selesai'] = $this->Sistem_model->get_laporan_selesai()->num_rows();
        
        $this->load->view('sistem/index', $data);
    }
    
    function profile($message = NULL, $id_profile = NULL)
    {
        // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        $data['menu'] = "profile";
        $data['judul'] = "Profile";
        
         // NOTIFIKASI
        $data['notifikasi'] = $this->Sistem_model->get_notifikasi()->result();
        $data['jlh_notifikasi'] = $this->Sistem_model->get_notifikasi()->num_rows();
        
         if($message == 'berhasil_diupdate')
            $data['message'] = 'Data berhasil diedit';
        else if($message == 'berhasil_dihapus')
            $data['message'] = 'Data berhasil dihapus';
        else if($message == 'berhasil_ditambah')
            $data['message'] = 'Data berhasil ditambah';
        else
            $data['message'] = '';
        
        $data['data'] = $this->Sistem_model->get_data_profile($id_profile)->result();
        
        if($_SESSION['level'] == 'master_admin' && $id_profile == NULL)
        {
           $this->load->view('sistem/all_profile', $data); 
        }
        else if($_SESSION['level'] == 'master_admin' && $id_profile != NULL)
        {
            $this->load->view('sistem/profile', $data);
        }
        else
        {
        $this->load->view('sistem/profile', $data);
        }
    }
    
    function update_profile($id)
    {
        $nama_user = $this->input->post('nama_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');
        
        if($password != NULL || $password != '')
        {
            $pass =  md5($password);
            $data = [
                'nama_user' => $nama_user,
                'username' => $username,
                'password' =>$pass
            ];
            
            if($_SESSION['level'] != 'master-admin' || $level == 'master_admin'){
            $sess_data = [
						'username' => $username,
						'password' => $password,
                        'nama_user' => $nama_user
						];
            }
        }
        else
        {
            $data = [
                'nama_user' => $nama_user,
                'username' => $username
            ];
            
            if($_SESSION['level'] != 'master-admin' || $level == 'master_admin'){
            $sess_data = [
						'username' => $username,
                        'nama_user' => $nama_user
						];
            }

        }
        
        if($_SESSION['level'] != 'master_admin' || $level == 'master_admin'){
            $this->session->set_userdata($sess_data);
        }
        
        $this->db->where('id_user', $id)->update('user', $data);
        redirect('Sistem/profile/berhasil_diupdate/'. $id);
    }
    
    public function hapus_profile($id)
    {
        $this->db->where('id_user', $id)->delete('user');
        redirect('Sistem/profile/berhasil_dihapus');
    }
    
    public function lihat_notifikasi()
    {
         // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        $data['menu'] = "notifikasi";
        $data['judul'] = "Notifikasi";
        
         // NOTIFIKASI// NOTIFIKASI
        $data['notifikasi'] = $this->Sistem_model->get_notifikasi()->result();
        $data['jlh_notifikasi'] = $this->Sistem_model->get_notifikasi()->num_rows();
        
        $data['data'] = $this->Sistem_model->get_notifikasi_all()->result();
        
//        var_dump($data['notifikasi']);die();
        $this->load->view('sistem/lihat_notifikasi', $data);
    }
}