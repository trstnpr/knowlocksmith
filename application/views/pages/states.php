<div class="states-content">

    <section class="section-states">

    	<div class="container">

    		<div class="breadcrumb-wrap">
	    		<ol class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li class="active">State</li>
				</ol>
			</div>
    		
    		<div class="row">

    			<div class="col-md-4 col-md-push-8">

    				<div class="aside">

    					<div class="inner-searchform">

    						<div class="widget-header">
    							<h3><i class="fa fa-search hidden-xs"></i> Search For Locksmiths</h3>
    						</div>

							<div class="widget-body">

								<?php include('parts/form-search-aside.php'); ?>

							</div>

					    </div>

					    <div class="hidden-sm hidden-xs">
					    	<?php include('parts/widget-aside-recent-blog.php'); ?>
					    </div>

	    			</div>

    			</div>

    			<div class="col-md-8 col-md-pull-4">

    				<div class="section-content">
    					<div class="content-header">
	    					<h1 class="section-title">Locksmiths By <strong>State</strong></h1>
	    				</div>

	    				<div class="service-image data-img" data-bg="<?php echo base_url('build/images/random/1.jpg'); ?>">
	    					<div class="overlay"></div>
    					</div>

	    				<div class="states-wrap">
		    		
		    				<div class="row">
		    					<?php

			    					foreach($states as $state) {

			    				?>
		    					<div class="col-md-4 col-sm-6 state-item">
		    						
	    							<a href="<?php echo base_url('state/'.strtolower($state->abbrev)); ?>" class="list-state">
	    								<i class="fa fa-location-arrow"></i> <?php echo $state->state; ?>
	    							</a>
		    							
		    					</div>
		    					<?php } ?>

		    				</div>
		    				
		    			</div>

	    			</div>

    			</div>

    		</div>

    	</div>

    </section>

</div>