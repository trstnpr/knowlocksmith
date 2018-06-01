<section class="zip-content">

    <section class="section-zip-wrap">

   		<div class="container">

   			<div class="breadcrumb-wrap">
	    		<ol class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a href="<?php echo base_url('states'); ?>">State</a></li>
					<li><a href="<?php echo base_url('state/'.$city_data->state); ?>"><?php echo $state->state; ?></a></li>
					<li><a href="<?php echo base_url('city/'.$city_data->slug); ?>"><?php echo $city_data->name; ?></a></li>
					<li class="active"><?php echo $zip; ?></li>
				</ol>
			</div>

    		<div class="row">

    			<div class="col-md-12 hidden-lg hidden-md">
    				<div class="mobile-inner-searchform">

						<div class="widget-header">
							<h3><i class="fa fa-search hidden-xs"></i> Search For Locksmiths</h3>
						</div>

						<div class="widget-body">

							<?php include('parts/form-search-aside.php'); ?>

						</div>

				    </div>
    			</div>

    			<div class="col-md-8">

    				<div class="section-content">

    					<div class="content-header">
	    					<h1 class="section-title">
	    						Locksmiths in 
	    						<br class="visible-xs"/>
	    						<strong>
	    							<?php echo $city_data->name.', '.strtoupper($city_data->state).' '.$zip; ?>
	    							<br class="visible-xs"/>
		    						<a href="tel:<?php echo $city_data->phone; ?>">Call <?php echo $city_data->phone; ?></a>
	    						</strong>
	    					</h1>
	    				</div>

						<div class="map-wrap">
    					<?php
	    					if(empty($map_data)) {
	    				?>
	    					<iframe frameborder="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $location; ?>&amp;aq=&amp;sspn=0.111915,0.295601&amp;ie=UTF8&amp;hq=&amp;&amp;t=m&amp;z=6&amp;output=embed" ></iframe>
	    				<?php } else { ?>
	    					<div id="map-overlay"></div>
	    				<?php } ?>
	    				</div>

			    		<div class="zip-promo-wrap">

				    		<div class="promo-item">

				    			<div class="row">

				    				<div class="col-md-3 col-sm-3">
				    					<div class="promo-thumb">
				    						<img class="img-responsive" src="<?php echo base_url($ads_img); ?>" alt="" title="" />
				    					</div>
				    				</div>

				    				<div class="col-md-9 col-sm-9">
										<div class="promo-details">
											<h3>Locksmiths in <br class="visible-xs"/><strong><?php echo ucwords($location); ?></strong></h3>
											<hr/>
											<h2><a href="tel:<?php echo $city_data->phone; ?>">CALL <?php echo $city_data->phone; ?></a></h2>
										</div>
				    				</div>

				    			</div>

				    		</div>

			    		</div>

			    		<div class="service-item-wrap">

			    			<?php

			    				if($google['result'] == 'success') {

			    					if($google['data']->status == 'OK') {
			    						$map_data = array();
			    						$x = 1;
			    						foreach($google['data']->results as $biz) {
			    							$x++;
			    							
			    							$map_data[] = '["'.addslashes($biz->name).'", '.$biz->geometry->location->lat.', '.$biz->geometry->location->lng.']';
			    			?>

						    		<div class="biz-item">

						    			<h3 class="biz-title"><?php echo $biz->name; ?></h3>
										<span class="line hidden-xs"></span>

						    			<div class="row">

						    				<div class="col-md-6 col-sm-6">
												<div class="biz-info">
													<ul class="list-info fa-ul">
														<li><i class="fa fa-map-marker fa-li"></i> <?php echo $biz->vicinity; ?></li>
														<li><i class="fa fa-puzzle-piece fa-li"></i> Locksmith Services</li>
													</ul>
												</div>
						    				</div>

						    				<div class="col-md-6 col-sm-6">
						    					<div class="biz-info">
						    						<ul class="list-info fa-ul">
						    							<li><i class="fa fa-location-arrow fa-li"></i>
						    							<?php
						    								$vicinity = preg_replace('/[^a-z\s]/', '', strtolower($biz->vicinity));
															$vcnty_arr = preg_split('/\s+/', $vicinity, NULL, PREG_SPLIT_NO_EMPTY);
															$city = strtolower($city_data->name);
															if (in_array($city, $vcnty_arr)) {
																echo $city_data->name.', '.strtoupper($city_data->state);
															} else {
																echo 'Near '.$city_data->name.', '.strtoupper($city_data->state);
															}
						    							?>
						    							</li>
						    						</ul>
						    					</div>
						    				</div>

						    			</div>

						    		</div>

				    		

				    		<?php if($x > 10) { break; }; } } else if($google['data']->status == "ZERO_RESULTS") { ?>

				    				<div class="alert alert-warning txt-center" role="alert">
				    					No nearby Locksmith Service available.
				    				</div>

				    			<?php	} else { ?>

				    			<div class="alert alert-warning txt-center" role="alert">
									<?php echo ucwords(strtolower(str_replace('_', ' ', $google['data']->status))); ?>
								</div>

				    		<?php } } else { ?>

				    			<div class="alert alert-danger txt-center" role="alert">
									Oops! Something went wrong. Please comeback later.
								</div>

				    		<?php } ?>
				    		
			    		</div>

			    	</div>

    			</div>

    			<div class="col-md-4">
    				
    				<div class="aside">
    					
    					<div class="inner-searchform hidden-sm hidden-xs">

    						<div class="widget-header">
    							<h3><i class="fa fa-search hidden-xs"></i> Search For Locksmiths</h3>
    						</div>

							<div class="widget-body">

								<?php include('parts/form-search-aside.php'); ?>

							</div>

					    </div>

	    				<?php include('parts/weather-cityzip.php'); ?>

	    				<div class="promo-wrap data-img" data-bg="<?php echo base_url('build/images/banner-bg-5.jpeg'); ?>">
	    					<div class="overlay">
		    					<h3>Locksmiths in<br/><?php echo ucwords($location); ?></h3>
								<h2><a href="tel:<?php echo $city_data->phone; ?>">CALL <?php echo $city_data->phone; ?></a></h2>
							</div>
	    				</div> 

	    				<?php include('parts/widget-aside-recent-blog.php'); ?>

    				</div>

    			</div>

    		</div>

    	</div>

    </section>

</section>