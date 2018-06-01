<div class="blog-content">

	<section class="section-blog">

		<div class="container">

			<div class="row">
			
				<div class="col-md-8">

					<div class="section-content">

						<h1 class="section-title">Blog</h1>

						<div class="blog-wrap">

							<?php
		    				if($blogs->result()) {
		    					foreach($blogs->result() as $blog) {
		    						$blog_thumb = ($blog->featured_image != NULL) ? base_url($blog->featured_image) : base_url('build/images/placeholder.jpg');
		    				?>
							
							<div class="blog-item">
								<?php if($blog->featured_image != NULL) { ?>
								<div class="blog-thumb">
									<img class="img-responsive" src="<?php echo $blog_thumb; ?>" alt="<?php echo $blog->title; ?>" title="<?php echo $blog->title; ?>" />
								</div>
								<?php } ?>

								<div class="blog-body">

									<span class="blog-meta">Posted on <?php echo date_proper($blog->created_at); ?></span>

									<h2 class="blog-title"><?php echo $blog->title; ?></h2>

									<div class="blog-excerpt">
										
										<p><?php echo $blog->excerpt; ?></p>

									</div>

									<br/>

									<a href="<?php echo base_url($blog->slug); ?>" class="btn btn-primary btn-readmore">Read more</a>

								</div>

							</div>

							<?php
		    					}

		                        if (strlen($pagination)) {
		                            echo $pagination;
		                        }
		    				} else { ?>

		                    
		                    <h2 class="text-muted text-center">No Blog Posts Available</h2>

		                    <?php } ?>

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