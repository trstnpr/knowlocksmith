<div class="page-content">

    <section class="section-page">

    	<div class="container">

    		<div class="breadcrumb-wrap">
	    		<ol class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li class="active"><?php echo $page->title; ?></li>
				</ol>
			</div>
    		
    		<div class="row">

    			<div class="col-md-8">

    				<div class="section-content">

    					<div class="content-header">
    						<span class="page-meta">Posted on <?php echo date_proper($page->created_at); ?></span>
	    					<h1 class="section-title"><?php echo $page->title; ?></h1>
	    				</div>

	    				<?php
	    				if($page->featured_image != NULL) {
	    				?>
	    				<div class="page-thumb">
	    					<img src="<?php echo base_url($page->featured_image); ?>" class="img-response" alt="<?php echo $page->title; ?>" title="<?php echo $page->title; ?>"/>
    					</div>
    					<?php } else { ?>
    					<div class="service-image data-img" data-bg="<?php echo base_url('build/images/banner-bg-3.jpeg'); ?>">
	    					<div class="overlay"></div>
    					</div>
    					<?php } ?>

	    				<div class="content-wrap">
		    				
	    					<?php echo $page->content; ?>

		    			</div>

	    			</div>

    			</div>


    			<div class="col-md-4">

    				<div class="aside">

	    				<div class="inner-searchform">

    						<div class="widget-header">
    							<h3><i class="fa fa-search hidden-xs"></i> Search For Locksmiths</h3>
    						</div>

							<div class="widget-body">

								<?php include('parts/form-search-aside.php'); ?>

							</div>

					    </div>	 

					    <?php include('parts/widget-aside-recent-blog.php'); ?>   				

	    			</div>

    			</div>

    		</div>

    	</div>

    </section>

</div>