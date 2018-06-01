<div class="searchresult-content">

    <section class="section-searchresults">

    	<div class="container">

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
    					
		    			<h1 class="section-title">Results for <strong><?php echo ucwords($location); ?></strong></h1>


			    		<?php if($search_data != NULL) { ?>

				    		<div class="result-wrap">

				    		<?php foreach($search_data as $result) {
				    			$rand_int = array_rand(range(1,12), 1);
				    			$ads_img = 'build/images/thumb-ad/'.$rand_int.'.jpg';
				    		?>
				    			<div class="result-item-wrap">

					    			<div class="result-item-main">

						    			<div class="row">
						    				<div class="col-md-3 col-sm-3">
						    					<div class="result-thumb">
						    						<img class="img-responsive" src="<?php echo base_url($ads_img); ?>" alt="" title="" />
						    					</div>
						    				</div>

						    				<div class="col-md-9 col-sm-9">
												<div class="result-details">
													<h3>Locksmiths Near <strong><?php echo $result->name.', '.strtoupper($result->state); ?></strong></h3>
													<span class="line"></span>

													<ul class="fa-ul" style="margin-bottom:0;">
														<li><i class="fa fa-location-arrow fa-li"></i> <?php echo $result->name.', '.strtoupper($result->state); ?></li>
														<li><i class="fa fa-phone fa-li"></i> <?php echo $result->phone; ?></li>
														
													</ul>
												</div>
						    				</div>
						    			</div>

						    		</div>

						    		<div class="result-item-link">
						    					
				    					<a href="tel:<?php echo $result->phone; ?>" class="btn-link">
				    						CALL NOW
				    					</a>
				    					
				    					<a href="<?php echo base_url('city/'.$result->slug); ?>" class="btn-link">
				    						CLICK HERE
				    					</a>
				    				</div>

						    	</div>

					    	<?php } ?>

				    		</div>

			    		<?php } else { ?>

			    			<img src="<?php echo base_url('build/images/no-result.png'); ?>" class="img-responsive center-block" alt="No Results Found" title="No Results Found" style="width:40%;opacity:0.5;" />

			    			<br/>

			    			<h3 class="txt-center" style="font-weight:bold;">No Results Found.</h3>

			    			<br/>

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

					    <?php if($search_data != NULL) { ?>
	    				<div class="map-wrap">
	    					<div id="search-map-overlay"></div>
	    				</div>
	    				<?php } ?>

	    			</div>

    			</div>

    		</div>

    	</div>

    </section>

</div>