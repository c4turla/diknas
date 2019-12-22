<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {

    public function index()
    {
      $data['title'] = "Info Sekolah";
      $data['description'] = description();
      $data['keywords'] = keywords();
      // get jumlah sd
      $data['jumlahSd'] = $this->db->select('tingkat')->from('sekolah')->where('tingkat', 'sd')->get()->num_rows();
      // get jumlah smp
      $data['jumlahSmp'] = $this->db->select('tingkat')->from('sekolah')->where('tingkat', 'smp')->get()->num_rows();
      // get jumlah paud
      $data['jumlahPaud'] = $this->db->select('tingkat')->from('sekolah')->where('tingkat', 'paud')->get()->num_rows();
      // get jumlah pkbm
      $data['jumlahPkbm'] = $this->db->select('tingkat')->from('sekolah')->where('tingkat', 'pkbm')->get()->num_rows();
      // get jumlah sekolah lembaga kursus
      $data['jumlahLembagaKursus'] = $this->db->select('tingkat')->from('sekolah')->where('tingkat', 'lembaga_kursus')->get()->num_rows();

      // get kecamatan
      $data['kecamatan'] = $this->db->select('kecamatan')->from('sekolah')->distinct()->get()->result_array();

      // get jumlah sekolah per kecamatan
      foreach ($data['kecamatan'] as $key => $value) {
        $data['jumlahPerKecamatan'][$value['kecamatan']] = $this->db->select('kecamatan')->from('sekolah')->where('kecamatan', $value['kecamatan'])->get()->num_rows();
      }
      
      $this->template->load(template().'/template',template().'/sekolah',$data);
    }

    public function daftarPerTingkat()
    {
      $data['title'] = "Info Sekolah";
      $data['description'] = description();
      $data['keywords'] = keywords();
      $data['datatable'] = true;

      $tingkat = $this->uri->segment(3);

      $data['schooltitle'] = $tingkat;
      $joinPertama = $this->db->query("SELECT sekolah.npsn,
                                      sekolah.nama,
                                      sekolah.tingkat,
                                      sekolah.status,
                                      sekolah.desa,
                                      sekolah.kecamatan,
                                      COUNT(siswa.npsn) AS jumlah_siswa
                                      FROM sekolah
                                      LEFT JOIN siswa
                                      ON sekolah.npsn = siswa.npsn
                                      WHERE sekolah.tingkat = '". $tingkat ."'
                                      GROUP BY sekolah.npsn")
                                    ->result();

      $joinKedua = $this->db->query("SELECT sekolah.npsn,
                                      COUNT(guru.npsn) AS jumlah_guru
                                      FROM sekolah
                                      LEFT JOIN guru
                                      ON sekolah.npsn = guru.npsn
                                      WHERE sekolah.tingkat = '". $tingkat ."'
                                      GROUP BY sekolah.npsn")
                                    ->result();

      foreach ($joinPertama as $key => $value) {
        foreach ($joinKedua as $key2 => $value2) {
          if ($value->npsn == $value2->npsn) {
            $joinPertama[$key]->jumlah_guru = $value2->jumlah_guru;
          }
        }
      }

      $data['sekolah'] = $joinPertama;

      $data['jumlahGuru'] = $this->db->query("SELECT COUNT(*) AS total_guru
                                              FROM sekolah
                                              INNER JOIN guru
                                              ON sekolah.npsn = guru.npsn
                                              WHERE sekolah.tingkat = '". $tingkat ."'")
                                            ->result();
      $data['jumlahSiswa'] = $this->db->query("SELECT
                                                COUNT(*)
                                                AS total_siswa
                                                FROM sekolah
                                                INNER JOIN siswa
                                                ON sekolah.npsn = siswa.npsn
                                                WHERE sekolah.tingkat = '". $tingkat ."'")
                                              ->result();
      
      $this->template->load(template().'/template',template().'/daftarsekolah', $data);
    }

    public function daftarPerKecamatan()
    {
      $data['datatable'] = true;
      $data['title'] = "Info Sekolah";
      $data['description'] = description();
      $data['keywords'] = keywords();

      $kecamatan = str_replace("-", " ", $this->uri->segment(3));

      $data['schooltitle'] = $kecamatan;
      
      $tingkat = $this->uri->segment(3);
      $joinPertama = $this->db->query("SELECT sekolah.npsn,
                                      sekolah.nama,
                                      sekolah.tingkat,
                                      sekolah.status,
                                      sekolah.desa,
                                      sekolah.kecamatan,
                                      COUNT(siswa.npsn) AS jumlah_siswa
                                      FROM sekolah
                                      LEFT JOIN siswa
                                      ON sekolah.npsn = siswa.npsn
                                      WHERE sekolah.kecamatan = '". $kecamatan ."'
                                      GROUP BY sekolah.npsn")
                                    ->result();

      $joinKedua = $this->db->query("SELECT sekolah.npsn,
                                      COUNT(guru.npsn) AS jumlah_guru
                                      FROM sekolah
                                      LEFT JOIN guru
                                      ON sekolah.npsn = guru.npsn
                                      WHERE sekolah.kecamatan = '". $kecamatan ."'
                                      GROUP BY sekolah.npsn")
                                    ->result();

      foreach ($joinPertama as $key => $value) {
        foreach ($joinKedua as $key2 => $value2) {
          if ($value->npsn == $value2->npsn) {
            $joinPertama[$key]->jumlah_guru = $value2->jumlah_guru;
          }
        }
      }

      $data['sekolah'] = $joinPertama;

      $data['jumlahGuru'] = $this->db->query("SELECT COUNT(*) AS total_guru
                                              FROM sekolah
                                              INNER JOIN guru
                                              ON sekolah.npsn = guru.npsn
                                              WHERE sekolah.kecamatan = '". $kecamatan ."'")
                                            ->result();
      $data['jumlahSiswa'] = $this->db->query("SELECT
                                                COUNT(*)
                                                AS total_siswa
                                                FROM sekolah
                                                INNER JOIN siswa
                                                ON sekolah.npsn = siswa.npsn
                                                WHERE sekolah.kecamatan = '". $kecamatan ."'")
                                              ->result();


      $this->template->load(template().'/template',template().'/daftarsekolah', $data);
    }

    public function detail()
    {
      $data['datatable'] = true;
      $data['title'] = "Info Sekolah";
      $data['description'] = description();
      $data['keywords'] = keywords();

      $npsn = $this->uri->segment(3);

      $data['sekolah']  = $this->db->select('*')->from('sekolah')->where('npsn', $npsn)->get()->row();

      if (empty($data['sekolah'])) {
        redirect(base_url().'/sekolah');
      }

      $data['guru']     = $this->db->select(['guru.nama', 'guru.nip','guru.nuptk', 'guru.jenis_ptk', 'guru.agama', 'guru.jenis_kelamin', 'guru.golongan', 'guru.pend_terakhir'])
                                    ->from('guru')
                                    ->join('sekolah', 'guru.npsn = sekolah.npsn')
                                    ->where('guru.npsn', $npsn)
                                    ->get()
                                    ->result();
      $data['siswa']     = $this->db->select(['siswa.nis','siswa.nama','siswa.kelas','siswa.jenis_kelamin','siswa.tempat_lahir','siswa.agama','year(curdate())-year(tanggal_lahir) as umur','siswa.alamat'])
                                    ->from('siswa')
                                    ->join('sekolah', 'siswa.npsn = sekolah.npsn')
                                    ->where('siswa.npsn', $npsn)
                                    ->get()
                                    ->result();

      $data['schooltitle'] = $data['sekolah']->nama;

      $this->template->load(template().'/template',template().'/detailsekolah', $data);
    }

}

/* End of file Sekolah.php */
