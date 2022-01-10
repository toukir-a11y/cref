<?php get_header();?>


	<div class="header_gutter"></div>

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

				<?php $proof = $success['the_proof']; if( !empty($proof) || $success['title'] ): ?>
					<div class="col-lg-6">
						<div class="theproof">
							<h5 class="title">The Proof</h5>

							<div class="row lr-10 gallery-popup">
								<div class="col-4">
									<a href="../images/theproof-1.jpg" class="popup" data-effect="mfp-move-from-top">
										<img src="../images/theproof-1.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="col-8">
									<a href="../images/theproof-2.jpg" class="popup" data-effect="mfp-move-from-top">
										<img src="../images/theproof-2.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="col-8">
									<a href="../images/theproof-3.jpg" class="popup" data-effect="mfp-move-from-top">
										<img src="../images/theproof-3.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="col-4">
									<a href="../images/theproof-4.jpg" class="popup" data-effect="mfp-move-from-top">
										<img src="../images/theproof-4.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="col-4">
									<a href="../images/theproof-5.jpg" class="popup" data-effect="mfp-move-from-top">
										<img src="../images/theproof-5.jpg" class="img-fluid" alt="">
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>	
				</div>
			</div>
		</section><!-- /success-story -->
	<?php endif; ?>	

		<section class="representative">
			<div class="container">
				<div class="row lr-10">
					<div class="col-12">
						<div class="entry-title">
							<h3 class="title base">Nothing’s Too Big or Too Small…</h3>
							<p>We’re able to concurrently manage thousands of complex healthcare-based projects at any give time.</p>
						</div>
					</div>

					<div class="col-md-6">
						<p>Representative projects include:</p>

						<ul class="icon-list list-unstyled">
							<li><i class="icon-womens"></i><span>Women’s services, facilities and expansions</span></li>
							<li><i class="icon-mri"></i><span>Diagnostic imaging equipment</span></li>
							<li><i class="icon-drugs"></i><span>Substance abuse</span></li>
							<li><i class="icon-lab-test"></i><span>Cath labs</span></li>
							<li><i class="icon-operating-room"></i><span>Operating rooms</span></li>
							<li><i class="icon-hospital"></i><span>Patient bed expansions</span></li>
							<li><i class="icon-pulse"></i><span>ICUs</span></li>
						</ul>

						<h5>A near perfect track record for on-time and on-budget:</h5>

						<ul>
							<li>Prioritize cash flows</li>
							<li>Deferred capital</li>
							<li>Mental Health</li>
						</ul>

						<a href="#" class="btn primary text-uppercase">See an example of strategic planning and campus updates</a>
					</div>

					<div class="col-md-6">
						<img src="../images/map.svg" class="img-fluid" alt="">
						<h5>Scalable + Expertise</h5>
						<p>CREF if your scalable solution – whether as an extension of your facilities group across a large geographical footprint, or being able to assess early potential projects</p>

						<ul>
							<li>1000 projects managed at one time</li>
							<li>1 billion dollars worth of projects at any given time</li>
							<li>Broad spectrum of complexity ranging from cosmetic upgrades to hybrid surgery suites</li>
							<li>Full ground-up hospital construction</li>
						</ul>
					</div>
				</div>

				<div class="testimonial">
					<div class="row">
						<div class="col-12">
							<h5 class="widget-title">Testimonial</h5>

							<blockquote class="blockquote">
								<div class="icon float-left">
									<img src="../images/svg/quote.svg" class="img-fluid" alt="">
								</div>

								<div class="quote">
									<p>CREF has been instrumental in helping us manage our growth from 9 to 40 hospitals.  They help us prioritize and manage capital requests, understand the complexities of our geographic footprint and our healthcare asset portfolio, and so this with a responsiveness that feels like we’re all one team.</p>

									<div class="client d-flex align-items-center">
										<div class="image float-left">
											<img src="../images/testimonial.jpg" class="img-fluid" alt="">
										</div>

										<div class="txt">
											<h6 class="name">John Polanowicz</h6>
											<span class="position">Former Steward COO, Hospital President</span>
										</div> 
									</div>
								</div>
							</blockquote>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /representative -->

		<section class="crefsolutions">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="entry-title">
							<h3 class="title base">CREF Solutions</h3>
						</div>
					</div>
				</div>

				<div class="row lr-10">
					<div class="col-xl-3 col-sm-6">
						<a href="#" class="solution-box d-flex flex-column align-items-start justify-content-between">
							<div class="text">
								<h5 class="title">Capital Program Management (CPM</h5>
								<p>The integration of CREF capital program management complements your team with an infusion of historical, real-time, and predictive data.</p>
							</div>
							
							<div class="bottom">
								<button class="btn text-uppercase">View Details</button>
							</div>
						</a>
					</div>

					<div class="col-xl-3 col-sm-6">
						<a href="#" class="solution-box d-flex flex-column align-items-start justify-content-between">
							<div class="text">
								<h5 class="title">Real Estate Services</h5>
								<p>Our real estate services platform includes a fully automated database of portfolio metrics.</p>
							</div>
							
							<div class="bottom">
								<button class="btn text-uppercase">View Details</button>
							</div>
						</a>
					</div>

					<div class="col-xl-3 col-sm-6">
						<a href="#" class="solution-box d-flex flex-column align-items-start justify-content-between">
							<div class="text">
								<h5 class="title">Facilities Performance Services (FPS)</h5>
								<p>Utilizing real-time facilities data, our industry-leading professionals implement strategic plans.</p>
							</div>
							
							<div class="bottom">
								<button class="btn text-uppercase">View Details</button>
							</div>
						</a>
					</div>

					<div class="col-xl-3 col-sm-6">
						<a href="#" class="solution-box d-flex flex-column align-items-start justify-content-between">
							<div class="text">
								<h5 class="title">Energy & Engineering</h5>
								<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam</p>
							</div>
							
							<div class="bottom">
								<button class="btn text-uppercase">View Details</button>
							</div>
						</a>
					</div>
				</div>

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
		</section><!-- /cref-solutions -->

		<div class="container">
			<div class="row">
				<div class="col-12">
					<hr class="two">
				</div>
			</div>
		</div>

	</div><!-- /content-area -->

<?php 

    get_template_part( 'template_parts/call_action');

    get_footer();
?>