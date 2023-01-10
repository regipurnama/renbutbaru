<body>
	<div class="container mt-5">
		<div class="d-flex justify-content-center mb-2">
			<?php echo $this->session->flashdata('status'); ?>
		</div>
		<form action="<?php echo base_url('C_post/savepost/'); ?>" method="post" enctype="multipart/form-data">
			<div class="row d-flex justify-content-center">
				<div class="col-sm-6">
					<textarea name="title" placeholder="Kicau dong.." required ></textarea> 
				</div>
			</div>	
			<div class="row d-flex justify-content-center">
				<div class="col-sm-6">
					<div class="pull-left">
						<input type="file" name="picture">
					</div>
					<div class="pull-right">
						<input type="submit" name="submit" class="btn btn-primary" value="Kicaukan">
					</div>
				</div>
			</div>	
		</form>
	</div>
	<div class="container mt-2">
		<div class="row">
			<div class="col-md-12">
				<div class="main-timeline">
					<?php
					foreach ($posts as $post) {
						?>
						<div class="timeline">
							<div class="timeline-icon">
								<a href="<?=base_url('C_Profile/detail?id='.$post->id_user);?>">
									<img class="img-timeline" src="<?= $post->pp;?>">
								</a>
							</div>
							<div class="timeline-content">
								<h3 class="title"><?= $post->username;?></h3>
								<p class="time">09.00 WIB</p>
								<div class="description desc-timeline">
									<?= $post->title;?>
								</div>
								<div class="container-img-post">
									<?php
									if($post->picture != NULL){
										?>
										<img src="<?= $post->picture;?>" class="img-post">
										<?php
									}?>
								</div>
								<hr>
								<div class="act-post">
									<?php
									if(!$post->stat){

										?>
										<a href="<?=base_url('C_Post/likesfrompost?id='.$post->id_post)?>"><?=$post->sum_like?> <i class="fa fa-thumbs-o-up grey"></i></a>
										<?php
									}
									else{
										?>
										Anda menyukai kicauan ini,  &nbsp &nbsp &nbsp <a href="<?=base_url('C_Post/unlikesfrompost?id='.$post->id_post)?>">   <i class="fa fa-thumbs-o-up"></i><?=$post->sum_like?></a>
										<?php
									}
									?>
									<a href="<?=base_url('C_Post/post?id='.$post->id_post)?>" class="ml-15"><i class="fa fa-comments-o"></i> <?=$post->sum_comment?> komentar </a>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>		
	</div>
</body>
</html>