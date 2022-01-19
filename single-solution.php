<?php get_header();?>

	<div id="primary" class="content-area">

		<?php
			$image = get_field( 'bg_image' ); if( !empty($image) )
			{
				printf( '<div class="page-header"><img src="%s" class="img-fluid" alt="%s"></div>', esc_url($image['url']), 'alt' );
			}
			else
			{
			   printf( '<div class="page-header"><img src="%s" class="img-fluid" alt="%s"></div>', esc_url( get_theme_file_uri( '/images/page-header-solution-details.jpg' ) ), get_bloginfo( 'name') );
			}			
		?>
		<section class="breadcrumb-wrapper">
		    <div class="container">
		        <div class="row">
		            <div class="col-12">
		                <nav class="breadcrumb">
		                    <a href="index.html">Home</a>
		                    <span class="angle-right">/</span>
		                    <a href="solutions.html">Solutions </a>
		                    <span class="angle-right">/</span>
		                    <a class="current-page">Capital Program Management</a>
		                </nav>
		            </div>
		        </div>
		    </div>
		</section><!-- /breadcrumb -->
	
	<?php $about = get_field( 'program_manegment' ); $btn = $about['button']; if( !empty($about) ):?>		
		<section class="solutions-details-page">
			<div class="container">
				<?php if( !empty($about['title']) || $about['sub_title'] ):?>	
					<div class="row">
						<div class="col-12">
							<div class="entry-title">
								<?php
									if($about['title'])
									{
										printf( '<h1 class="title h2 primary text-uppercase">%s</h1>', $about['title'] );
									}
									if($about['sub_title'])
									{
										printf( '<h3 class="sub-title base">%s</h3>', $about['sub_title'] );
									}
								?>								
							</div>
						</div>
					</div>
				<?php endif; ?>

				<div class="row">
					<?php if( !empty($about['content']) || $btn ): ?>
						<div class="col-lg-6">
							<div class="content">
								<?php
									if( $about['content'] )
									{
										printf( '%s', $about['content'] );
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
            
                                    ?>"
									
									class="btn text-uppercase">
									
									<?php 
                                        
									if( $btn['text'] )
									{
										printf( '%s',$btn['text'] );
									}                                        
                                    ?>
								</a>
							</div>
						</div>
					<?php endif;?>	
					<?php $features = $about['features']; if( !empty($features) ): ?>
						<div class="col-lg-6">
							<div class="row lr-10 minus">
								<?php foreach( $features as $feature ): ?>
									<div class="col-6">
										<div class="solution-feature d-flex align-items-center">
											<?php
												if( $feature['icon'] )
												{
													printf( '<div class="icon float-left"><i class="%s"></i></div>', $feature['icon'] );
												}
												if($feature['title'])
												{
													printf( '<div class="text"><span class="title">%s</span></div>', $feature['title'] );
												}											
											?>
										</div>
									</div>
								<?php endforeach;?>
							</div>
						</div>
					<?php endif; ?>	
				</div>
				<?php $services = $about['services']; if( $about['service_title'] && $services ): ?>
					<div class="management-services">
						<div class="row">
							<div class="col-12">
								<?php
									if($about['service_title'])
									{
										printf( '<h3 class="title">%s</h3>', $about['service_title'] );
									}
								?>
								<ul class="services">
									<?php foreach( $services as $service ): ?>
										<li>
											<?php 
												if( $service['services'] )
												{
													printf( '%s', $service['services'] );
												}
											?>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
					</div>
				<?php endif;?>	
			</div>
		</section><!-- /about-page -->
	<?php endif; ?>

	<?php $success = get_field( 'success_story' ); if ( !empty($success) ): ?>
		<section class="success-story">
			<div class="container">
				<div class="row lr-10">
					<?php 
						if( $success['title'] )
						{
							printf( '<div class="col-12"><div class="entry-title"><h3 class="title base">%s</h3></div></div>', $success['title'] );
						}
					?>

					<?php $stories = $success['stories']; if( $stories ): ?>
						<div class="col-lg-6">
							<div class="content">
								<div class="content-block">
									<?php foreach( $stories as $story )
									{
										if( $story['title'] )
										{
											printf( '<h5 class="title">%s</h5>', $story['title'] );
										}
										if( $story['content'] )
										{
											printf( '%s', $story['content'] );
											
										}						
									} 
									?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<?php $proofs = $success['the_proof']; if( !empty($proof) || $success['title'] ): ?>
						<div class="col-lg-6">
							<div class="theproof">
								<?php
									if($success['title'])
									{
										printf( '<h5 class="title">%s</h5>', $success['title'] );
									}
								?>
								<div class="row lr-10 gallery-popup">
									<?php foreach( $proofs as $key =>  $proof  ):

											switch( $key % 4 )
										{
											case 0:
												$class_names = 'col-sm-4 ';
											break;

											case 1:
												$class_names = 'col-sm-8 ';
											break;

											case 2:
												$class_names = 'col-sm-8 ';
											break;

											case 3:
												$class_names = 'col-sm-4 ';
											break;

											default:
												$class_names = 'col-sm-4 ';
										}
									?>
										<div class="<?php echo $class_names;?>">
											<?php
												if( $proof['image'] )
												{
													printf( '<a href="%s" class="popup" data-effect="mfp-move-from-top"><img src="%s" class="img-fluid" alt="%s"></a>',
													esc_url($proof['image']['url']), esc_url($proof['image']['url']), 'alt' );
												}
											?>
										</div>
									<?php endforeach; ?>	
								</div>
							</div>
						</div>
					<?php endif; ?>	
				</div>
			</div>
		</section><!-- /success-story -->
	<?php endif; ?>	
	
	<?php $representive = get_field( 'representative' ); $testimonial = get_field( 'testimonial' ); if( !empty($representive || $testimonial) ): ?>
		<section class="representative">
			<div class="container">
				<div class="row lr-10">
					<?php if( $representive['title'] || $representive['content'] ):?>
						<div class="col-12">
							<div class="entry-title">
								<?php
									if( $representive['title'] )
									{
										printf( '<h3 class="title base">%s</h3>', $representive['title'] );
									}
									if( $representive['content'] )
									{
										printf( '%s', $representive['content'] );
									}
								?>
							</div>
						</div>
					<?php endif; ?>

					<?php $project = $representive['projects']; $btn = $representive['button']; if( !empty($project || $btn) ): ?>
						<div class="col-md-6">
							<?php
								if( $project['title'] )
								{
									printf( '%s', $project['title'] );
								}
							?>
							<ul class="icon-list list-unstyled">
								<?php $programs = $project['services']; if( !empty($programs) ){ foreach( $programs as $program )
									{			
										if( $program )
										{
											printf( '<li><i class="%s"></i><span>%s</span></li>', $program['icon'], $program['text'] );
										}
									}
								}
								?>
							</ul>
							<?php
								if(  $project['sub_title'] )
								{
									printf( '<h5>%s</h5>', $project['sub_title'] );
								}							
							?>
							<ul>
								<?php $budgets = $project['budgets'];  if( !empty($budgets) ) { foreach( $budgets as $budget )
									{
										if( $budget )
										{
											printf( '<li>%s</li>', $budget['text'] );
										}

										}
									} 
								?>
							</ul>
							<a href="<?php										
								if( $btn['type']  == 'internal' && !empty($btn['internal_url'] ))
								{
								printf( '%s', esc_url($btn['internal_url']) );
								}
								if( $btn['type'] == 'external' && !empty($btn['external_url'] ))
								{
									printf( '%s', esc_url($btn['external_url']) );
								}
								?>" class="btn primary text-uppercase">
								<?php 										
								if( !empty($btn['text'] ))
								{
									printf( '%s',$btn['text'] );
								}    
								?>
							</a>
						</div>
					<?php endif; ?>	
				<?php $solution = $representive['scalable_solution']; if( !empty($solution) ): ?>
					<div class="col-md-6">
						<?php
							if( $solution['image'] )
							{
								printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url($solution['image']['url']), 'alt' );
							}
							if( $solution['title'] )
							{
								printf( '<h5>%s</h5>', $solution['title'] );
							}
							if( $solution['content'] )
							{
								printf( '%s', $solution['content'] );
							}
						?>
						<ul>
							<?php $expertises = $solution['expertises']; if( !empty($expertises) ) { foreach( $expertises as $expertise )
							 {
								if( $expertise )
								{
									printf( '<li>%s</li>', $expertise['text'] );
								}

								}
							 } 
							?>
						</ul>
					</div>
				<?php endif; ?>	
				</div>
				<?php  $testimonials = get_field( 'testimonial' ); $testimonial_title = get_field( 'testimonial_title' ); if( !empty( $testimonials ) ):?>
					<?php foreach( $testimonials as $testimonial ):?>
						<div class="testimonial">
							<div class="row">
								<div class="col-12">
									<?php
										if( $testimonial_title )
										{
											printf( '<h5 class="widget-title">%s</h5>', $testimonial_title );
										}
									?>
									<blockquote class="blockquote">
										<?php
											if( $testimonial['image'] )
											{
												printf( '<div class="icon float-left"><img src="%s" class="img-fluid" alt="%s"></div>'
												,esc_url($testimonial['image']['url']), 'alt' );
											}
										?>
										<div class="quote">
											<?php
												if( $testimonial['quote'] )
												{
													printf( '%s', $testimonial['quote'] );
												}
											?>
											<div class="client d-flex align-items-center">
												<?php
													if( $testimonial['quote_image'] )
													{
														printf( '<div class="image float-left"><img src="%s" class="img-fluid" alt="%s"></div>'
														,esc_url($testimonial['quote_image']['url']), 'alt' );
													}

													if( $testimonial['name'] || $testimonial['position'] )
													{
														printf( '<div class="txt"><h6 class="name">%s</h6>	<span class="position">%s</span></div>'
														, $testimonial['name'], $testimonial['position'] );
													}
												?>
											</div>
										</div>
									</blockquote>
								</div>
							</div>
						</div>
					<?php endforeach; ?>						
				<?php endif; ?>	
			</div>
		</section><!-- /representative -->
	<?php endif; ?>	
	
	<?php $cref = get_field('cref_solutions');?>
		<section class="crefsolutions">
			<div class="container">
				<?php if( !empty($cref['title']) ):?>
					<div class="row">			
						<div class="col-12">
							<div class="entry-title">
								<?php 
									if($cref['title'])
									{
										printf( '<h3 class="title base">%s</h3>', $cref['title'] );
									}
								?>
							</div>
						</div>
					</div>
				<?php endif; ?>	

				<div class="row lr-10">
				<?php
					$args = array(
						'post_type'         => 'solution',                        
						'order'             => 'DESC',
						'posts_per_page'    =>  4
					);
						
					$the_query = new WP_Query($args); 

					if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); 

					$meta = get_field('cref_solutions');

					?>   
					<div class="col-xl-3 col-sm-6">
						<a href="<?php echo the_permalink();?>" class="solution-box d-flex flex-column align-items-start justify-content-between">
							<div class="text">
								<h5 class="title"><?php echo the_title();?></h5>
									<?php the_content();?>
							</div>
							<?php 
								if( !empty($cref['button_text']) )
								{
									printf( '<div class="bottom"><button class="btn text-uppercase">%s</button></div>', $cref['button_text'] );
									
								}							
							?>
						</a>
					</div>
						<?php
									endwhile;
								endif;
							wp_reset_query();
						?>
				</div>
					<?php get_template_part( 'template_parts/suite');?>
			</div>
		</section><!-- /cref-solutions -->

<?php 

    get_template_part( 'template_parts/call_action');

    get_footer();
?>