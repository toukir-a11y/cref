<?php
 /* Template Name: Home  */ 
 
 get_header();

 ?>

<?php  $banner = get_field( 'banner' ); $cta = $banner['cta']; $btn = $cta['button']; if( !empty($banner) ):?>
	<section class="banner d-flex flex-wrap align-items-end" <?php if ( $banner['bg_image'] ) echo 'style="background-image: url('.esc_url( $banner['bg_image']['url'] ).');"'; ?>>
		<div class="background rellax" data-rellax-speed="-5" data-rellax-percentage="0.5">
			<?php
				if( $banner['bg_image'] )
				{
					printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url($banner['bg_image']['url']), 'alt' );
				}
			?>
		</div>
			<?php if( $banner['title'] || $banner['title'] ):?>	
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="content">
								<?php
									if( $banner['title'] )
									{
										printf( '<h1 class="title h2">The Undisputed <br>%s</h1>', $banner['title'] );
									}
									if( $banner['sub_title'] )
									{
										printf( '<p class="sub-title h5">%s</p>', $banner['sub_title'] );
									}	
								?>						
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>	

		<div class="banner-call-action d-flex align-items-end">
			<button class="scrollDown" data-space="0"><i class="icon-arrow-down-alt rellax" data-rellax-speed="-0.3" data-rellax-percentage="0.1"></i></button>
		<?php if( $cta || $btn ): ?>
			<div class="cta" <?php if ( $cta['cta_image'] ) echo 'style="background-image: url('.esc_url( $cta['cta_image']['url'] ).');"'; ?>>
				<div class="text">
					<?php
						if( $cta['sub_title'] )
						{
							printf( '<span class="sub-title">%s</span>', $cta['sub_title'] );
						}
						if( $cta['title'] )
						{
							printf( '<h3 class="title">%s</h3>', $cta['title'] );
						}				
					?>
										
					<a href="<?php
										
							if( $btn['type']  == 'internal' && !empty($btn['internal_url'] ))
							{
							printf( '%s', esc_url($btn['internal_url']) );
							}
							if( $btn['type'] == 'external' && !empty($btn['external_url'] ))
							{
								printf( '%s', esc_url($btn['external_url']) );
							}

						?>" class="btn text-uppercase">
						
						<?php 
															
							if( !empty($btn['text'] ))
							{
								printf( '%s',$btn['text'] );
							}
						?>
					</a>
				</div>
			</div>
		<?php endif; ?>	
		</div>
		<span class="border"></span>
	</section><!-- /banner -->
<?php endif; ?>	

	<div id="primary" class="content-area">

		<!-- <section class="integrated-services pb-0">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="entry-title">
							<span class="sub-title ">Self-Performing Services</span>
							<h3 class="title base">Integrated Services</h3>
							<p>CREF provides full spectrum real estate services customized to fit your needs</p>
						</div>
					</div>
				</div>

				<div class="popularSlider">
					<div class="col-lg-4 col-sm-6">
						<article class="popularpost d-flex align-items-end">
							<a href="blog-details.html" class="link"></a>
							<div class="media">
								<a href="blog-details.html">
									<img src="<?php get_template_directory_uri();?>/images/popular-post-1.jpg" class="img-fluid" alt="">
								</a>
							</div>

							<div class="text">
								<a href="blog-details.html">
									<h5 class="title">Introduce a pain point here. For example, are you dealing with that thing or this thing?</h5>
								</a>

								<div class="excerpt">
									<p class="button-text">See How CREF Helps</p>
								</div>
							</div>
						</article>
					</div>

					<div class="col-lg-4 col-sm-6">
						<article class="popularpost d-flex align-items-end">
							<a href="blog-details.html" class="link"></a>
							<div class="media">
								<a href="blog-details.html">
									<img src="<?php get_template_directory_uri();?>/images/popular-post-2.jpg" class="img-fluid" alt="">
								</a>
							</div>

							<div class="text">
								<a href="blog-details.html">
									<h5 class="title">This is another pain point for another service you offer. Tie the pain to the solution.</h5>
								</a>

								<div class="excerpt">
									<p class="button-text">A Link to a Service</p>
								</div>
							</div>
						</article>
					</div>

					<div class="col-lg-4 col-sm-6">
						<article class="popularpost d-flex align-items-end">
							<a href="blog-details.html" class="link"></a>
							<div class="media">
								<a href="blog-details.html">
									<img src="<?php get_template_directory_uri();?>/images/popular-post-3.jpg" class="img-fluid" alt="">
								</a>
							</div>

							<div class="text">

								<a href="blog-details.html">
									<h5 class="title">This is another pain point for another service you offer. Tie the pain to the solution.</h5>
								</a>

								<div class="excerpt">
									<p class="button-text">A Link to a Service</p>
								</div>
							</div>
						</article>
					</div>

					<div class="col-lg-4 col-sm-6">
						<article class="popularpost d-flex align-items-end">
							<a href="blog-details.html" class="link"></a>
							<div class="media">
								<a href="blog-details.html">
									<img src="<?php get_template_directory_uri();?>/images/popular-post-4.jpg" class="img-fluid" alt="">
								</a>
							</div>

							<div class="text">
								<a href="blog-details.html">
									<h5 class="title">This is another pain point for another service you offer. Tie the pain to the solution.</h5>
								</a>

								<div class="excerpt">
									<p class="button-text">A Link to a Service</p>
								</div>
							</div>
						</article>
					</div>
				</div>
			</div>
		</section>/popular-posts -->

	<?php $assets = get_field( 'assets' ); $image = get_field('image'); if( !empty($assets) ):?>
		<section class="asset-management pb-md-0">
			<div class="container">
				<div class="row minus align-items-center">
					<?php if( !empty($image) ):?>	
						<div class="col-lg-8 col-md-6">
							<div class="media">
								<?php 
									if( $image )
									{
										printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url($image['url']), 'alt' );
									}
								?>								
							</div>
						</div>
					<?php endif; ?>	
					<?php  if( !empty($assets) ): ?>
						<div class="col-lg-4 col-md-6">
							<div class="row lr-10">
								<?php foreach( $assets as $asset ):?>	
									<div class="col-6">
										<div class="asset-item">
											<?php 
												if( $asset['icon'] )
												{
													printf( '<i class="%s"></i>', $asset['icon'] );
												}
												if( $asset['number'] )
												{
													printf( '<h3 class="number">$<span class="counter">%s</span></h3>', $asset['number'] );
												}
												if( $asset['title'] )
												{
													printf( '<span class="%s">Billion</span>', $asset['title'] );
												}
												if( $asset['content'] )
												{
													printf( '%s', $asset['content'] );
												}					
											?>											
										</div>
									</div>
								<?php endforeach; ?>	
							</div>
						</div>
					<?php endif; ?>	
				</div>
			</div>
		</section><!-- /asset-management -->
	<?php endif; ?>	

		<div class="position-relative overflow-hidden">
	<?php $software = get_field('software_suite'); $sbtn = $software['button']; if( !empty($software) ): ?>
		<section class="home-icref-suite">
			<div class="container">
				<div class="row lr-10 align-items-center">
					<?php if( $software['sub_title'] || $software['title'] || $software['content'] || $sbtn ):?>
						<div class="col-md-5">
							<div class="entry-title">
								<?php
									if( $software['sub_title'] )
									{
										printf( '<span class="sub-title">%s</span>', $software['sub_title'] );
									}
									if( $software['title'] )
									{
										printf( '<h3 class="title base">%s</h3>', $software['title'] );
									}
									if( $software['content'] )
									{
										printf( '%s', $software['title'] );
									}
								?>
							
								<a href="<?php
										
										if( $btn['type']  == 'internal' && !empty($btn['internal_url'] ))
										{
										printf( '%s', esc_url($btn['internal_url']) );
										}
										if( $btn['type'] == 'external' && !empty($btn['external_url'] ))
										{
											printf( '%s', esc_url($btn['external_url']) );
										}
			
									?>" class="btn text-uppercase">
									<?php 
															
										if( !empty($btn['text'] ))
										{
											printf( '%s',$btn['text'] );
										}
									?>
								</a>
							</div>
						</div>
					<?php endif; ?>	
					<?php if( !empty($software['image']) ):?>
						<div class="col-md-7">
							<div class="media">
								<?php
									if( $software['image'] )
									{
										printf( '<img src="%s" alt="%s">', esc_url($software['image']['url']), 'alt' );
									}
								?>								
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</section><!-- /home-icref-suite -->
	<?php endif; ?>	
	
	<?php $about = get_field( 'about_cref' ); $video = $about['video']; $about_btn= $about['button']; if( !empty($about) ):?>
		<section class="home-about">
			<?php if( !empty($about['image']) )
			{
				printf( '<div class="background"><img src="%s" class="img-fluid" alt="%s"></div>', esc_url( $about['image']['url']), 'alt'  );
			}				
			?>
							
			<div class="container">
				<div class="row flex-md-row-reverse align-items-center">
					<?php if( $about['sub_title'] || $about['title'] || $about['content'] || $about_btn ):?>	
						<div class="col-md-4">
							<div class="entry-title">
								<?php
									
									if( $about['sub_title'] )
									{
										printf( '<span class="sub-title">%s</span>', $about['sub_title'] );
									}
									if( $about['title'] )
									{
										printf( '<h3 class="title">%s</h3>', $about['title'] );
									}
									if( $about['content'] )
									{
										printf( '%s', $about['content'] );
									}
								?>
								
								<a href="<?php
									
										if( $about_btn['type']  == 'internal' && !empty($about_btn['internal_url'] ))
										{
										printf( '%s', esc_url($about_btn['internal_url']) );
										}
										if( $about_btn['type'] == 'external' && !empty($btn['external_url'] ))
										{
											printf( '%s', esc_url($about_btn['external_url']) );
										}
			
									?>" class="btn white text-uppercase">
									<?php 
														
										if( !empty($about_btn['text'] ))
										{
											printf( '%s',$about_btn['text'] );
										}
									?>
								</a>
							</div>
						</div>
					<?php endif; ?>	

					<?php if(!empty($video) ) : ?>
						<div class="col-md-8">
							<a href="<?php echo esc_url($video['url']);?>" class="popup-video" data-effect="mfp-move-from-top">
								<?php
									if( $about['image'] )
									{
										printf( '<div class="media"><img src="%s" class="img-fluid" alt="%s"></div>', esc_url($video['image']['url']), 'alt' );
									}
									if( $video['title'] || $video['content'] )
									{
										printf( '<div class="text"><h4 class="title">%s</h4>%s', $video['title'], $video['content'] );
									}
								?>	
								</div>
							</a>					
						</div>
					<?php endif; ?>	
				</div>		
			</div>
		</section><!-- /home-about -->
	<?php endif; ?>	

		</div><!-- /position-relative -->
	<?php $featured = get_field('featured_stories'); $stories = $featured['stories_item']; if( !empty($featured) ):?>
		<section class="featured-stories">
			<div class="container">
				<?php if( $featured['sub_title'] || $featured['title'] || $featured['content']):?>
					<div class="row">
						<div class="col-12">
							<div class="entry-title text-center">
								<?php
									if( $featured['sub_title'] )
									{
										printf( '<span class="sub-title">%s</span>', $featured['sub_title'] );
									}
									if( $featured['title'] )
									{
										printf( '<h3 class="title">%s</h3>', $featured['title'] );
									}
									if( $featured['content'] )
									{
										printf( '%s', $featured['content'] );
									}								
								?>
							</div>
						</div>
					</div>
				<?php endif; ?>	

				<div class="row lr-10 minus">
					<?php foreach( $stories as $story ):?>
						<div class="col-md-4 col-sm-6">
							<a href="<?php echo esc_url($story['url']);?>" class="story-item d-flex flex-column">
								<?php
									if( $story['image'] )
									{
										printf( '<div class="media"><img src="%s" class="img-fluid" alt="%s"></div>', $story['image']['url'], 'alt' );
									}
									if( $story['title'] || $story['content'] )
									{
										printf( '<div class="text mt-auto"><h5 class="title">%s</h5>%s', $story['title'], $story['content'] );
									}								
								?>	
								</div>
							</a>
						</div>
					<?php endforeach;?>
				</div>
			</div>
		</section><!-- /featured-stories -->
	<?php endif; ?>	

	</div><!-- /content-area -->


<?php 
    
    get_template_part( 'template_parts/call_action');

    get_footer();
?>