<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    /**
	 * Halaman ini mengatur: 
     
     1. Tampilan utama untuk pengguna (user) biasa;
     2. Tampilan login untuk dekanat, tata usaha dan perlengkapan;
     
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
        $this->load->library('email');
        $this->load->model('Login_model','',true);
        $this->load->model('Inventarisasi_model','',true);
	}
    
    function login()
    {
        // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        
        // pesan
        if($this->uri->segment(3) == 'akun_belum_terdaftar')
            $data['message'] = "Akun Belum Terdaftar";
        else if($this->uri->segment(3) == 'salah_password')
            $data['message'] = "Password Anda Salah";
        else if($this->uri->segment(3) == 'salah_username_password')
            $data['message'] = "Username atau Password Anda Salah";
        else
            $data['message'] = "";
        
        // proses
        if(!$_POST)
		{
			$data['input'] = (object) $this->Login_model->getDefaultValues();
		}
        
		else
		{
			$data['input'] = (object) $this->input->post();
		}

		if(!$this->Login_model->validate()) {
			$this->load->view('login', $data);
			return;
		}

		if(!$this->Login_model->run($data['input'])) {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            
            $verifikasi_user = $this->Login_model->verif_user($username)->num_rows();
            
            if($verifikasi_user<=0)
            {
                redirect('Home/login/akun_belum_terdaftar');
            }
            else
            {
                $verifikasi_akun = $this->Login_model->verif_akun($username,$password)->num_rows();
                
                if($verifikasi_akun <= 0)
                {
                    redirect('Home/login/salah_password');
                }   
            }
			redirect('login');
		}
        
		else
		{
            if($_SESSION['level'])
            {
                // Masuk Ke Halaman PERLENGKAPAN, DEKANAT, TATA USAHA
//                var_dump($_SESSION['username']);die();
                redirect('Sistem/index');
            }
            else
            {
                echo "Tidak Terverifikasi"; die();
            }
		 
		}
	}

	function logout()
	{
		$this->Login_model->logout();
		redirect('Home/login');
	} 
    
    function index()
    {
         // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
        
        $this->load->view('front_end_v/home', $data);
    }
    
    function lapor_kerusakan()
    {
         // derived variable 
        $data['header'] = $this->header;
        $data['version'] = $this->version;
  
        
        if($this->input->post())
        {
            $section = $this->input->post('status');
        if($section == 'umum')
        {
            $data['jenis_file'] = 'KTP';
            $data['section'] = 'umum';
        }
        else if($section == 'pegawai')
        {
            $data['jenis_file'] = 'Kartu Pegawai/KTP';
            $data['section'] = 'pegawai';
        }
        else if($section == 'dosen')
        {
            $data['jenis_file'] = 'Kartu Pegawai/KTP';
            $data['section'] = 'dosen';
        }
        else if($section == 'mahasiswa')
        {
            $data['jenis_file'] = 'KTM';
            $data['section'] = 'mahasiswa';
        }
        
//        $this->load->view('front_end/lapor_kerusakan', $data);
            $this->load->view('front_end_v/home2', $data);
        }
        else
        {
//            $this->load->view('front_end/lapor_kerusakan_awal', $data);
            $this->load->view('front_end_v/home', $data);
        }
    }
    
    function tambah_laporan_kerusakan()
    {
        $status = $this->input->post('status');
        $nama_pelapor = $this->input->post('nama_pelapor');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $no_tlp = $this->input->post('no_tlp');
        $nim_nip_pekerjaan = $this->input->post('nim_nip_pekerjaan');
        $deskripsi = $this->input->post('deskripsi');
        $jenis_laporan = $this->input->post('jenis_laporan');
        $tingkat_kerahasiaan = $this->input->post('tingkat_kerahasiaan');
        
        
        //konfigurasi upload
		$config['upload_path'] = './laporan/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']      = 2048;
        $config['max_width']     = 4000;
        $config['max_height']    = 6000;
        $config['overwrite']  = TRUE;

        var_dump($config['upload_path']);

//                $this->load->library('upload', $config);
                $this->upload->initialize($config);


                if (! $this->upload->do_upload('foto'))
                {
                     $error = $this->upload->display_errors();
                    echo $error;
                }
                else
                {
                     $data_gambar = array('upload_data' => $this->upload->data());

                        foreach($data_gambar as $dg)
                        {
                        	$nama_file = $dg['file_name'];
                        }
                    
                    //BUKTI
                    
                    $config['upload_path'] = './laporan_bukti/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']      = 2048;
        $config['max_width']     = 4000;
        $config['max_height']    = 6000;
        $config['overwrite']  = TRUE;

        var_dump($config['upload_path']);

//                $this->load->library('upload', $config);
                $this->upload->initialize($config);


                if ( ! $this->upload->do_upload('bukti'))
                {
                     $error = $this->upload->display_errors();
                    echo $error;
                }
                    else{
                        
                         $data_gambar2 = array('upload_data' => $this->upload->data());

                        foreach($data_gambar2 as $dg2)
                        {
                        	$nama_file2 = $dg2['file_name'];
                        }
                      
                        if($status == 'umum')
                    {
                        $data = [
                        'nama_pelapor' => $nama_pelapor,
                        'pekerjaan' => $nim_nip_pekerjaan,
                        'status' => $status,
                        'email' => $email,
                        'alamat' => $alamat,
                        'jenis_laporan' => $jenis_laporan,
                        'deskripsi' => $deskripsi,
                        'foto' => $nama_file,
                        'tingkat_kerahasiaan' => $tingkat_kerahasiaan,
                        'no_tlp' => $no_tlp,
                        'bukti' => $nama_file2
                    ];
                    }
                    else
                    {
                         $data = [
                        'nama_pelapor' => $nama_pelapor,
                        'nim_nip' => $nim_nip_pekerjaan,
                        'status' => $status,
                        'email' => $email,
                        'alamat' => $alamat,
                        'jenis_laporan' => $jenis_laporan,
                        'deskripsi' => $deskripsi,
                        'foto' => $nama_file,
                        'tingkat_kerahasiaan' => $tingkat_kerahasiaan,
                        'no_tlp' => $no_tlp,
                        'bukti' => $nama_file2
                    ];
                    }
                   
                    
                    $simpan = $this->Inventarisasi_model->tambah_laporan_kerusakan($data);
                    }
                    
                    
                    //send Email
                    
                    
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
                    
    
                    
//                    $config = [
//            'mailtype'  => 'html',
//            'charset'   => 'utf-8',
//            'protocol'  => 'smtp',
//            'smtp_host' => 'smtp.gmail.com',
//            'smtp_user' => 'fasilkomtiusu1@gmail.com',  // Email gmail
//            'smtp_pass'   => 'bersatuberpadu1',  // Password gmail
//            'smtp_crypto' => 'ssl',
//            'smtp_port'   => 465,
//            'crlf'    => "\r\n",
//            'newline' => "\r\n"
//        ];
//                    $this->load->library('email', $config);
                    
//                     $this->load->library('email');
//            $config = Array(
//                'protocol' => 'smtp',
//                'smtp_host' => 'ssl://smtp.gmail.com',
//                'smtp_port' => 465,
//                'smtp_user' => 'fasilkomtiusu1@gmail.com', // change it to yours
//                'smtp_pass' => 'bersatuberpadu1', // change it to yours
//                'smtp_timeout'=>20,
//                'mailtype' => 'text',
//                'charset' => 'iso-8859-1',
//                'wordwrap' => TRUE
//               );
                    
                    $this->email->initialize($config);
           
                    $this->email->from('fasilkomtiusu1@gmail.com', 'Fasilkom-TI USU');
                    $this->email->to($email);

                    $this->email->subject('Email Verifikasi');
                    $this->email->message('Laporan anda sedang diproses. Mohon menunggu tanggapan selanjutnya.');
                    
                    
                    $this->session->set_flashdata('msg', "Mail has been sent succesfully");
                    $this->session->set_flashdata('msg_class', 'alert-success');
                    
                    if($this->email->send())
                    {
                        redirect('Home/selamat');
                    }
                    else
                    {
                        echo $this->email->print_debugger();
                    }
                    
//                    redirect('Home/selamat');
                }
    }
    
    public function selamat()
    {
        $this->load->view('front_end_v/selamat');
    }
}