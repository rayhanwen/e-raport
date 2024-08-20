<!-- application/controllers/Nilai.php -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

    public function index() {
        $this->load->model('mengajar_model');

        $data = array(
            'id_kelas' => set_value('id_kelas'),
            'id_mengajar' => set_value('id_mengajar'),  // Menambahkan id_mengajar
            'mapel_data' => $this->mengajar_model->get_mapel_by_nik($this->session->userdata('idu')),  // Mendapatkan semua mapel yg diajar guru tertentu
            'tahun_ajaran_aktif' => $this->nilai_model->get_tahun_ajaran_aktif()
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('guru/nilai_list', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function nilai_aksi() {
        // Atur aturan validasi
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|numeric');

        // Periksa apakah validasi form berhasil
        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, muat ulang halaman index
            $this->index();
        } else {
            // Ambil tahun ajaran aktif
            $tahun_ajaran_aktif = $this->nilai_model->get_tahun_ajaran_aktif();
            $id_tahun = $tahun_ajaran_aktif ? $tahun_ajaran_aktif->id_tahun : null;

            // Ambil ID kelas dan ID mengajar dari input form
            $id_kelas = $this->input->post('id_kelas', TRUE);

            // Periksa apakah ID kelas valid
            $kelas = $this->nilai_model->get_kelas_by_id($id_kelas);
            if ($kelas == null) {
                // Kelas tidak ditemukan, setel pesan kesalahan dan redirect
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kelas yang Anda input belum terdaftar!</div>');
                redirect('administrator/nilai');
            } else {
                // Ambil data mata pelajaran dan guru pengajar untuk kelas dan tahun ajaran yang diberikan
                $mata_pelajaran_guru = $this->nilai_model->get_mata_pelajaran_guru($id_kelas, $id_tahun);

                // Data untuk dikirim ke view
                $datanilai = array(
                    'nilai_data' => $mata_pelajaran_guru,  // Menggunakan $mata_pelajaran_guru untuk menampilkan data
                    'id_tahun' => $id_tahun,
                    'id_kelas' => $id_kelas,
                    'tahun_ajaran' => $tahun_ajaran_aktif ? $tahun_ajaran_aktif->tahun_ajaran : 'Tidak Diketahui',
                    'nama_kelas' => $kelas->nama_kelas
                );

                // Muat view dengan data nilai
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar');
                $this->load->view('guru/nilai_kelas', $datanilai);
                $this->load->view('templates_administrator/footer');
            }
        }
    }

    // Ini untuk tampilkan form input nilai
    public function input_nilai($id_mengajar){
        $id_kls = $this->input->get('kelas');
        $nilai_siswa = $this->nilai_model->get_nilai_by_id_mengajar($id_mengajar);
        $tahun_mengajar = $this->nilai_model->get_tahun_ajaran_aktif();
        $data_mengajar = $this->nilai_model->get_mata_pelajaran_guru_by_id_mengajar($id_mengajar);
        $data = [
            'id_mengajar' => $id_mengajar,
            'id_kelas' => $id_kls,
            'kelas' => $this->nilai_model->get_kelas_by_id($id_kls),
            'siswa' => $this->nilai_model->get_siswa_by_id_ngajar_id_kelas($id_mengajar, $id_kls),
            'mapel' => $data_mengajar[0]->nama_mapel,
            'guru' => $data_mengajar[0]->nama_guru,
            'tahun_ajaran_mapel' => $tahun_mengajar,
            'kkm' => $this->nilai_model->get_kkm_by_id_mengajar($id_mengajar),
            'nilai' => ($nilai_siswa ? $nilai_siswa : FALSE),
        ];
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('guru/nilai_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    // Ini untuk fungsi input nilai
    public function input_nilai_aksi(){
        $this->load->model('siswa_model');
        $id_mengajar = $this->input->post('idm');
        $id_kelas = $this->input->post('idk');
        $siswa = $this->siswa_model->get_by_id_kelas($id_kelas);
        foreach($siswa as $sw){
            $nis = $this->input->post('nis'.$sw->nis);
            $data = [
                'nis' => $sw->nis,
                'ns1' => $this->input->post('n1'.$sw->nis, true),
                'ns2' => $this->input->post('n2'.$sw->nis, true),
                'ns3' => $this->input->post('n3'.$sw->nis, true),
                'ns4' => $this->input->post('n4'.$sw->nis, true),
                'rata1' => $this->input->post('rata_n'.$sw->nis, true),
                'predikat' => $this->input->post('predikat_'.$sw->nis, true),
                'deskripsi' => $this->input->post('deskripsi_'.$sw->nis, true),
                'total' => $this->input->post('total_n'.$sw->nis, true),
                'nilai_akhir' => $this->input->post('akhir_n'.$sw->nis, true),
                'kkm' => $this->input->post('kkm', true),
                'id_mengajar' => $id_mengajar
            ];
            $this->nilai_model->save_nilai($data);
        }
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Data Nilai Berhasil ditambah!
                    </div>');
        redirect('guru/nilai');
    }

    // Ini untuk fungsi update nilai
    public function update_nilai_aksi(){
        $this->load->model('siswa_model');
        $id_mengajar = $this->input->post('idm');
        $id_kelas = $this->input->post('idk');
        $siswa = $this->siswa_model->get_by_id_kelas($id_kelas);
        foreach($siswa as $sw){
            $nis = $this->input->post('nis'.$sw->nis);
            $id_nilai = $this->input->post('idn'.$sw->nis);
            $data = [
                'nis' => $sw->nis,
                'ns1' => $this->input->post('n1'.$sw->nis, true),
                'ns2' => $this->input->post('n2'.$sw->nis, true),
                'ns3' => $this->input->post('n3'.$sw->nis, true),
                'ns4' => $this->input->post('n4'.$sw->nis, true),
                'rata1' => $this->input->post('rata_n'.$sw->nis, true),
                'predikat' => $this->input->post('predikat_'.$sw->nis, true),
                'deskripsi' => $this->input->post('deskripsi_'.$sw->nis, true),
                'total' => $this->input->post('total_n'.$sw->nis, true),
                'nilai_akhir' => $this->input->post('akhir_n'.$sw->nis, true),
                'kkm' => $this->input->post('kkm', true),
                'id_mengajar' => $id_mengajar
            ];
            $this->nilai_model->update_nilai($data, $id_nilai);
        }
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Data Nilai Berhasil diperbarui!
                    </div>');
        redirect('guru/nilai');
    }
    

    public function nilai_sikap($nis) {
        $where = array('nis' => $nis);
        $data['detail'] = $this->siswa_model->ambil_kode_siswa($nis);
        $data['sikap'] = $this->nilai_model->get_sikap_by_nis($nis);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('guru/nilai_sikap', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function nilai_sikap_aksi(){
        $this->load->model('siswa_model');
        $data['nis'] = $this->input->post('nis');
        $data['ket'] = $this->input->post('sikap');
        
        $this->nilai_model->save_sikap($data);
        
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Data Nilai Sikap Berhasil ditambah!
                    </div>');
        redirect('guru/siswa');
    }

    public function update_sikap_aksi(){
        $this->load->model('siswa_model');
        $nis = $this->input->post('nis');
        $data['ket'] = $this->input->post('sikap');
        
        $this->nilai_model->update_sikap($data, $nis);
        
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Data Nilai Sikap Berhasil Diupdate!
                    </div>');
        redirect('guru/siswa');
    }
}
?>
