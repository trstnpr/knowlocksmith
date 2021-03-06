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
	    					<h1 class="section-title"><?php echo $page->title; ?></h1>
	    				</div>

	    				<div class="service-image data-img" data-bg="<?php echo base_url('build/images/banner-bg-3.jpeg'); ?>">
	    					<div class="overlay"></div>
    					</div>

	    				<div class="content-wrap">
		    				
	    					<?php echo $page->content; ?>

	    					<br/>

							<div class="form-wrap">

								<form class="form-horizontal form-contact" method="post" action="<?php echo base_url('contact/send'); ?>">
									<div class="form-group">
										<label class="col-sm-2 control-label">Name *</label>
										<div class="col-sm-10">
											<input type="text" class="form-control name" name="name" placeholder="Your Name ..." required />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Email *</label>
										<div class="col-sm-10">
											<input type="email" class="form-control email" name="email" placeholder="Your Email ..." required />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Subject *</label>
										<div class="col-sm-10">
											<input type="text" class="form-control subject" name="subject" placeholder="Your Subject ..." required />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Message *</label>
										<div class="col-sm-10">
											<textarea type="text" class="form-control message" name="message" rows="5" placeholder="Your Message ..." required ></textarea>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-2">
											<div class="g-recaptcha" data-sitekey="<?php echo the_config('gr_site_key'); ?>"></div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" class="btn btn-orange btn-send">Send <i class="fa fa-paper-plane"></i></button>
										</div>
									</div>
								</form>

							</div>

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