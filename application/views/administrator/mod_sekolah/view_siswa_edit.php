<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Siswa</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart($this->uri->segment(1).'/editsiswa',$attributes); 
              $exx = explode('-',$rows['tanggal_lahir']);
              $tanggal = $exx[2].'-'.$exx[1].'-'.$exx[0];
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <tr><th width='120px' scope='row'>Nama Siswa</th>    <td><input type='text' class='form-control' name='id' value='$rows[nis]' readonly></td></tr>
                    <tr><th width='120px' scope='row'>Nama Siswa</th>    <td><input type='text' class='form-control' name='a' value='$rows[nama]'></td></tr>
                    <tr><th scope='row'>Kelas</th>    <td><input type='text' class='form-control' name='b' value='$rows[kelas]'></td></tr>
                    <tr><th scope='row'>Jenis Kelamin</th>    <td>"; if ($rows['jenis_kelamin']=='L'){ echo "<input type='radio' name='c' value='L' checked> Laki-laki <input type='radio' name='c' value='P'> Perempuan"; }else{ echo "<input type='radio' name='c' value='L'> Laki-laki <input type='radio' name='c' value='P' checked> Perempuan"; } echo "</td></tr>
                    <tr><th scope='row'>Tempat Lahir</th>    <td><input type='text' class='form-control' name='d' value='$rows[tempat_lahir]'></td></tr>
                    <tr><th scope='row'>Tanggal Lahir</th>    <td><input type='text' class='form-control' id='datepicker' name='e' value='$tanggal'></td></tr>
                    <tr><th scope='row'>Agama</th>    <td><input type='text' class='form-control' name='f' value='$rows[agama]'></td></tr>
                    <tr><th scope='row'>Alamat</th>             <td><textarea class='form-control' name='g' style='height:100px'>$rows[alamat]</textarea></td></tr>
                  </tbody>
                  </table>
                </div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='".base_url().$this->uri->segment(1)."/siswa'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();