<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa extends CI_Controller {

    private $idBeasiswa = '';

    public function index()
    {
        $data['title']          = "Beasiswa";
        $data['description']    = description();
        $data['keywords']       = keywords();
        $data['bootstrap']      = TRUE;
        
        // cek beasiswa
        $beasiswaTahap1 = $this->db->get_where('beasiswa', ['status_pendaftaran' => '1'], 1, 0)->row();
        $beasiswaTahap2 = $this->db->get_where('beasiswa', ['status_pendaftaran' => '2'], 1, 0)->row();

        $data['tahap'] = 0;

        if (!empty($beasiswaTahap1)) {
            $data['tahap']  = 1;
            $this->idBeasiswa   = $beasiswaTahap1->id;
            $namaBeasiswa       = md5($beasiswaTahap1->id).'_'.str_replace(' ', '_', $beasiswaTahap1->nama);
        }

        if (!empty($beasiswaTahap2)) {
            $data['tahap']  = 2;
            $this->idBeasiswa   = $beasiswaTahap2->id;
            $namaBeasiswa       = md5($beasiswaTahap2->id).'_'.str_replace(' ', '_', $beasiswaTahap2->nama);
        }

        if (!$_POST && !$_FILES) {

            $this->template->load(template().'/template',template().'/beasiswa',$data);

        } else { // jika ada input
            if ($data['tahap'] === 1) {
                // convert input to array object
                $data['input'] = (object) $this->input->post(null, true);

                // load library form validation
                $this->load->library('form_validation');

                // load validation rules
                $validationRules = $this->beasiswaRules();

                // Set if validation error
                $this->form_validation->set_error_delimiters(
                    '<small style="color: red">','</small>'
                );

                // set validation rules
                $this->form_validation->set_rules($validationRules);

                if (!$this->form_validation->run()) {
                    // if validation error to form
                    $this->template->load(template().'/template',template().'/beasiswa',$data);
                } else {
                    if ($_FILES['khs_semester_ganjil']['size'] == 0 || $_FILES['surat_permohonan']['size'] == 0 || $_FILES['ktp']['size'] == 0 || $_FILES['kartu_keluarga']['size'] == 0 || $_FILES['surat_keterangan_tidak_mampu']['size'] == 0 || $_FILES['kartu_mahasiswa']['size'] == 0 || $_FILES['surat_keterangan_aktif_kuliah']['size'] == 0 || $_FILES['akreditasi_prodi']['size'] == 0 || $_FILES['pdpt']['size'] == 0 || $_FILES['surat_keterangan_mahasiswa']['size'] == 0 || $_FILES['foto']['size'] == 0) {
                        $this->session->set_flashdata('berkas-error', '
                                                        <div id="message-error">
                                                            Berkas harus diisi. 
                                                            <button type="button" id="close-btn">X</button>
                                                        </div>'
                                                    );
                        $this->template->load(template().'/template',template().'/beasiswa',$data);
                    } else {

                        // buat folder jika tidak folder bernama judul beasiswa
                        if (!is_dir('./asset/beasiswa/'.$namaBeasiswa)) {
                            mkdir('./asset/beasiswa/'.$namaBeasiswa, 0777, TRUE);
                        }

                        if (!is_dir('./asset/beasiswa/'.$namaBeasiswa.'/'.$data['input']->nim.'-'.str_replace(' ', '_', $data['input']->nama))) {
                            mkdir('./asset/beasiswa/'.$namaBeasiswa.'/'.$data['input']->nim.'-'.str_replace(' ', '_', $data['input']->nama), 0777, TRUE);
                        }
                        // buat folder mahasiswa

                        $this->load->library('upload'); // Load librari upload

                        // jumlah file upload
                        $jumlahFileUpload = count($_FILES);

                        $config['upload_path'] = "./asset/beasiswa/$namaBeasiswa/".$data['input']->nim."-".str_replace(' ', '_', $data['input']->nama)."";
                        $config['max_size']  = '1000000';
                        $config['overwrite'] = true;

                        $upload = FALSE;

                        for ($i=0; $i < $jumlahFileUpload; $i++) {
                            $fileName = array_keys($_FILES)[$i];

                            $config['allowed_types'] = 'pdf';
                            if ($fileName == 'foto') {
                                $config['allowed_types'] = 'jpg|png||jpeg';
                            }

                            $config['file_name'] = $fileName;

                            // Load konfigurasi uploadnya
                            $this->upload->initialize($config);

                            if(!$this->upload->do_upload($fileName)) {
                                break;
                                $upload = FALSE;
                                $this->session->set_flashdata('berkas-error', '
                                                                <div id="message-error">
                                                                    Berkas tidak dapat diterima sistem. 
                                                                    <button type="button" id="close-btn">X</button>
                                                                </div>'
                                                            );
                                $this->template->load(template().'/template',template().'/beasiswa',$data);
                            } else {
                                $upload = TRUE;
                                $data['input']->{$fileName} = $this->upload->data('file_name');
                            }
                        }

                        // jika upload berhasil
                        if ($upload === TRUE) {
                            // jika rekening perguruan tinggi kosong
                            if ($_FILES['rekening_perguruan_tinggi']['size'] == 0) {
                                $data['input']->rekening_perguruan_tinggi = '';
                            }

                            // jika rekening prestasi kosong
                            if ($_FILES['prestasi']['size'] == 0) {
                                $data['input']->prestasi = '';
                            }

                            $jumlahInput = count($data['input']);

                            $loop = FALSE;
                            // pisahakan identitas mahasiswa
                            foreach ($data['input'] as $key => $value) {
                                if ($key == 'nama') {
                                    $loop = TRUE;
                                }

                                if ($key == 'nama_ayah') {
                                    $loop = FALSE;
                                }

                                if ($loop === FALSE) {
                                    continue;
                                }

                                $identitas_mahasiswa->$key = $value;
                            }
                            $identitas_mahasiswa->foto = $data['input']->foto;
                            $identitas_mahasiswa->tanggal_lahir = date("Y-m-d", strtotime($identitas_mahasiswa->tanggal_lahir));

                            // pishakan identitas_wali
                            foreach ($data['input'] as $key => $value) {
                                if ($key == 'nama_ayah') {
                                    $loop = TRUE;
                                }

                                if ($key == 'foto') {
                                    $loop = FALSE;
                                }

                                if ($loop === FALSE) {
                                    continue;
                                }

                                $identitas_wali->$key = $value;
                            }

                            // pishakan dokumen beasiswa
                            foreach ($data['input'] as $key => $value) {
                                if ($key == 'khs_semester_ganjil') {
                                    $loop = TRUE;
                                }

                                if ($loop === FALSE) {
                                    continue;
                                }

                                $dokumen_beasiswa->$key = $value;
                            }

                            $this->db->insert('identitas_mahasiswa', $identitas_mahasiswa);
                            $id_biodata_mahasiswa = $this->db->insert_id();
                            $this->db->insert('identitas_wali', $identitas_wali);
                            $id_biodata_wali = $this->db->insert_id();
                            $this->db->insert('dokumen_beasiswa', $dokumen_beasiswa);
                            $id_dokumen = $this->db->insert_id();
                            
                            $penerima_beasiswa->nim = $data['input']->nim;
                            $penerima_beasiswa->no_regis = $data['input']->no_ktp;
                            $penerima_beasiswa->id_biodata_mahasiswa = $id_biodata_mahasiswa;
                            $penerima_beasiswa->id_biodata_wali = $id_biodata_wali;
                            $penerima_beasiswa->id_dokumen = $id_dokumen;
                            $penerima_beasiswa->id_beasiswa = $this->idBeasiswa;
                            $penerima_beasiswa->tahap = '1';
                            $penerima_beasiswa->status = '0';


                            if($this->db->insert('penerima_beasiswa', $penerima_beasiswa)) {
                                $this->session->set_userdata('no_regis',$no_regis);
 
                                $this->session->set_flashdata('success', '
                                                                <div id="message-success">
                                                                    Selamat Anda Berhasil Terdaftar Sebagai Calon Penerima Beasiswa Germbira Cerdas, Silahkan Download Formulir Bukti Pendaftaran Online <a href="'.base_url().'beasiswa/print/".$this->session->no_regis.""> Download </a>.
                                                                </div>'
                                                            );
                                redirect('beasiswa');

                            } else {
                                $this->session->set_flashdata('berkas-error', '
                                                                <div id="message-error">
                                                                    Pendaftaran Gagal Dilakukan, Silahkan Ulangi Kembali Pendaftaran.
                                                                    <button type="button" id="close-btn">X</button>
                                                                </div>'
                                                            );
                                $this->template->load(template().'/template',template().'/beasiswa',$data);
                            }
                        }
                    }
                }

                
            }
            
            if ($data['tahap'] === 2) {
                $this->pendaftaranTahapKedua();
            }
        }
    }


    public function beasiswaRules()
    {
        $config = [
            [
                'field' => 'nim',
                'label' => 'NIM',
                'rules' => 'required|max_length[100]|trim|callback_checkNim'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|max_length[255]|trim'
            ],
            [
                'field' => 'tempat_lahir',
                'label' => 'Tempat Lahir',
                'rules' => 'required|max_length[100]|trim'
            ],
            [
                'field' => 'tanggal_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'trim|required|callback_checkDateFormat'
            ],
            [
                'field' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'required|callback_check_jenis_kelamin',
            ],
            [
                'field' => 'no_ktp',
                'label' => 'Nomor KTP',
                'rules' => 'required|max_length[255]|trim'
            ],
            [
                'field' => 'no_kk',
                'label' => 'Nomor KK',
                'rules' => 'trim|required|max_length[255]'
            ],
            [
                'field' => 'alamat_kampus',
                'label' => 'Alamat Kampus',
                'rules' => 'trim|required|max_length[255]'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'trim|required|max_length[255]'
            ],
            [
                'field' => 'kota',
                'label' => 'Kota',
                'rules' => 'trim|required|max_length[200]'
            ],
            [
                'field' => 'no_telpon',
                'label' => 'Nomor Telepon',
                'rules' => 'trim|required|max_length[20]'
            ],
            [
                'field' => 'asal_kampus',
                'label' => 'Asal Kampus',
                'rules' => 'trim|required|max_length[255]'
            ],
            [
                'field' => 'program_studi',
                'label' => 'Program Studi',
                'rules' => 'trim|required|max_length[200]'
            ],
            [
                'field' => 'semester',
                'label' => 'Semester',
                'rules' => 'trim|required|max_length[10]'
            ],
            [
                'field' => 'nama_ayah',
                'label' => 'Nama Ayah',
                'rules' => 'trim|max_length[255]|callback_validasi_wali'
            ],
            [
                'field' => 'nama_ibu',
                'label' => 'Nama Ibu',
                'rules' => 'trim|max_length[255]|callback_validasi_wali'
            ],
            [
                'field' => 'nama_wali',
                'label' => 'Nama Wali',
                'rules' => 'trim|max_length[255]|callback_validasi_wali'
            ],
            [
                'field' => 'pekerjaan',
                'label' => 'Pekerjaan Wali',
                'rules' => 'trim|max_length[255]|required'
            ],
            [
                'field' => 'alamat_wali',
                'label' => 'Alamat Orang Tua / Wali',
                'rules' => 'trim|max_length[255]|required'
            ],
            [
                'field' => 'kota_wali',
                'label' => 'Kota Orang Tua / Wali',
                'rules' => 'trim|max_length[255]|required'
            ],
            [
                'field' => 'penghasilan',
                'label' => 'Penghasilan Orang Tua / Wali',
                'rules' => 'trim|max_length[255]|required'
            ],
            [
                'field' => 'kota_wali',
                'label' => 'Kota Orang Tua / Wali',
                'rules' => 'trim|max_length[255]|required'
            ],
            [
                'field' => 'no_telpon_wali',
                'label' => 'Nomor Telepon Orang Tua / Wali',
                'rules' => 'trim|max_length[20]|required'
            ],
        ];

        return $config;
    }

    function checkNim () {

        $this->load->library('form_validation');

        $nim = $this->input->post('nim');

        $this->db->select('*');
        $this->db->from('penerima_beasiswa');
        $this->db->join('beasiswa', 'penerima_beasiswa.id_beasiswa = beasiswa.id', 'inner');
        $this->db->where(['status_pendaftaran' => '1', 'nim' => $nim, 'beasiswa.id' => $this->idBeasiswa]);
        $mahasiswa = $this->db->get()->result();

        if (!empty($mahasiswa)) {
            $this->form_validation->set_message('checkNim', 'Mahasiswa telah terdaftar.');
            return false;
        }

        return true;
        
    }

    public function checkDateFormat () {
        
        $this->load->library('form_validation');

        $date = $this->input->post('tanggal_lahir');

        list($dd,$mm,$yyyy) = explode('/',$date);
        if (!checkdate($mm,$dd,$yyyy)) {
            return true;
        }

        $this->form_validation->set_message('checkDateFormat', 'Format tanggal tidak benar.');
        return false;
    }

    public function check_jenis_kelamin () {

        $input = $this->input->post('jenis_kelamin');
        if ($input == 'L' || $input == 'P') {
            return TRUE;
        }

        $this->load->library('form_validation');

        $this->form_validation->set_message('check_jenis_kelamin', 'Jenis kelamin tidak benar.');

        return FALSE;

    }

    function validasi_wali () {

        $ayah   = $this->input->post('nama_ayah');
        $ibu    = $this->input->post('nama_ibu');
        $wali   = $this->input->post('nama_wali');

        if (!empty($ayah) || !empty($ibu) || !empty($wali)) {
            return TRUE;
        }

        $this->load->library('form_validation');

        $this->form_validation->set_message('validasi_wali', 'Identitas wali tidak boleh kosong.');
        
        return FALSE;

    }

    function pendaftaranTahapKedua() {
        if (!$_POST) {
            redirect('beasiswa');
        }

        $nim = $this->input->post('nim');

        if (empty($nim) || $_FILES['khs_semester_genap']['size'] == 0) {
            $this->session->set_flashdata('berkas-error', '
                                            <div id="message-error">
                                                Formulir belum diisi lengkap.
                                                <button type="button" id="close-btn">X</button>
                                            </div>'
                                        );
            redirect('beasiswa');
        }

        $this->db->select(['nim', 'dokumen_beasiswa.id', 'identitas_mahasiswa.nama', 'beasiswa.nama AS `nama_beasiswa`', 'tahap', 'beasiswa.id AS id_beasiswa']);
        $this->db->from('penerima_beasiswa');
        $this->db->join('beasiswa', 'penerima_beasiswa.id_beasiswa = beasiswa.id', 'inner');
        $this->db->join('identitas_mahasiswa', 'penerima_beasiswa.id_biodata_mahasiswa = identitas_mahasiswa.id', 'inner');
        $this->db->join('identitas_wali', 'penerima_beasiswa.id_biodata_wali = identitas_wali.id', 'inner');
        $this->db->join('dokumen_beasiswa', 'penerima_beasiswa.id_dokumen = dokumen_beasiswa.id', 'inner');
        $this->db->where(['status_pendaftaran' => '2', 'nim' => $nim, 'beasiswa.id' => $this->idBeasiswa]);
        $mahasiswa = $this->db->get()->row();

        if (empty($mahasiswa) || $mahasiswa->tahap == '2') {
            $this->session->set_flashdata('berkas-error', '
                                            <div id="message-error">
                                                Identitas ini tidak bisa mendaftar.
                                                <button type="button" id="close-btn">X</button>
                                            </div>'
                                        );
            redirect('beasiswa');
        }

        $this->load->library('upload'); // Load librari upload

        $config['upload_path']      = "./asset/beasiswa/".md5($mahasiswa->id_beasiswa)."_".str_replace(' ', '_',$mahasiswa->nama_beasiswa)."/".$mahasiswa->nim."-".str_replace(' ', '_', $mahasiswa->nama)."";
        $config['max_size']         = '1000000';
        $config['overwrite']        = true;
        $config['allowed_types']    = 'pdf';
        $config['file_name']        = 'khs_semester_genap';

        // Load konfigurasi uploadnya
        $this->upload->initialize($config);

        if(!$this->upload->do_upload('khs_semester_genap')) {
            $this->session->set_flashdata('berkas-error', '
                                            <div id="message-error">
                                                Unggah berkas gagal.
                                                <button type="button" id="close-btn">X</button>
                                            </div>'
                                        );
            redirect('beasiswa');
        }

        $fileName = $this->upload->data('file_name');

        if(!$this->db->set('khs_semester_genap', $fileName)->where('id', $mahasiswa->id)->update('dokumen_beasiswa')) {
            $this->session->set_flashdata('berkas-error', '
                                            <div id="message-error">
                                                Gagal memasukkan data.
                                                <button type="button" id="close-btn">X</button>
                                            </div>'
                                        );
            redirect('beasiswa');
        }

        if(!$this->db->set('tahap', '2')->where('nim', $mahasiswa->nim)->update('penerima_beasiswa')) {
            $this->session->set_flashdata('berkas-error', '
                                            <div id="message-error">
                                                Gagal memasukkan data.
                                                <button type="button" id="close-btn">X</button>
                                            </div>'
                                        );
            redirect('beasiswa');
        }

        $this->session->set_flashdata('success', '
                                            <div id="message-success">
                                                Berhasil mendaftarkan beasiswa.
                                            </div>'
                                        );
        redirect('beasiswa');
        
    }
}

/* End of file Beasiswa.php */
