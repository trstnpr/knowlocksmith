<?php
	$state = $state_arr[0];
?>

<div class="state-content">

    <section class="section-state-wrap">

    	<div class="container">

    		<div class="breadcrumb-wrap">
	    		<ol class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a href="<?php echo base_url('states'); ?>">State</a></li>
					<li class="active"><?php echo $state->state; ?></li>
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
	    					<h1 class="section-title">Cities in <strong><?php echo $state->state; ?></strong></h1>
	    				</div>

	    				<div class="map-wrap">
	    					<iframe frameborder="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $state->state.', '.$state->abbrev; ?>&amp;aq=&amp;sspn=0.111915,0.295601&amp;ie=UTF8&amp;hq=&amp;&amp;t=m&amp;z=7&amp;output=embed" ></iframe>
	    				</div>
			    		
			    		<div class="cities-wrap">

		    				<?php if(!empty($cities)) { ?>

		    					<div class="row">

		    						<?php

		    							foreach($cities as $city) {
		    								$state_abbrev = $city->state;
		    								$city_name = strtolower(str_replace(' ', '-', $city->name));
			    							$city_url =  base_url('city/'.$city_name.'-'.$state_abbrev);
		    						?>

		    						<div class="col-md-4 col-sm-6 city-item">
		    						
		    							<a href="<?php echo $city_url; ?>" class="list-state">
		    								<i class="fa fa-location-arrow"></i> <?php echo $city->name; ?>
		    							</a>
			    							
			    					</div>

			    					<?php } ?>

		    					</div>

		    				<?php } ?>
				    		
			    		</div>

			    		<?php if ($city_count > $limit) { ?>
			    		<button type="button" class="btn btn-orange btn-block load-more-cities hide" data-loadmore="<?php echo base_url('states/loadcities'); ?>">Show More</button>
			    		<input type="hidden" id="state" value="<?php echo $state->abbrev; ?>" />
			            <input type="hidden" id="row" value="0" />
			            <input type="hidden" id="all" value="<?php echo $city_count; ?>" />
			            <?php } ?>

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

	    				<?php include('parts/weather-state.php'); ?>

	    				<?php include('parts/widget-aside-recent-blog.php'); ?>


	    			</div>

    			</div>

    		</div>

    	</div>

    </section>

</div>