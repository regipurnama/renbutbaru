<body>
	<div class="container mt-5">
		<div class="row d-flex justify-content-center">
			<div class="col-sm-6 left">
				<div class="row">
					<div class="col-sm-2">
						<div class="circle">
							<img class="img-timeline" src="<?=$post->pp; ?>">
						</div>
					</div>
					<div class="col-sm-10">
						<p class="user-post"><?=$post->username?></p>
						<p class="time">09.00 WIB</p>
						<p class="isi-post"><?=$post->title?></p>
					</div>
				</div>
				<div class="row">
					<?php
					if($post->picture != NULL){
						?>
						<img src="<?= $post->picture;?>" class="pict-post">
						<?php
					}?>
				</div>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
			<div class="col-sm-6">
				<?php
				foreach ($comment as $com) {
					?>
					<hr>
					<div class="row bg-grey">
						<div class="col-sm-2">
							<div class="circle">
								<a href="<?=base_url('C_Profile/detail?id='.$com->id_user);?>"><img class="img-timeline" src="<?=$com->picture?>"></a>
							</div>
						</div>
						<div class="col-sm-10">
							<p class="user-post"><?= $com->username;?></p>
							<p class="time">09.00 WIB</p>
							<p class="isi-post"><?= $com->title;?></p>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
			<div class="col-sm-6 mt-3 left">
				<form action="<?php echo base_url('C_post/savecomment/'); ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_post" value="<?=$post->id_post?>">
					<div class="row">
						<div class="col">
							<textarea name="title" placeholder="Comment dong.." required ></textarea> 
						</div>
					</div>	
					<div class="row">
						<div class="col">
							<input type="submit" name="submit" class="btn btn-primary" value="Comment">
						</div>
					</div>	
				</form>
			</div>
		</div>
		
	</div>
	<div>
	</div>
</body>
</html>