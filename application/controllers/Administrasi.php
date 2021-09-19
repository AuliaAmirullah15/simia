<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrasi extends CI_Controller {
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
        $this->load->model('Administrasi_model','',true);
        $this->load->model('Sistem_model','',true);
	}
    
    function jadwal_kegiatan($message = NULL)
    {
        // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        $data['menu'] = 'jadwal_kegiatan';
        $data['judul'] = 'Jadwal Kegiatan';
        
          //NOTIFIKASI
        $data['notifikasi'] = $this->Sistem_model->get_notifikasi()->result();
        $data['jlh_notifikasi'] = $this->Sistem_model->get_notifikasi()->num_rows();
        
        $data['data'] = $this->Administrasi_model->get_jadwal_kegiatan(NULL)->result();
        
         if($message == 'berhasil_diupdate')
            $data['message'] = 'Data berhasil diedit';
        else if($message == 'berhasil_dihapus')
            $data['message'] = 'Data berhasil dihapus';
        else if($message == 'berhasil_ditambah')
            $data['message'] = 'Data berhasil ditambah';
        else
            $data['message'] = '';
       
        $this->load->view('sistem/jadwal_kegiatan', $data);
    }
    
    function peserta_undangan($message = NULL)
    {
         // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        $data['menu'] = 'peserta_undangan';
        $data['judul'] = 'Peserta Undangan';
        
          //NOTIFIKASI
        $data['notifikasi'] = $this->Sistem_model->get_notifikasi()->result();
        $data['jlh_notifikasi'] = $this->Sistem_model->get_notifikasi()->num_rows();
        
        $data['data'] = $this->Administrasi_model->get_peserta_undangan()->result();
        
         if($message == 'berhasil_diupdate')
            $data['message'] = 'Data berhasil diedit';
        else if($message == 'berhasil_dihapus')
            $data['message'] = 'Data berhasil dihapus';
        else if($message == 'berhasil_ditambah')
            $data['message'] = 'Data berhasil ditambah';
        else
            $data['message'] = '';
       
        $this->load->view('sistem/peserta_undangan', $data);
    }
    
    function hapus_data($tabel, $id)
    {
        if($tabel == 'adm_jadwal_kegiatan')
        {
            $id_tabel = 'id_jadwal';
            $function = 'jadwal_kegiatan';
        }
        else{
            $id_tabel = 'id_peserta';
            $function = 'peserta_undangan';
        }
        $this->db->where($id_tabel, $id)->delete($tabel);
        redirect('Administrasi/'. $function. '/berhasil_dihapus');
    }
    
    function tambah_peserta_kegiatan()
    {
        $nama_peserta = $this->input->post('nama_peserta');
        
        $data = [
          'nama_peserta' => $nama_peserta  
        ];
        
        $this->Administrasi_model->tambah_peserta_kegiatan($data);
        redirect('Administrasi/peserta_undangan/berhasil_ditambah');
    }
    
    function buat_undangan($message = NULL)
    {
         // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        $data['menu'] = 'buat_undangan';
        $data['judul'] = 'Buat Undangan Baru';
        
        //NOTIFIKASI
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
       
        $this->load->view('sistem/buat_undangan', $data);
    }
    
    function buat_undangan_baru()
    {
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $jadwal_kegiatan = $this->input->post('jadwal_kegiatan');
        $tempat_kegiatan = $this->input->post('tempat_kegiatan');
        $kategori = $this->input->post('kategori');
        
        $jadwal = str_replace('T',' ', $jadwal_kegiatan);
        $jadwal = explode(" ", $jadwal);
        $tanggal = $jadwal[0];
        $jam = $jadwal[1].":00";
        
        $jadwal_all = $tanggal. " ". $jam;
//        var_dump($jadwal_all);die();
        
        $data = [
            'nama_kegiatan' => $nama_kegiatan,
            'waktu' => $jadwal_all,
            'tempat' => $tempat_kegiatan,
            'status' => 'on',
            'kategori' => $kategori
        ];
        
        $id = $this->Administrasi_model->tambah_undangan_baru($data);
        
//        redirect('Administrasi/buat_undangan/berhasil_ditambah');
        
        redirect('Administrasi/cetak_undangan/'. $id);
    }
    
    function cetak_undangan($id)
    {
                $data['jadwal'] = $this->Administrasi_model->get_jadwal_kegiatan($id)->result();
        
//        foreach($data['jadwal'] as $j) {
//            $data['nama_kegiatan'] = $j->nama_kegiatan;
//            $data['waktu'] = $j->jadwal;
//            $data['tempat'] = $j->tempat;
//        }
        $data['peserta'] = $this->Administrasi_model->get_peserta_undangan()->result();
        
         $html = $this->load->view('sistem/cetak_undangan', $data, true);
         // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'portrait');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    }
    
    function edit_kegiatan($id, $message = NULL)
    {
           // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        $data['menu'] = 'edit_kegiatan';
        $data['judul'] = 'Edit Kegiatan';
        
          //NOTIFIKASI
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
        
        $data['data'] = $this->Administrasi_model->get_jadwal_kegiatan($id)->result();
        $data['notulensi'] = $this->Administrasi_model->get_notulensi($id)->result();
       
        $this->load->view('sistem/edit_kegiatan', $data);
    }
    
}