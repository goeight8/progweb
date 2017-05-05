<?php $this->session->userdata('logged_in'); ?>

<body>
<!-- header -->
	<?php include 'header.php'; ?>
<!-- //header -->


<!-- login -->
	<div class="login">
		<div class="container">
			<h3>Selamat Datang.<br><Br> LOGIN ADMIN</H3>

			<form action="<?php echo base_url();?>login/cek_login" method="post">
				<input type="text" name="username" value="User Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User Name';}"> <br>
				<input type="password" name="password" class="lock" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><br>
				<div class="remember">
					 
					<div class="clearfix"> </div>
				</div><br><br>
				<input type="submit"  name="login" value="Login">
			</form>
	
			<div class="agile_back_home">
				<a href="<?php echo base_url();?>">back to home</a>
			</div>
		</div>
	</div>
<!-- //logi
