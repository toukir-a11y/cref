<?php
 /* Template Name: Solutions Video  */ 
 
 get_header();

 ?>
 
	<div class="header_gutter"></div>

	<div id="primary" class="content-area">

        <?php
			$image = get_field( 'bg_image' ); if( !empty($image) )
			{
				printf( '<div class="page-header"><img src="%s" class="img-fluid" alt="%s"></div>', esc_url($image['url']), 'alt' );
			}
			else
			{
			   printf( '<div class="page-header"><img src="%s" class="img-fluid" alt="%s"></div>', esc_url( get_theme_file_uri( '/images/page-header-solutions.jpg' ) ), get_bloginfo( 'name') );
			}			
		?>
		<section class="breadcrumb-wrapper">
		    <div class="container">
		        <div class="row">
		            <div class="col-12">
		                <nav class="breadcrumb">
		                    <a href="index.html">Home</a>
		                    <span class="angle-right">/</span>
		                    <a class="current-page">Solutions</a>
		                </nav>
		            </div>
		        </div>
		    </div>
		</section><!-- /breadcrumb -->
    <?php $about = get_field( 'about' ); if( !empty($about) ): $solutions = $about['solutions']; ?>
		<section class="solutions-video-page">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="entry-title">
                            <?php
                                if( $about['title'] )
                                {
                                    printf( '<h1 class="title h2 primary text-uppercase">%s</h1>', $about['title'] );
                                }
                                if( $about['sub_title'] )
                                {
                                    printf( '<h3 class="sub-title base">%s</h3>', $about['sub_title'] );
                                }
                                if( $about['content'] )
                                {
                                    printf( '%s', $about['content'] );
                                }                            
                            ?>
							<ul class="anchor-links list-inline smoothScroll lastNobullet">
                                <?php
                                    if($about['lebel'])
                                    {
                                        printf( '<li class="label">%s</li>', $about['lebel'] );
                                    }
                                    if( !empty($solutions) ) {
                                   
                                        foreach( $solutions as $solution ) {
                                       
                                            printf( '<li><a href="%s">%s</a></li>', esc_url( $solution['url'] ), $solution['text'] );
                                        }
                                    }
                                ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /about-page -->
    <?php endif; ?>    	
	<?php $market = get_field('markets'); if( !empty($market) ):?>
		<section class="markets-forward">
			<div class="container">
				<div class="row lr-10 minus align-items-center">
					<?php if( !empty($market['title'] || $market['content']) ):?>
						<div class="col-lg-4">
							<div class="content">
								<?php
									if( $market['title'] )
									{
										printf( '<h3 class="title">%s</h3>', $market['title'] );
									}
									if( $market['content'] )
									{
										printf( '%s', $market['content'] );
									}
								?>
							</div>
						</div>
					<?php endif; ?>
				<?php $videos = $market['popup_video']; if( !empty($videos) ): foreach( $videos as $video ): ?>
					<div class="col-lg-4 col-sm-6">
						<a href="<?php if( $video['url'] ): echo esc_url( $video['url'] ); endif;?>" class="drives-market-item popup-video">
							<?php
								if( $video['image'] )
								{
									printf( '<div class="media"><img src="%s" class="img-fluid" alt="%s"></div>'
									, esc_url( $video['image']['url']), 'alt'  );
								}
							?>
							<div class="text d-flex flex-column align-items-center justify-content-center">
								<?php
									if( $video['icon_image'] )
									{
										printf( '<div class="icon"><img src="%s" class="img-fluid" alt="%s"></div>'
										, esc_url($video['icon_image']['url']), 'alt' );
									}
									if( $video['title'] )
									{
										printf( '<h5 class="title">%s</h5>', $video['title'] );
									}
									if( $video['content'] )
									{
										printf( '%s', $video['content'] );
									}
									if( $video['button_text'] )
									{
										printf( '<button class="btn">%s</button>', $video['button_text'] );
									}
								?>
							</div>
						</a>
					</div>
				<?php endforeach; 
					endif; 	
				?>	
					<?php $images= $market['popup_image']; if( !empty( $images ) ): foreach( $images as $image ): if( !empty( $image ) ):   ?>
						<div class="col-lg-4 col-sm-6">
							<a href="<?php echo esc_url( $image['url']['url']  );?>" class="drives-market-item">
								<?php
									if( $image['image'] )
									{
										printf( '<div class="media"><img src="%s" class="img-fluid" alt="%s"></div>'
										, esc_url( $image['image']['url'] ), 'alt' );
									}
								?>	  
								<div class="text d-flex flex-column align-items-center justify-content-center">
									<?php
										if( $image['icon_image'] ) 
										{
											printf( '<div class="icon"><img src="%s" class="img-fluid" alt="%s"></div>'
											, esc_url( $image['icon_image']['url'] ), 'alt' );
										}
										if( $image['title'] )
										{
											printf( '<h5 class="title">%s</h5>', $image['title'] );
										}
										if( $image['content'] )
										{
											printf( '%s', $image['content'] );
										}
									?>
								</div>
							</a>
						</div>
						
					<?php 
						 endif; endforeach; endif; 		
					?>	
				</div>	
			</div>
		</section><!-- /markets-forward -->
	<?php endif;?>	
		<section class="solutions-group">
			<div class="container">
				<div id="solution-1" class="solutions-group-item">
					<div class="row lr-10">
						<div class="col-md-6">
							<div class="content">
								<h3 class="title">Real Estate Services</h3>
								<p>Unlike other real estate management companies serving multiple industries, CREF has  pioneered the application of state-of-the-art real estate tools and management to the health.</p>
								<ul class="arrow-lists list-unstyled">
									<li>Development/Acquisitions/Disposition</li>
									<li>Property Management</li>
									<li>Lease Administration</li>
									<li>Tenant Coordination</li>
								</ul>
								<a href="solution-details.html" class="btn text-uppercase">View Real Estate Services</a>
							</div>
						</div>

						<div class="col-md-6">
							<div class="solution-services">
								<div class="solution-services-slider">
									<a href="#" class="solution-service-item d-flex align-items-end">
										<div class="media">
											<img src="../images/solution-service-item-1.jpg" class="img-fluid" alt="">
										</div>

										<div class="text">
											<div class="center">
												<h5 class="title">This is a free form box where we can link to whatever we want. Something to do with Real Estate Services</h5>
												<p>Discover the CREF Difference</p>
											</div>
										</div>
									</a>

									<a href="#" class="solution-service-item d-flex align-items-end">
										<div class="media">
											<img src="../images/solution-service-item-2.jpg" class="img-fluid" alt="">
										</div>

										<div class="text">
											<div class="center">
												<h5 class="title">This should be linked to something to do with Capital Program Management. Whatever that may be.</h5>
												<p>See how CREF’s CPM Helped</p>
											</div>
										</div>
									</a>

									<a href="#" class="solution-service-item d-flex align-items-end">
										<div class="media">
											<img src="../images/solution-service-item-3.jpg" class="img-fluid" alt="">
										</div>

										<div class="text">
											<div class="center">
												<h5 class="title">A link goes here about a company or a client that benefitted from facilities performance services.</h5>
												<p>See how CREF’s CPM Helped</p>
											</div>
										</div>
									</a>
								</div>

								<div class="slide-controls d-flex align-items-center justify-content-between">
									<div class="slider-arrows">
										<span class="slider-arrow sarrow-prev">Previous</span>
										<span class="slider-arrow sarrow-next">Next</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="solution-2" class="solutions-group-item">
					<div class="row lr-10">
						<div class="col-md-6">
							<div class="content">
								<h3 class="title">Capital Program Management</h3>
								<p>Unlike other real estate management companies serving multiple industries, CREF has  pioneered the application of state-of-the-art real estate tools and management to the health.</p>
								<ul class="arrow-lists list-unstyled">
									<li>Capital Budget Planning</li>
									<li>Staff Programming & Fit Planning</li>
									<li>Owners Project Management</li>
									<li>Funding Requisition & Allocation</li>
								</ul>
								<a href="solution-details.html" class="btn text-uppercase">View CPM Services</a>
							</div>
						</div>

						<div class="col-md-6">
							<div class="solution-services">
								<div class="solution-services-slider">
									<a href="#" class="solution-service-item d-flex align-items-end">
										<div class="media">
											<img src="../images/solution-service-item-2.jpg" class="img-fluid" alt="">
										</div>

										<div class="text">
											<div class="center">
												<h5 class="title">This is a free form box where we can link to whatever we want. Something to do with Real Estate Services</h5>
												<p>Discover the CREF Difference</p>
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="solution-3" class="solutions-group-item">
					<div class="row lr-10">
						<div class="col-md-6">
							<div class="content">
								<h3 class="title">Facilities Performance Services</h3>
								<p>Unlike other real estate management companies serving multiple industries, CREF has  pioneered the application of state-of-the-art real estate tools and management to the health.</p>
								<ul class="arrow-lists list-unstyled">
									<li>Capital Budget Planning</li>
									<li>Property Management</li>
									<li>Lease Administration</li>
									<li>Tenant Coordination</li>
								</ul>
								<a href="solution-details.html" class="btn text-uppercase">View CPM Services</a>
							</div>
						</div>

						<div class="col-md-6">
							<div class="solution-services">
								<div class="solution-services-slider">
									<a href="#" class="solution-service-item d-flex align-items-end">
										<div class="media">
											<img src="../images/solution-service-item-3.jpg" class="img-fluid" alt="">
										</div>

										<div class="text">
											<div class="center">
												<h5 class="title">A link goes here about a company or a client that benefitted from facilities performance services.</h5>
												<p>See how CREF’s CPM Helped</p>
											</div>
										</div>
									</a>

									<a href="#" class="solution-service-item d-flex align-items-end">
										<div class="media">
											<img src="../images/solution-service-item-1.jpg" class="img-fluid" alt="">
										</div>

										<div class="text">
											<div class="center">
												<h5 class="title">This is a free form box where we can link to whatever we want. Something to do with Real Estate Services</h5>
												<p>Discover the CREF Difference</p>
											</div>
										</div>
									</a>
								</div>

								<div class="slide-controls d-flex align-items-center justify-content-between">
									<div class="slider-arrows">
										<span class="slider-arrow sarrow-prev">Previous</span>
										<span class="slider-arrow sarrow-next">Next</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="solution-4" class="solutions-group-item">
					<div class="row lr-10">
						<div class="col-md-6">
							<div class="content">
								<h3 class="title">Engineering & Energy</h3>
								<p>Unlike other real estate management companies serving multiple industries, CREF has  pioneered the application of state-of-the-art real estate tools and management to the health.</p>
								<ul class="arrow-lists list-unstyled">
									<li>Development/Acquisitions Disposition</li>
									<li>Property Management</li>
									<li>Lease Administration</li>
									<li>Tenant Coordination</li>
								</ul>
								<a href="solution-details.html" class="btn text-uppercase">View CPM Services</a>
							</div>
						</div>

						<div class="col-md-6">
							<div class="solution-services">
								<div class="solution-services-slider">
									<a href="#" class="solution-service-item d-flex align-items-end">
										<div class="media">
											<img src="../images/solution-service-item-4.jpg" class="img-fluid" alt="">
										</div>

										<div class="text">
											<div class="center">
												<h5 class="title">A link goes here about a company or a client that benefitted from facilities performance services.</h5>
												<p>See how CREF’s CPM Helped</p>
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /solutions-group -->

		<div class="container">
			<div class="row">
				<div class="col-12">
					<hr style="border-color: #0E92D9">
				</div>
			</div>
		</div>

		<section class="icref-integrated">
			<div class="container">
				<div class="icref-suite">
					<div class="row align-items-center">
						<div class="col-sm-6">
							<div class="entry-title">
								<span class="sub-title">iCREF Integrated Data Platform</span>
								<h3 class="title">The iCREF Software Suite</h3>
								<p>iCREF is a fully integrated asset management software suite that manages all aspects of your corporate facilities and property projects.</p>
								<a href="#" class="btn primary text-uppercase">View icref suite</a>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="media">
								<img src="../images/icref-suite.png" class="img-fluid" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /icref-integrated -->




<?php 
    
    get_template_part( 'template_parts/call_action');

    get_footer();
?>