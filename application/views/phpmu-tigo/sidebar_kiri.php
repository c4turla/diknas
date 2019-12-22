<div class="block">
	<h2 style='color: #dd8229;border-bottom: 2px solid #dd8229;' class="list-title">Sekilas Info</h2>
	<ul class="article-block">
		<?php 
			$sekilas = $this->model_utama->view_ordering_limit('sekilasinfo','id_sekilas','DESC',0,2);
			foreach ($sekilas->result_array() as $row) {	
			$tgl = tgl_indo($row['tgl_posting']);
			echo "<li>
					<div class='article-photo'>";
						if ($row['gambar'] ==''){
							echo "<a href='#' class='hover-effect'><img style='width:59px; height:42px;' src='".base_url()."asset/foto_info/small_no-image.jpg' alt='' /></a>";
						}else{
							echo "<a href='#' class='hover-effect'><img style='width:59px; height:42px;' src='".base_url()."asset/foto_info/$row[gambar]' alt='' /></a>";
						}
					echo "</div>
					<div class='article-content'>
						<h4><a href='#'>$row[info]</a></h4>

					</div>
				  </li>";
			}
		?>
	</ul>
</div>

<div class="block">
	<h2 class="list-title" style="color: green;border-bottom: 2px solid green;">Link Terkait</h2>
	<ul class="article-list">
		<?php
		  $banner = $this->model_utama->view_ordering_limit('banner','id_banner','ASC',0,5);
		  foreach ($banner->result_array() as $b) {
					echo "<li><a target='_BLANK' href='$b[url]'>$b[judul]</a></li>";
		  }
		?>
	</ul>
</div>

<div class="block">
  <h2 style='color:#000; border-bottom: 2px solid #000;' class="list-title">Berita Foto</h2>
  <div class="latest-galleries">
	  <div class="gallery-widget">
		  <div class="gallery-photo" rel="hover-parent">
			  <a href="#" class="slide-left icon-text"></a>
			  <a href="#" class="slide-right icon-text"></a>
			  <ul rel="4">
				  <?php 
				  	$album = $this->model_utama->view_where_ordering_limit('album',array('aktif' => 'Y'),'id_album','RANDOM',0,4);
					foreach ($album->result_array() as $row) {
					$jumlah = $this->model_utama->view_where('gallery',array('id_album' => $row['id_album']))->num_rows();
					echo "<li> 
							  <a href='".base_url()."albums/detail/$row[album_seo]' class='hover-effect delegate'>
								  <span class='cover'><i></i>
								  <img width='100%' src='".base_url()."asset/img_album/$row[gbr_album]' alt='$row[jdl_album] - (Ada $jumlah foto)'></span>
							  </a>
						  </li>";
					}
				  ?>
			  </ul>								
		  </div>		
	  </div>	
  </div>	
</div>


<div class="block">
	<div class="banner">
		<?php
		  $pasangiklan = $this->model_utama->view_ordering_limit('pasangiklan','id_pasangiklan','ASC',0,1);
		  foreach ($pasangiklan->result_array() as $b) {
			$string = $b['gambar'];
			if ($b['gambar'] != ''){
				if(preg_match("/swf\z/i", $string)) {
					echo "<embed src='".base_url()."asset/foto_pasangiklan/$b[gambar]' width=250 height=200 quality='high' type='application/x-shockwave-flash'>";
				} else {
					echo "<a href='$b[url]' target='_blank'><img style='width:250px;' src='".base_url()."asset/foto_pasangiklan/$b[gambar]' alt='$b[judul]' /></a>
						  <a href='$b[url]' class='ad-link'><span class='icon-text'>&#9652;</span>$b[judul]<span class='icon-text'>&#9652;</span></a>";
				}
			}
		  }
		?>
	</div>
</div>

