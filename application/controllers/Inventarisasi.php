<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventarisasi extends CI_Controller {
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
        $this->load->model('Inventarisasi_model','',true);
        $this->load->model('Sistem_model','',true);
	}
    
    function tambah_data($id_inventaris = NULL)
    {
        
        $data['notifikasi'] = $this->Sistem_model->get_notifikasi()->result();
        $data['jlh_notifikasi'] = $this->Sistem_model->get_notifikasi()->num_rows();
        
//        $this->form_validation->set_message('rule', '{field} tidak boleh kosong');
        if($this->input->post('id_inventaris') == 'NULL')
        {
            $nama_barang = $this->input->post('nama_barang');
            $sumber_dana = $this->input->post('sumber_dana');
            $tahun_pendanaan = $this->input->post('tahun_pendanaan');
            $lokasi = $this->input->post('lokasi');
            $kondisi = $this->input->post('kondisi');
            $tindakan = $this->input->post('tindakan');
            
            $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array('rule' => 'Error Message on rule2 for this field_name'));
            $this->form_validation->set_rules('tahun_pendanaan', 'Tahun Pendanaan', 'required', array('rule' => 'Error Message on rule2 for this field_name'));
            $this->form_validation->set_rules('lokasi', 'Lokasi', 'required', array('rule' => 'Error Message on rule2 for this field_name'));
        
            if($kondisi == 'rusak')
            {
                 $this->form_validation->set_rules('tindakan', 'Tindakan', 'required', array('rule' => 'Error Message on rule2 for this field_name'));
            }
            
            $this->form_validation->run();
            
            //Add Data
            $data_inv_inventaris = [
                'nama_barang' => $nama_barang,
                'id_sumber_dana' => $sumber_dana,
                'tahun_pendanaan' => $tahun_pendanaan,
                'lokasi' => $lokasi,
                'kondisi' => $kondisi
            ];
            
            $id_barang = $this->Inventarisasi_model->tambah_data('inv_inventaris',$data_inv_inventaris);
       
            if($kondisi == 'rusak')
            {
                $data_inv_tindakan = [
                    'id_barang' => $id_barang,
                    'tindakan' => $tindakan
                ];
                
                $this->Inventarisasi_model->tambah_data('inv_tindakan',$data_inv_tindakan);
            }
            
            //RECORD DATA TO LOG HISTORI ASET
            $data_log_aset = [
                'tanggal' => date('Y-m-d'),
                'aksi' => 'tambah data',
                'status' => $kondisi,
                'id_inventaris' => $id_barang,
                'tindakan' => $tindakan,
                'id_user' => $_SESSION['id_user']
            ];
            
            $this->Inventarisasi_model->tambah_data_log_asset($data_log_aset);
            
            
            redirect('Inventarisasi/sukses_ditambah/'. $id_barang.'/'. $nama_barang);
        }
        else if($this->input->post()) {
            $id_inventaris = $this->input->post('id_inventaris');
            $nama_barang = $this->input->post('nama_barang');
            $sumber_dana = $this->input->post('sumber_dana');
            $tahun_pendanaan = $this->input->post('tahun_pendanaan');
            $lokasi = $this->input->post('lokasi');
            $kondisi = $this->input->post('kondisi');
            $tindakan = $this->input->post('tindakan');
            
            $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array('rule' => 'Error Message on rule2 for this field_name'));
            $this->form_validation->set_rules('tahun_pendanaan', 'Tahun Pendanaan', 'required', array('rule' => 'Error Message on rule2 for this field_name'));
            $this->form_validation->set_rules('lokasi', 'Lokasi', 'required', array('rule' => 'Error Message on rule2 for this field_name'));
        
            if($kondisi == 'rusak')
            {
                 $this->form_validation->set_rules('tindakan', 'Tindakan', 'required', array('rule' => 'Error Message on rule2 for this field_name'));
            }
            
            $this->form_validation->run();
            
            //Edit
            $data_inv_inventaris = [
                'nama_barang' => $nama_barang,
                'id_sumber_dana' => $sumber_dana,
                'tahun_pendanaan' => $tahun_pendanaan,
                'lokasi' => $lokasi,
                'kondisi' => $kondisi
            ];
            
            $update = $this->db->where('id_inventaris',$id_inventaris)->update('inv_inventaris',$data_inv_inventaris);
            
            //ADD TO DATA LOG_HISTORI_STATUS_ASET db
            $data_log_aset = [
                'tanggal' => date('Y-m-d'),
                'aksi' => 'update',
                'status' => $kondisi,
                'id_inventaris' => $id_inventaris,
                'tindakan' => $tindakan,
                'id_user' => $_SESSION['id_user']
            ];
            
            $this->Inventarisasi_model->tambah_data_log_asset($data_log_aset);
            
            //Edit keterangan casse si c'est casse ou suprime
            if($kondisi == 'rusak')
            {
                //cek di inv_tindakan
                $data = $this->db->where('id_barang', $id_inventaris)
						->get('inv_tindakan')
						->row();
                
                if(count($data))
                {
                     $data_tindakan = [
                    'tindakan' => $tindakan
                ];
                $tindakan = $this->db->where('id_barang', $id_inventaris)->update('inv_tindakan', $data_tindakan);
                }
                else
                {
                     $data_tindakan = [
                        'id_barang' => $id_inventaris,
                        'tindakan' => $tindakan,
                         'tanggal_tindakan' => date("Y-m-d")
                         ];
                }
                         $tindakan = $this->Inventarisasi_model->simpan_data($data_tindakan);
            }
            else{
                $delete = $this->db->where('id_barang',$id_inventaris)->delete('inv_tindakan');
            }
            redirect('Inventarisasi/assets/sukses_mengedit/'. $nama_barang);
        }
        
        // Edit Data
        if($id_inventaris != NULL)
        {
            $data['inventaris'] = $this->Inventarisasi_model->get_all_assets($id_inventaris)->result();
            $data['tindakan'] = $this->Inventarisasi_model->get_tindakan($id_inventaris)->result();
        }
        else
        {
            $data['inventaris'] = NULL;
            $data['tindakan'] = NULL;
        }
        
        // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        $data['menu'] = 'tambah_data_inventaris';
        $data['judul'] = 'Tambah Data Inventaris';
        
       
        $data['sumber_dana'] = $this->Inventarisasi_model->get_sumber_dana()->result(); 
        $data['lokasi'] = $this->Inventarisasi_model->get_ruangan()->result();
        
        $this->load->view('sistem/inv_tambah_data', $data);
    }
    
    public function sukses_ditambah($id_barang, $nama_barang)
    {
         // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        $data['menu'] = 'tambah_data_inventaris';
        $data['judul'] = 'Selamat!';
        $data['id_barang'] = $id_barang;
        $data['nama_barang'] = $nama_barang;
        
        $data['notifikasi'] = $this->Sistem_model->get_notifikasi()->result();
        $data['jlh_notifikasi'] = $this->Sistem_model->get_notifikasi()->num_rows();
        
        $this->load->view('sistem/inv_sukses_ditambah', $data);
    }
    
    public function assets($pesan=NULL, $nama_barang=NULL)
    {
         // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        $data['menu'] = 'assets';
        $data['judul'] = 'List Asset';
        
        //NOTIFIKASI
        $data['notifikasi'] = $this->Sistem_model->get_notifikasi()->result();
        $data['jlh_notifikasi'] = $this->Sistem_model->get_notifikasi()->num_rows();
        
        // pesan
        if($pesan == 'sukses_menghapus_data')
            $data['message'] = "Data ". $nama_barang. " berhasil dihapus!";
        else if($pesan == 'sukses_mengedit_data')
            $data['message'] = "Data ". $nama_barang. " berhasil diedit!";
        else
            $data['message'] = "";
        
        $data['data'] = $this->Inventarisasi_model->get_all_assets()->result();
        
        $this->load->view('sistem/assets', $data);
    }
    
    public function hapus_inventaris($id_inventaris, $nama_barang)
    { 
        $this->db->where('id_inventaris',$id_inventaris)->delete('inv_inventaris');
        redirect('Inventarisasi/assets/sukses_menghapus_data/'. $nama_barang);
    }
    
    public function cetak_qr_code($id_inventaris, $nama_barang)
    {
        //Take Data
        $all_data = $this->Inventarisasi_model->get_all_assets($id_inventaris)->result();
        
        foreach($all_data as $d)
        {
            $id_inventaris = $d->id_inventaris;
            $sumber_dana = $d->sumber_dana;
            $tahun_pendanaan = $d->tahun_pendanaan;
            $lokasi = $d->lokasi;
        }
        $nama_barang = str_replace('%20','_', $nama_barang);
        
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name= $id_inventaris."_".$nama_barang.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = "Aset Fasilkom-TI USU:
        
Nama Barang     : ". str_replace("_"," ",$nama_barang) ."
Sumber Dana     : ". $sumber_dana ."
Tahun Pendanaan : ". $tahun_pendanaan ."
Lokasi          : ". $lokasi ." 
Nama File       : ". $image_name; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
 
//        $this->mahasiswa_model->simpan_mahasiswa($nim,$nama,$prodi,$image_name); //simpan ke database
        $data['nama_barang'] = $nama_barang;
        $html = $this->load->view('sistem/qrcode_print', $data, true);
         // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    }
    
    public function laporan_inventaris()
    {
         // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        $data['menu'] = 'laporan_inventaris';
        $data['judul'] = 'Laporan';
        
        //NOTIFIKASI
        $data['notifikasi'] = $this->Sistem_model->get_notifikasi()->result();
        $data['jlh_notifikasi'] = $this->Sistem_model->get_notifikasi()->num_rows();
        
        if($this->uri->segment(3) == 'berhasil_diupdate')
            $data['message'] = 'Data berhasil diedit';
        else if($this->uri->segment(3) == 'berhasil_dihapus')
            $data['message'] = 'Data berhasil dihapus';
        else
            $data['message'] = '';
        
        $data['data'] = $this->Inventarisasi_model->get_laporan_inventaris()->result();
        
        $this->load->view('sistem/laporan', $data);
    }
    
        public function edit_status_laporan()
    {
        $id_laporan = $this->input->post('id_laporan');
        
            $data = [
              'status_proses' => 'sudah',  
            ];
            
            $this->db->where('id_laporan',$id_laporan)->update('inv_laporan',$data);
            
            
            //send EMail
              $config['protocol'] = 'smtp';
                    $config['smtp_host'] = 'smtp.gmail.com';
                    $config['smtp_port'] = '465';
                    $config['smtp_timeout'] = '4';
                    
                    $config['smtp_user'] = 'fasilkomtiusu1@gmail.com';
                    $config['smtp_pass'] = 'bersatuberpadu1';
                    $config['smtp_crypto'] = 'ssl';
                    
                    $config['charset'] = 'utf-8';
                    $config['newline'] = '\r\n';
                    $config['mailtype'] = 'text';
                    $config['validation'] = TRUE;
            
             $this->email->initialize($config);
           
                    $this->email->from('fasilkomtiusu1@gmail.com', 'Fasilkom-TI USU');
                    $this->email->to($email);

                    $this->email->subject('Email Tanggapan Laporan');
                    $this->email->message('Laporan anda sudah ditanggapi dan diproses. Terima Kasih.');
                    
                    
                    $this->session->set_flashdata('msg', "Mail has been sent succesfully");
                    $this->session->set_flashdata('msg_class', 'alert-success');
                    
                    if($this->email->send())
                    {
                        redirect('Inventarisasi/laporan_inventaris/berhasil_diupdate');
                    }
                    else
                    {
                        echo $this->email->print_debugger();
                    }
    }
    
    public function hapus_laporan($id, $nama)
    {
        $this->db->where('id_laporan', $id)->delete('inv_laporan');
        redirect('Inventarisasi/laporan_inventaris/berhasil_dihapus');
    }
    
    public function sumber_dana()
    {
         // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        $data['menu'] = 'sumber_dana';
        $data['judul'] = 'Sumber Dana';
        
        //NOTIFIKASI
        $data['notifikasi'] = $this->Sistem_model->get_notifikasi()->result();
        $data['jlh_notifikasi'] = $this->Sistem_model->get_notifikasi()->num_rows();
        
        $data['data'] = $this->Inventarisasi_model->get_sumber_dana()->result();
        
         if($this->uri->segment(3) == 'berhasil_diupdate')
            $data['message'] = 'Data berhasil diedit';
        else if($this->uri->segment(3) == 'berhasil_dihapus')
            $data['message'] = 'Data berhasil dihapus';
        else if($this->uri->segment(3) == 'berhasil_ditambah')
            $data['message'] = 'Data berhasil ditambah';
        else
            $data['message'] = '';
        
        $this->load->view('sistem/sumber_dana', $data);
    }
    
    public function hapus_sumber_dana($id)
    {
        $this->db->where('id_sumber_dana', $id)->delete('inv_sumber_dana');
        redirect('Inventarisasi/sumber_dana/berhasil_dihapus');
    }
    
    public function tambah_sumber_dana()
    {
        $data = [
          'sumber_dana' => $this->input->post('sumber_dana')
        ];
        
        $this->Inventarisasi_model->simpan_sumber_dana($data);
        
        redirect('Inventarisasi/sumber_dana/berhasil_ditambah');
    }
    
    public function edit_sumber_dana()
    {
        $data = [
            'sumber_dana' => $this->input->post('sumber_dana1')
        ];
        
        $this->db->where('id_sumber_dana', $this->input->post('id_sumber_dana1'))->update('inv_sumber_dana', $data);
        redirect('Inventarisasi/sumber_dana/berhasil_diupdate');
    }
    
    public function log_histori_asset()
    {
          // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        $data['menu'] = 'log_asset';
        $data['judul'] = 'Log Histori Aset';
        
        //NOTIFIKASI
        $data['notifikasi'] = $this->Sistem_model->get_notifikasi()->result();
        $data['jlh_notifikasi'] = $this->Sistem_model->get_notifikasi()->num_rows();
        
        $data['data'] = $this->Inventarisasi_model->get_log_aset()->result();
//        var_dump($data['data']);die();
        $this->load->view('sistem/log_histori_asset', $data);
    }
    
    public function ruangan()
    {
          // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        $data['menu'] = 'ruangan';
        $data['judul'] = 'Daftar Ruangan';
        
        //NOTIFIKASI
        $data['notifikasi'] = $this->Sistem_model->get_notifikasi()->result();
        $data['jlh_notifikasi'] = $this->Sistem_model->get_notifikasi()->num_rows();
        
        $data['data'] = $this->Inventarisasi_model->get_ruangan()->result();
        
         if($this->uri->segment(3) == 'berhasil_diupdate')
            $data['message'] = 'Data berhasil diedit';
        else if($this->uri->segment(3) == 'berhasil_dihapus')
            $data['message'] = 'Data berhasil dihapus';
        else if($this->uri->segment(3) == 'berhasil_ditambah')
            $data['message'] = 'Data berhasil ditambah';
        else
            $data['message'] = '';
        
        $this->load->view('sistem/ruangan', $data);
    }
    
    public function edit_ruangan()
    {
        $id_ruangan = $this->input->post('id_ruangan');
        $nama_ruangan = $this->input->post('nama_ruangan');
        
        $data = [
          'nama_ruangan' => $nama_ruangan  
        ];
        
        $this->db->where('id_ruangan', $id_ruangan)->update('inv_ruangan', $data);
        
        redirect('Inventarisasi/ruangan/berhasil_diupdate');
    }
    
    public function hapus_ruangan($id)
    {
        $this->db->where('id_ruangan', $id)->delete('inv_ruangan');
        
        //RECORD DATA TO LOG HISTORI ASET
            $data_log_aset = [
                'tanggal' => date('Y-m-d'),
                'aksi' => 'delete',
                'status' => $kondisi,
                'id_inventaris' => $id,
                'tindakan' => $tindakan,
                'id_user' => $_SESSION['id_user']
            ];
            
            $this->Inventarisasi_model->tambah_data_log_asset($data_log_aset);
        
        redirect('Inventarisasi/ruangan/berhasil_dihapus');
    }
    
    public function tambah_ruangan()
    {
        $nama_ruangan = $this->input->post('mytext');
        
        foreach($nama_ruangan as $ruangan)
        {
            $data = [
                'nama_ruangan' => $ruangan
            ];
            
            $this->Inventarisasi_model->simpan_ruangan($data);
        }
        
         redirect('Inventarisasi/ruangan/berhasil_ditambah');
    }
    
    public function rincian_laporan($id_laporan)
    {
         // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        $data['menu'] = 'rincian_laporan';
        $data['judul'] = 'Rincian Laporan';
        
         //NOTIFIKASI
        $data['notifikasi'] = $this->Sistem_model->get_notifikasi()->result();
        $data['jlh_notifikasi'] = $this->Sistem_model->get_notifikasi()->num_rows();
        
        $data['data'] = $this->Inventarisasi_model->get_laporan_inventaris_by_id($id_laporan)->result();
        $data['komentar'] = $this->Inventarisasi_model->get_komentar_laporan($id_laporan)->result();
        
         if($this->uri->segment(3) == 'berhasil_diupdate')
            $data['message'] = 'Data berhasil diedit';
        else if($this->uri->segment(3) == 'berhasil_dihapus')
            $data['message'] = 'Data berhasil dihapus';
        else if($this->uri->segment(3) == 'berhasil_ditambah')
            $data['message'] = 'Data berhasil ditambah';
        else
            $data['message'] = '';
        
        //Change status notifikasi to be 'sudah' for all comments on this topic.
        $change = [
            'status' => 'sudah'
        ];
        
        $this->db->where('id_laporan', $id_laporan)->where('id_user', $_SESSION['id_user'])->update('inv_notifikasi', $change);
        
        $this->load->view('sistem/rincian_laporan', $data);
    }
    
    public function tambah_komentar()
    {
        $komentar = $this->input->post('komentar');
        $id_laporan = $this->input->post('id_laporan');
        $id_user = $this->input->post('id_user');
        
//        var_dump($id_laporan);
//        var_dump($id_user);
        $data = [
          'id_laporan' => $id_laporan,
            'komentar' => $komentar,
            'id_user' => $id_user,
            'waktu' => '2020-03-17 19:00:00',
            
        ];
        
        $id_komentar = $this->Inventarisasi_model->simpan_komentar_baru($data);
        
        //ADD TO NOTIFICATIONS
        $get_user = $this->Inventarisasi_model->get_user_bersangkutan()->result();
        
        foreach($get_user as $gu) {
            $notifikasi = [
                'id_komentar' => $id_komentar,
                'status' => 'belum',
                'id_user' => $gu->id_user,
                'id_laporan' => $id_laporan
            ];
            
            $this->Inventarisasi_model->simpan_notifikasi_baru($notifikasi);
        }
        
//        $data['crud']= $this->Inventarisasi_model->get_komentar_laporan($id_laporan)->result();
//        $this->load->view('sistem/view_data', $data);
    }
    
    public function tambah_komentar_update($id_laporan)
    {
        $komentar = $this->input->post('komentar');
        $id_user = $_SESSION['id_user'];

        $data = [
          'id_laporan' => $id_laporan,
            'komentar' => $komentar,
            'id_user' => $id_user,
            'waktu' => '2020-03-17 19:00:00',
            
        ];
        
        $id_komentar = $this->Inventarisasi_model->simpan_komentar_baru($data);
        
        //ADD TO NOTIFICATIONS
        $get_user = $this->Inventarisasi_model->get_user_bersangkutan()->result();
        
        foreach($get_user as $gu) {
            $notifikasi = [
                'id_komentar' => $id_komentar,
                'status' => 'belum',
                'id_user' => $gu->id_user,
                'id_laporan' => $id_laporan
            ];
            
            $this->Inventarisasi_model->simpan_notifikasi_baru($notifikasi);
        }
        
        redirect('Inventarisasi/rincian_laporan/'.$id_laporan.'/berhasil_ditambah');
    }
    
    public function view($id_laporan)
    {
        $data['crud']= $this->Inventarisasi_model->get_komentar_laporan($id_laporan)->result();
        $this->load->view('sistem/view_data', $data);
    }
}