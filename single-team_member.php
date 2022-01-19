<?php
 get_header();
 $social = get_field( 'social_media' );
 $position = get_field( 'position' );
 $content = get_field( 'content' );

?>
	<div id="primary" class="content-area">

		<section class="breadcrumb-wrapper">
		    <div class="container">
		        <div class="row">
		            <div class="col-12">
		                <nav class="breadcrumb">
		                    <a href="index.html">Home</a>
		                    <span class="angle-right">/</span>
		                    <a href="about.html">About Us</a>
		                    <span class="angle-right">/</span>
		                    <a class="current-page">Patrick Murphy</a>
		                </nav>
		            </div>
		        </div>
		    </div>
		</section><!-- /breadcrumb -->

		<section class="team-details-page">
			<div class="container">
				<div class="row">
					<?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="col-lg-3 col-md-4 col-sm-5">
							<div class="media">
								<?php
									if(has_post_thumbnail())
									{
										the_post_thumbnail('large', array('class'=>'img-fluid') );
									}
								?>
							</div>
						</div>

					<div class="col-lg-9 col-md-8 col-sm-7">
						<div class="content">
							<div class="title-social d-flex flex-wrap align-items-center">
								<h1 class="title h2"><?php the_title(); ?></h1>
								<ul class="social-media list-inline">
									<?php 
										foreach( $social as $socials){
											if( $socials['icon'] && $socials['url'])
										{
											printf( '<li><a href="%s" class="%s" target="_blank"></a></li>', $socials['url'], $socials['icon']  );
										} 
									}
									?>	
								</ul>
							</div>
								<?php	
								
								
									if( $position ) 
									{
										printf( '<h3 class="sub-title">%s</h3>', $position );
									}

										printf( '<div class="text"><p>%s</p></div>', the_content() );
								?>
						</div>
					</div>
						<?php

								endwhile;
							endif;
						wp_reset_query();

						?>
				</div>
			</div>
		</section><!-- /about-page -->

		<div class="container">
			<div class="row">
				<div class="col-12">
					<hr>
				</div>
			</div>
		</div>

		<section class="all-team-members">
			<div class="container">
				<?php if( !empty($content) ):?>
					<div class="row">
						<div class="col-12">
							<div class="entry-title">
								<?php 
									if( $content['sub_title'] )
									{
										printf( '<span class="sub-title">%s</span>', $content['sub_title'] );
									}
									if( $content['title'] )
									{
										printf( '<h3 class="title base">%s</h3>', $content['title'] );
									}
									if( $content['content'] )
									{
										printf( '%s', $content['content'] );
									}
								?>
							</div>
						</div>
					</div>
				<?php endif;?>

				<div class="teamMemberSlider">
					<?php                           
						$args = array(
							'post_type'         => 'team_member',                        
							'order'             => 'ASC',
							'posts_per_page'    =>  7
						);
							
						$the_query = new WP_Query($args); 

						if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); 
					?>

					<div class="col-xl-3 col-lg-4 col-6">
						<a href="<?php the_permalink();?>" class="team-member">
							<div class="media">
								<?php
									if(has_post_thumbnail())
									{
										the_post_thumbnail('large', array('class'=>'img-fluid') );
									}
								?>
							</div>
							<div class="text">
								<h5 class="name"><?php the_title();?></h5>
								<?php  $position = get_field( 'position' );if( !empty($position) )
							   {
								   printf( '<span class="position">%s</span>', $position );                                                                      
							   }
							   ?>   							
							</div>
						</a>
					</div>
						<?php
								endwhile;
							endif;
						wp_reset_query();

						?>
				</div>

				<div class="row">
					<div class="col-12">
						<div class="team-progress slider-progress">
							<div class="progress"></div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /team-members -->

	</div><!-- /content-area -->



<?php 
   
    get_template_part( 'template_parts/call_action');

    get_footer();
?>