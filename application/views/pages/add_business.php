<div class="page-content">

    <section class="section-page">

    	<div class="container">
    		
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


	    					<form class="form-horizontal submit-biz" method="post" action="<?php echo base_url('business/post/process'); ?>" enctype="multipart/form-data">

	    						
								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-2">
										<label for="exampleInputFile">Business Photo</label>
										<input type="file" class="biz_photo" name="photo" accept=".jpg, .jpeg, .png" onchange="readURL(this);" required />
										<p class="help-block">Format .jpg .jpeg and .png only.</p>
										<button type="button" class="btn btn-xs btn-warning remove-preview" style="display:none;">Remove</button>
										<img class="img-responsive preview" src="" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Business *</label>
									<div class="col-sm-10">
										<input type="text" class="form-control biz_name" name="name" placeholder="Business Name" required/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">City *</label>
									<div class="col-sm-10">
										<input type="text" class="form-control  biz_city" name="city" placeholder="City" required/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">State *</label>
									<div class="col-sm-10">
										<input type="text" class="form-control  biz_state" name="state" placeholder="State Abbreviation" maxlength="2" required/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Zip Code *</label>
									<div class="col-sm-10">
										<input type="text" class="form-control  biz_zip" name="zip" placeholder="Zip Code" maxlength="5" required/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Email *</label>
									<div class="col-sm-10">
										<input type="email" class="form-control  biz_email" name="email" placeholder="Email Address" required/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Contact *</label>
									<div class="col-sm-10">
										<input type="text" class="form-control  biz_contact" name="contact" placeholder="Contact Number" required/>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<div class="g-recaptcha" data-sitekey="<?php echo the_config('gr_site_key') ?>"></div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-success submit-biz-btn">Submit <i class="fa fa-paper-plane"></i></button>
									</div>
								</div>

							</form>

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