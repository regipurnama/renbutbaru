<body>
	<div class="container">
		<div class="col-sm-12 d-flex justify-content-center">
			<div class="col-sm-6 bg-profil mt-5">
				<div class="row d-flex justify-content-center">
					<div class="col-sm-6 center mt-5">
						<img class="img-detail" src="<?php echo $profile->picture; ?>">
					</div>
				</div>
				<div class="row d-flex justify-content-center">
					<div class="col-sm-6 center mt-2">
						<h1><?php echo $profile->name; ?></h1>
						<p><?php echo $profile->bio; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>