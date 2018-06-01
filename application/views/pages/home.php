<div class="home-content">

    <section class="section-banner data-img" data-bg="<?php echo base_url('build/images/banner-bg-5.jpeg'); ?>">
      
		<div class="overlay">

			<div class="container">

				<div class="row">

					<div class="col-md-10 col-md-offset-1">

						<div class="banner-brand">
							<img src="<?php echo base_url('build/images/logo-sh.png'); ?>" class="img-responsive center-block" alt="<?php echo SITE_TITLE; ?>" title="<?php echo SITE_TITLE; ?>" />
						</div>

						<div class="tagline-cta">
							
							<h1><?php echo the_config('tag_line'); ?></h1>

						</div>

						<div class="banner-search-wrap">

							<div class="row">

								<div class="col-md-8 col-md-offset-2">

									<div class="search-panel">

										<form class="search-directory" method="GET" action="<?php echo base_url('search'); ?>" data-validate="<?php echo base_url('search/validate?location='); ?>">
											<label>Search for Locksmith Services</label>
											<div class="input-group">

												<input type="text" class="form-control input-lg keyword" name="location" placeholder="Type your City or Zipcode ..." onKeyUp="strip_char()" id="keyword" data-suggest="<?php echo base_url('search/suggest'); ?>" required />
												<span class="input-group-btn">
													<button type="submit" class="btn search-btn btn-lg" type="button" title="Search for Locksmith NOW!"><span class="hidden-xs">Search</span><span class="visible-xs"><i class="fa fa-search"></i></span></button>
												</span>
											</div>

										</form>

									</div>

								</div>

							</div>

						</div>


					</div>

				</div>

			</div>

		</div>

	</section>

	<section class="section-search hidden" id="section-search">

		<div class="container">
			
			<div class="row">

				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">

					<div class="homesearch-wrap">

						<h2 class="form-title">Search For Locksmiths</h2>

						<?php include('parts/form-search.php'); ?>

					</div>

				</div>

			</div>

		</div>

	</section>

    <section class="section-featsvc">

		<div class="container">
	    
		    <div class="section-title">
		      <h2>Notable Locksmiths</h2>
		      <span class="line center-block"></span>
		    </div>

			<div class="featsvc-wrap">

			    <?php if($google['result'] == 'success' AND $google['data']->status == 'OK') { ?>

				<div class="row">

					<!-- <?php for($x=0;$x<4;$x++) { ?>
			    
			    	<div class="col-md-3 col-sm-6">
						<div class="svc-item">
							<div class="svc-thumbnail hidden-xs">
								
								<img src="https://s3-media1.fl.yelpcdn.com/bphoto/Ks0SD71fqLYv1L378jgP_g/o.jpg" alt="Locksmith" title="Locksmith">
								
							</div>
							<div class="svc-info">
								<div class="svc-details">
									<h3 class="svc-title">A Square Deal Locksmith</h3>
									<ul class="list-default">
										<li><i class="fa fa-puzzle-piece fa-list"></i> Locksmith Services</li>
										<li><i class="fa fa-map-marker fa-list"></i> San Antonio, TX</li>
									</ul>
									<br/>
									<a href="#" class="btn btn-phone btn-sm btn-block">(863) 370-9788</a>
								</div>
							</div>
						</div>
					</div>
					<?php } ?> -->

					

					<?php
						$x = 0;
						foreach($google['data']->results as $biz) {
							$x++;
							$coordinates = $biz->geometry->location->lat.','.$biz->geometry->location->lng;
							$img = 'https://maps.googleapis.com/maps/api/staticmap?zoom=15&size=500x500&scale=2&maptype=roadmap&sensor=false&language=en&markers=color:red|'.$coordinates.'&key=AIzaSyALzye2aiDH_TN7BdBb6aqnB9JjDwrf6rM';
					?>
					<div class="col-md-3 col-sm-6">

						<div class="card svc-item">
			                <div class="card-image item-img">
			                    <img class="img-responsive" src="<?php echo $img; ?>" alt="img" title="img">
			                    <span class="item-cat"><i class="fa fa-lock"></i> Locksmith Services</span>
			                </div>
			                
			                <div class="card-content item-content">
			                    <span class="card-title card-show"><?php echo $biz->name; ?></span>
			                </div>
			                <div class="card-reveal item-info">

			                	<button type="button" class="card-close btn-close">
			                		<i class="fa fa-times"></i>
			                	</button>

			                   <p class="card-title"><?php echo $biz->name; ?></p>
			                   
			                	<ul class="list-default">
									<li>Locksmith Services</li>
									<li><?php echo $biz->vicinity; ?></li>
								</ul>

			                </div>
			            </div>

					</div>

					<?php if($x >= 4) { break; } } ?>
			    	
				</div>

				<?php } ?>

			</div>

		</div>

	</section>

	<section class="section-blogs">

		<div class="container">

			<div class="section-title">
		      <h2>Blog</h2>
		      <span class="line center-block"></span>
		    </div>

		    <?php
		    $home_blogs = recent_blog(3);
		    if(!empty($home_blogs)) {
		    ?>

		    <div class="blog-wrap">

				<div class="row">

					<?php
						foreach($home_blogs as $hblog) {
							$thumb = ($hblog->featured_image != NULL) ? base_url($hblog->featured_image) : base_url('build/images/placeholder.jpg') ;
					?>

					<div class="col-md-4">

						<div class="blog-item">

							<div class="blog-thumb">
								<img src="<?php echo $thumb; ?>" class="img-responsive" alt="<?php echo $hblog->title; ?>" title="<?php echo $hblog->title; ?>" />
							</div>

							<div class="blog-content">

								<span class="blog-date">Posted on <?php echo date_proper($hblog->created_at); ?></span>

								<h3 class="blog-title"><?php echo truncate($hblog->title, 30); ?></h3>

								<p class="blog-excerpt">
									<?php echo truncate($hblog->excerpt, 150); ?> 
								</p>

								<br/>

								<a href="<?php echo base_url($hblog->slug); ?>" class="btn btn-primary">Read more</a>

							</div>

						</div>

					</div>

					<?php } ?>

				</div>

			</div>

			<?php } ?>

		</div>

	</section>

	<section class="section-majorcity" id="key_areas">



		<div class="row whole-section">
			<div class="col-md-6 hidden-xs hidden-sm tile-section data-img" data-bg="<?php echo base_url('build/images/banner-bg-6.jpg'); ?>" >
				<div class="overlay">
					<div class="section-title">
				    	<h2>Key Areas</h2>
				    </div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 tile-section" >
				<div class="content-wrap">
					<div class="section-title hidden-lg hidden-md">
				    	<h2>Key Areas</h2>
				    	<span class="line center-block"></span>
				    </div>

					<?php include('parts/major-city.php'); ?>
				</div>
			</div>

		</div>


	</section>

	<section class="section-social">

		<div class="container">

			<div class="row">

				<div class="col-md-6">

					<div class="section-title">

						<h2>Follow <?php echo SITE_TITLE; ?> on Social</h2>

					</div>

				</div>

				<div class="col-md-2">
					<a href="<?php echo the_config('facebook_link'); ?>" target="_blank" class="btn btn-lg btn-primary btn-block btn-social"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Facebook</a>
				</div>

				<div class="col-md-2">
					<a href="https://twitter.com/KnowLocksmith" target="_blank" class="btn btn-lg btn-info btn-block btn-social"><i class="fa fa-twitter"></i>&nbsp;&nbsp;Twitter</a>
				</div>

				<div class="col-md-2">
					<a href="https://www.pinterest.com/knowlocksmith" target="_blank" class="btn btn-lg btn-danger btn-block btn-social"><i class="fa fa-pinterest"></i>&nbsp;&nbsp;Pinterest</a>
				</div>

				<!-- <div class="col-md-10 col-md-offset-1">

					<div class="row">

						<div class="col-md-8">

							<div class="section-title">

								<h2>Follow Locksmithub on Social</h2>

							</div>

						</div>

						<div class="col-md-4">

							<div class="footer-social">

								<ul class="social-btn social-wrap">

									<li>
										<a href="https://www.facebook.com/Locksmithub-184530895418937/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
									</li>
									<li>
										<a href="https://twitter.com/off_locksmithub" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
									</li>

									<li>
										<a href="https://plus.google.com/b/100804041340548742661/100804041340548742661" target="_blank" title="Google Plus"><i class="fa fa-google-plus"></i></a>
									</li>

								</ul>

							</div>

						</div>

					</div>

				</div> -->

			</div>

		</div>

	</section>
	
</div>