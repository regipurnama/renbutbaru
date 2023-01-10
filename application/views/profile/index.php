<body>
	<div class="container">
		<div class="row mt-4">
			<h3>Ubah Profil</h3>
		</div>
		<?php echo $this->session->flashdata('status'); ?>
		<form action="<?php echo base_url('C_Profile/updateprofile'); ?>" method="POST" enctype="multipart/form-data"> 
			<div class="row">
				<div class="col mt-3">
					<input type="hidden" name="id_user" value="<?php echo "$profile->id_user"; ?>">
					<input type="hidden" name="old_picture" value="<?php echo "$profile->picture"; ?>">
					<input type="hidden" name="old_password" value="<?php echo "$profile->password"; ?>">
					<p>Name : </p>
					<input type="text" name="name" value="<?php echo "$profile->name"; ?>" class="form-control">
				</div>
				<div class="col mt-3">
					<p>Username : </p>
					<input type="text" name="username" value="<?php echo "$profile->username"; ?>" class="form-control">
				</div><div class="col mt-3">
					<p>New Password : </p>
					<input type="password" name="password"  class="form-control">
				</div>
				
			</div>
			<div class="row">
				<div class="col mt-3">
					<p>Email : </p>
					<input type="email" name="email" value="<?php echo "$profile->email"; ?>" class="form-control">
				</div>
				<div class="col mt-3">
					<p>Bio : </p>
					<input type="text" name="bio" value="<?php echo "$profile->bio"; ?>" class="form-control">
				</div>
				<div class="col mt-3">
					<p>Hobby : </p>
					<input type="text" name="hobby" value="<?php echo "$profile->hobby"; ?>" class="form-control">
				</div>
			</div>
			<?php if($profile->gender == 'L'){ ?>
				<div class="row">
					<div class="col-lg-12" >
						<div class="card">
							<div class="card-body">
								<input type="radio" name="gender"   value="L" checked="checked"	> Laki-Laki <br/>
								<input type="radio" name="gender"   value="P"> Perempuan <br/>	
							</div>
						</div>
					</div>
				</div>
				

			<?php }else{ ?>
				<div class="row mt-3">
					<div class="col-lg-12" >
						<div class="card">
							<div class="card-body">
								<input type="radio" name="gender"  value="L"> Laki-Laki <br/>	
								<input type="radio" name="gender"   value="P" checked="checked"> Perempuan <br/>	
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="row mt-3">
				<div class="col-lg-12" >
					<div class="card">
						<div class="card-body">
							<img src="<?php echo "$profile->picture"; ?>" width="auto" height="50px">	
							
						</div>
					</div>
					<input type="file" name="picture"> 
				</div>
			</div>
			
			
			<div class="row center">
				<div class="col-lg-12" >
					<input type="submit" class="btn btn-primary" value="Update"> 
				</div>
			</div>
			
		</div>
	</form>
</div>

</body>
</html>