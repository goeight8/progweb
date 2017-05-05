
<body>
<!-- header -->
	<?php include 'header.php'; ?>
<!-- //header -->

<!-- sign-up -->
	<div class="login">
		<div class="container">

    <br><br>
			<h3><span>LAPOR</span><br></h3>
			<br>
			<form class="form-horizontal" method="post" action="<?php echo base_url();?>laporan/simpan_laporan" enctype="multipart/form-data">
      
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Judul Laporan</label>

                  <div class="col-sm-10">
                    <input type="text " class="form-control" id="nama_lengkap" name="judullaporan" value="<?php echo set_value('judullaporan'); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Jenis Laporan" class="col-sm-2 control-label">Jenis Laporan</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="jenislaporan" value="<?php echo set_value('username'); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama Pelapor</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="password" name="namapelapor">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No Telp Pelapor</label>

                  <div class="col-sm-10">
                    <input type="text " class="form-control" id="nomorpelapor" name="nomorpelapor" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Lokasi</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="lokasi" name="lokasi">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Isi Laporan</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" id="isilaporan" name="isilaporan"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Gambar</label>

                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="gambar" name="gambar" >
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <input type="submit" name="mysubmit" value="LAPOR">
              </div>
            </form>

			<div class="agile_back_home">
				<a href="<?php echo base_url();?>">back to home</a>
			</div>
		</div>
	</div>
<!-- //sign-up -->

<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>