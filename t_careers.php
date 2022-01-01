<?php
 /* Template Name: Careers */

 get_header();
 
 ?>

<div class="header_gutter"></div>

<div id="primary" class="content-area">

    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="breadcrumb">
                        <a href="index.html">Home</a>
                        <span class="angle-right">/</span>
                        <a class="current-page">Careers</a>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- /breadcrumb -->

    <?php $career = get_field( 'career_opportunities' ); if ( !empty($career) ): ?>
		<section class="careers-page">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="entry-title">

                                <?php 
                                    
                                    if ($career['sub_title'])
                                    {
                                        printf( '<h1 class="title h2 primary text-uppercase">%s</h1>', $career['sub_title'] );
                                    }
                                    if ($career['title'])
                                    {
                                        printf( '<h3 class="sub-title base">%s</h3>', $career['title'] );
                                    }

                                    echo"</div>";
                                                                
                                    if( !empty('url') )
                                    {
                                        printf( '<a href="%s" class="popup-video" data-effect="mfp-move-from-top">', esc_url($career['url']) );
                                    }

                                    if( !empty('image') )
                                    {
                                        printf('<div class="media"> <img src="%s" class="img-fluid" alt="%s"> </div>', esc_url($career['image']['url']), "alt" );
                                    }
                                    echo '<div class="text">';
                                    
                                    if( !empty($career['video_sub_title']) )
                                    {
                                        printf( '<h4 class="title">%s</h4>', $career['video_sub_title'] );
                                    }
                                    if( !empty($career['video_title']) )
                                    {
                                        printf( '%s', $career['video_title'] );
                                    }
                                    
                                ?>

							</div>
						 </a>
					</div>
				</div>
			</div>
		</section><!-- /careers-page -->
        <?php endif;?>
        
        <?php $positon = get_field( 'open_position' ); $btn = $positon['button']; if ( !empty($positon) ):?>
		<section class="open-positions">
            <?php if( $positon['title'] || $positon['content'] || $btn ):?>
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="content text-center">
                            <?php
                                 if( $positon['title'] )
                                 {
                                    printf( '<h3 class="title">%s</h3>', $positon['title'] );
                                 }
                                 if( $positon['content'] )
                                 {
                                     printf('%s',$positon['content']);
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
            
                                     ?>"  class="btn primary text-uppercase">

                                    <?php 
                                        
                                        if( !empty($btn['text'] ))
                                        {
                                            printf( '%s',$btn['text'] );
                                        }
                                    ?>                            
                            </a>
						</div>
					</div>  
				</div>
			</div>
            <?php endif;?>
		</section><!-- /open-positions -->
        <?php endif;?>

    <?php $features = get_field( 'popup_gallery' ); if ($features): ?>
		<section class="careers-features">
			<div class="container">
				<div class="row zero gallery-popup">
                  <?php foreach( $features as $feature ): ?>
					<div class="col-md-4 col-sm-6">
                        
                        <?php 
                            if ($feature ['image'] && $feature['display']==true )
                            {
                                printf( '<a href="%s" class="careers-feature-item image popup" data-effect="mfp-move-from-top">
                                <div class="media">
                                    <img src="%s" class="img-fluid" alt="">
                                </div></a>',
                                $feature['image']['url'],$feature['image']['url']);
                            }

                            elseif( $feature['url'] && $feature['icon'] && $feature['title'] && $feature['content'] && $feature['display']== false ) { ?> 

                            <?php if ( $feature['url'] )
                            {
                                printf( ' <a href="%s" class="careers-feature-item d-flex flex-column align-items-center justify-content-center">', esc_url($feature['url']) );
                            }

                            if( $feature['icon'] )
                            {
                                printf( '<div class="icon"><i class="%s"></i></div>', $feature['icon']);
                            }
                            if( $feature['title'] || $feature['content'] )
                            {
                                printf( '<div class="text"><h4 class="title">%s</h4>%s</div>', $feature['title'], $feature['content'] );
                            }

                            echo'</a>';
                            }

                            ?>      							
					</div>
                <?php endforeach; ?>
				</div>
			</div>
		</section><!-- /careers-features -->
        <?php endif;?>

		<div class="gray-background" style="background: #F5F9FD">

    <?php $call = get_field( 'call_action' ); $btn = $call['button']; if( !empty($call) ): ?>
		<section class="careers-call-action pb-0">
			<div class="container">
				<div class="row">
					<div class="col-12">
                    <div class="content" <?php if ( $call['image'] ) echo 'style="background-image: url('.esc_url( $call['image']['url'] ).');"'; ?>>
                        <?php 
                            if( $call['title'] )
                            {
                                printf( '<h3 class="title">%s</h3>', $call['title'] );
                            }
                            if( $call['content'] )
                            {
                                printf( '%s', $call['content'] );
                            }
                        ?>
							
							<a href="  <?php
										
										if( $btn['type']  == 'internal' && !empty($btn['internal_url'] ))
										{
										printf( '%s', esc_url($btn['internal_url']) );
										}
										if( $btn['type'] == 'external' && !empty($btn['external_url'] ))
										{
											printf( '%s', esc_url($btn['external_url']) );
										}
			
								  	?>"
										class="btn primary text-uppercase">
									<?php 
															
										if( !empty($btn['text'] ))
										{
											printf( '%s',$btn['text'] );
										}
									?>
						</a>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /careers-call-action -->
        <?php endif; ?>

		<section class="cref-activities">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="entry-title">
							<h3 class="title base">CREF Activities</h3>
							<p>Swipe or click and drag to scroll through</p>
						</div>
					</div>
				</div>

				<div class="activitiesSlider">
					<div class="col-sm-6">
						<div class="activities-item">
							<div class="media">
								<a href="blog-details.html">
									<img src="../images/activities-item-1.jpg" class="img-fluid" alt="">
								</a>
							</div>

							<div class="text">
								<a href="blog-details.html">
									<h4 class="title">CREF Team has a Blast at Fenway</h4>
									<p>We all had some much fun on this day. We went to the Red Sox game versus The Yankees and we won 7-5. The team all stayed after innings to enjoy some time together and get autographs.</p>

									<a href="#" class="btn text-uppercase">View blog post</a>
								</a>
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="activities-item">
							<div class="media">
								<a href="blog-details.html">
									<img src="../images/activities-item-2.jpg" class="img-fluid" alt="">
								</a>
							</div>

							<div class="text">
								<a href="blog-details.html">
									<h4 class="title">CREF Summer Party</h4>
									<p>We all had some much fun on this day. We went to the Red Sox game versus The Yankees and we won 7-5. The team all stayed after innings to enjoy some time together and get autographs.</p>

									<a href="#" class="btn text-uppercase">View blog post</a>
								</a>
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="activities-item">
							<div class="media">
								<a href="blog-details.html">
									<img src="../images/activities-item-2.jpg" class="img-fluid" alt="">
								</a>
							</div>

							<div class="text">
								<a href="blog-details.html">
									<h4 class="title">Getting Ready for</h4>
									<p>We all had some much fun on this day. We went to the Red Sox game versus The Yankees and we won 7-5. The team all stayed after innings to enjoy some time together and get autographs.</p>

									<a href="#" class="btn text-uppercase">View blog post</a>
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="activities-item">
							<div class="media">
								<a href="blog-details.html">
									<img src="../images/activities-item-1.jpg" class="img-fluid" alt="">
								</a>
							</div>

							<div class="text">
								<a href="blog-details.html">
									<h4 class="title">CREF Team has a Blast at Fenway</h4>
									<p>We all had some much fun on this day. We went to the Red Sox game versus The Yankees and we won 7-5. The team all stayed after innings to enjoy some time together and get autographs.</p>

									<a href="#" class="btn text-uppercase">View blog post</a>
								</a>
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="activities-item">
							<div class="media">
								<a href="blog-details.html">
									<img src="../images/activities-item-2.jpg" class="img-fluid" alt="">
								</a>
							</div>

							<div class="text">
								<a href="blog-details.html">
									<h4 class="title">CREF Summer Party</h4>
									<p>We all had some much fun on this day. We went to the Red Sox game versus The Yankees and we won 7-5. The team all stayed after innings to enjoy some time together and get autographs.</p>

									<a href="#" class="btn text-uppercase">View blog post</a>
								</a>
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="activities-item">
							<div class="media">
								<a href="blog-details.html">
									<img src="../images/activities-item-2.jpg" class="img-fluid" alt="">
								</a>
							</div>

							<div class="text">
								<a href="blog-details.html">
									<h4 class="title">Getting Ready for</h4>
									<p>We all had some much fun on this day. We went to the Red Sox game versus The Yankees and we won 7-5. The team all stayed after innings to enjoy some time together and get autographs.</p>

									<a href="#" class="btn text-uppercase">View blog post</a>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /cref-activities -->

		</div><!-- /gray-background -->

		<section class="current-openings">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="jobs-embed">
							<iframe src="https://cref.bamboohr.com/jobs/" frameborder='0' allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /current-openings -->
	


<?php 

	get_template_part( 'template_parts/call_action');
	
	get_footer(); 
?>


 