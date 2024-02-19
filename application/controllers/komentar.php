<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('MSudi');
	}

    public function tambahKomentar($fotoid) {
        $userid = $this->session->userdata('userid');
        $fotoid = $this->uri->segment('3');
        $komentar = $this->input->post('komentar');

        $add['komentar_id'] = '';
        $add['foto_id'] = $fotoid;
        $add['user_id'] = $userid;
        $add['isi_komentar'] = $komentar;
        $add['tanggal_komentar'] = date('Y-m-d');

        // Panggil fungsi tambahKomentar dari model
        $this->MSudi->AddData('komentarfoto', $add);

        // Redirect to the homepage or any other desired page
        redirect('Welcome');
    }

    public function ambilKomentar($fotoid) {
        $fotoid = $this->uri->segment('3');

        // Panggil model untuk mengambil semua komentar berdasarkan fotoid
        $data['komentar'] = $this->MSudi->getKomentarByFotoId($fotoid);

        // Lakukan sesuatu dengan data komentar seperti menampilkannya di view
        // Contoh: $this->load->view('view_komentar', $data);
    }

    public function delete($komentarid) {
        // Dapatkan id pengguna yang saat ini masuk
        $userid = $this->session->userdata('userid');
        
        // Dapatkan informasi komentar berdasarkan id komentar
        $komentar = $this->MSudi->getKomentarById($komentarid);
    
        // Pastikan komentar ada dan pengguna yang masuk adalah pemilik komentar atau memiliki hak akses untuk menghapus
        if ($komentar && $komentar['user_id'] == $userid) {
            // Panggil fungsi hapusKomentar dari model
            $this->MSudi->deleteKomentar($komentarid);
    
            // Redirect to the homepage or any other desired page
            redirect('Welcome');
        } else {
            // Handle unauthorized access or non-existent comment
            // Redirect or show an error message
            redirect('Welcome');
        }
    }
    

}
