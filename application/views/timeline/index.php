
<body>
	<?php //var_dump($posts);die;?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="main-timeline">
					<?php
					foreach ($posts as $post) {
						?>
						<div class="timeline">
							<div class="timeline-icon">
								<a href="<?=base_url('C_Profile/detail?id='.$post->id_user);?>"><img class="img-timeline" src="<?= $post->pp;?>"></a>
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
										if(!$post->user_like){

										?>
											<a href="<?= base_url('C_Post/likes?id='.$post->id_post)?>"><?=$post->sum_like?> <i class="fa fa-thumbs-o-up grey"></i></a>
										<?php
										}
										else{
											?>
											Anda menyukai kicauan ini,  &nbsp &nbsp &nbsp <a href="<?=base_url('C_Post/unlikes?id='.$post->id_post)?>">   <i class="fa fa-thumbs-o-up"></i><?=$post->sum_like?></a>
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