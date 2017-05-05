<?php include ('headeradmin.php'); ?>
<body>
<div class="agileinfo-work-top">
		<div class="container">
			<div class="w3-agileits-rides-heading">
				<h3 class="w3ls_head">Our Recent <span>Works</span></h3>
			</div>
			<table class="table">
                <thead>
                <tr>
                  <th>ID Laporan</th>
                  <th>Judul Laporan</th>
                  <th>Jenis Laporan</th>
                  <th>Nama Pelapor</th>
                  <th>Nomor Pelapor</th>
                  <th>Lokasi</th>
                  <th>Isi Laporan</th>
                  <th>Gambar</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  if (empty($laporan))
                  {
                    echo "<tr><td colspan=\"9\">Data tidak tersedia</td></tr>";
                  }else
                  {
                     foreach ($laporan as $isi)
                  {
                  ?>
                     <tr height=20>
                             
                            <td><?php print $isi->idlaporan?> </td>
                            <td ><?php print $isi->judullaporan?> </td>
                            <td ><?php print $isi->jenislaporan?></td>
                            <td ><?php print $isi->namapelapor?></td>
                            <td ><?php print $isi->nomorpelapor?></td>
                            <td><?php print $isi->lokasi?></td>
                            <td ><?php print $isi->isilaporan?></td>
                            <td ><?php print $isi->gambar?></td>
                            <td ><?php print $isi->keterangan?></td>
                            
                     </tr>
                     
                     <?php
                   		
                   }}
                   ?>
                </tbody>
                
              </table>
		</div>
	</div>
	</body>
	?>