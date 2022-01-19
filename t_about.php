<?php

 /* Template Name: About */ 

 get_header();

?>
	<div id="primary" class="content-area">

		<div class="page-header">
			<img src="<?php echo get_theme_file_uri();?>/images/page-header-about.jpg" class="img-fluid" alt="">
		</div>

		<section class="breadcrumb-wrapper">
		    <div class="container">
		        <div class="row">
		            <div class="col-12">
		                <nav class="breadcrumb">
		                    <a href="index.html">Home</a>
		                    <span class="angle-right">/</span>
		                    <a class="current-page">About Us</a>
		                </nav>
		            </div>
		        </div>
		    </div>
		</section><!-- /breadcrumb -->
    <?php $about = get_field( 'about_cref' ); $btn = $about['button']; $feature = $about['features']; if( !empty($about) ):?>
		<section class="about-page">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="entry-title">
							<div class="text">
                                <?php
                                    
                                    if ($about['title'])
                                    {
                                        printf( '<h1 class="title h2 primary text-uppercase">%s</h1>', $about['title'] );
                                    }
                                    if ($about['sub_title'])
                                    {
                                        printf( '<h3 class="sub-title base">%s</h3>', $about['sub_title'] );
                                    }
                                    if ($about['description'])
                                    {
                                        printf( '%s', $about['description'] );
                                    }

                                    echo '</div>';
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
            
                                     ?>"  class="btn">

                                    <?php 
                                        
                                        if( !empty($btn['text'] ))
                                        {
                                            printf( '%s',$btn['text'] );
                                        }

                                        
                                    ?>

                                    <span class="icon-arrow-right-alt"></span>
                                </a>
                            </div>
                        </div>
                    </div>

				<div class="row lr-10">

                    <?php if ( !empty($about['content']) )
                                        
                        {
                            printf( '<div class="col-lg-5"><div class="content">%s</div></div>', $about['content'] );
                        }                        
                    ?>

                <?php if( !empty($feature) ):?>         
					<div class="col-lg-7">
						<div class="about-features d-flex flex-column align-items-start justify-content-center">
                            <?php foreach( $feature as $features ):?>
                                <div class="about-feature">

                                    <?php 
                                        if($features['number'])
                                        {
                                            printf( '<div class="number float-left"> <span class="counter h1">%s</span></div>', $features['number'] );                                        
                                        }
                                        if( $features['text'] )
                                        {
                                            printf( '<div class="text">%s</div>',$features['text'] );
                                        }
                                    ?>
                                    
                                </div>
                            <?php endforeach; ?>
						</div>
					</div>
                    <?php endif; ?>
				</div>
			</div>
		</section><!-- /about-page -->
        <?php endif; ?>

		<div class="container">
			<div class="row">
				<div class="col-12">
					<hr style="border-color: #ECF1F8">
				</div>
			</div>
		</div>
   
		<section class="leadership-team">
			<div class="container">
				<div class="row">
                    <?php $team = get_field( 'meet_the_team' ); $position = get_field('position'); if( !empty($team) ):?>    
                        <div class="col-12">
                            <div class="entry-title text-center">
                                <?php
                                    if( $team['title'] && $team['content'] )
                                    {
                                        printf( ' <h3 class="title base">%s</h3>%s', $team['title'], $team['content']  );
                                    }

                                    
                                ?>                                
                            </div>
                        </div>
                    <?php endif; ?>    
				</div>
                
 
				<div class="row lr-10 minus">

                <?php                           
                    $args = array(
                        'post_type'         => 'team_member',                       
                        'order'             => 'ASC',
                        'posts_per_page'    =>  7,

                       
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
								<h5 class="name"><?php the_title(); ?></h5>

                                <?php  $position = get_field( 'position' ); 
                               
                                if( !empty($position) )
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
			</div>
		</section><!-- /leadership-team -->

		<div class="gray-bakground">
        <?php $core_value = get_field( 'core_values' ); $value = $core_value['values']; if( !empty($core_value) ): ?>
			<section class="core-values">
				<div class="container">
                    <?php if( !empty($core_value['title'] || $if( $core_value['content'] )) ): ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="entry-title text-center">
                                    
                                    <?php 
                                        if( $core_value['title'] || $core_value['content'] )
                                        {
                                            printf( '<h3 class="title base">%s</h3>%s', $core_value['title'], $core_value['content'] );
                                        }                                
                                    ?>								
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                <?php if( !empty($value) ): ?>
					<div class="row lr-10 minus justify-content-center">
                        <?php foreach( $value as $values ) :?>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="core-value text-center">

                                    <?php

                                        if( $values['icon'] )
                                        {
                                            printf( '<div class="icon"><i class="%s"></i></div>', $values['icon'] );                                                
                                        }
                                        if( $values['title'] || $values['content'] )
                                        {
                                            printf( '<div class="text"><h5 class="title">%s</h5>%s</div>', $values['title'], $values['content'] );
                                        }

                                    ?>

                                </div>
                            </div>
                        <?php endforeach; ?>
					</div>
                <?php endif; ?>
            </div>
        </section><!-- /core-values -->
    <?php endif; ?>

			<div class="container">
				<div class="row">
					<div class="col-12">
						<hr style="border-color: #D5DFE8">
					</div>
				</div>
			</div>
        <?php $partner = get_field( 'partners' ); $pitem = $partner['partners_item']; $qitem = $partner['quate']; $nitem = $partner['partners_items'];  if( !empty($partner) ): ?>                                
			<section class="partners-introduction">
				<div class="container">
                    <?php if( !empty($partner['title'] || $partner['content']) ):  ?> 
                        <div class="row">                       
                            <div class="col-12">
                                <?php 
                                    if( $partner['title'] || $partner['content'] )
                                    {
                                        printf( '<div class="entry-title text-center"><h3 class="title base">%s</h3>%s</div>', $partner['title'], $partner['content'] );   
                                    }
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>

					<div class="row lr-10 masonry minus">
                        <?php if( $pitem ):   foreach( $pitem as $item ):?>
                            <div class="col-xl-3 col-lg-3 col-6 item">
                                <?php 
                                    if($item['url'])
                                    {
                                        printf( '<a href="%s" class="partner-item d-flex align-items-center justify-content-center">', $item['url'] );
                                    }
                                    if( $item['image'] )
                                    {
                                        printf( '<img src="%s" class="img-fluid" alt="%s">', $item['image']['url'], 'alt' );
                                    }
                                ?>   
                                </a>
                            </div>
                        <?php 
                            endforeach;                         
                        endif; 
                        ?>
                           
                            <div class="col-xl-6 col-lg-6 col-sm-12 item">
                                    <?php 
                                        if( $partner['url'] )
                                        {
                                            printf( ' <a href="%s" class="partner-item big">', $partner['url'] );
                                        }
                                        if( $partner['image'] )
                                        {
                                            printf( '<div class="top"><div class="qsdots"></div><img src="%s" class="img-fluid" alt="%s"></div>', esc_url( $partner['image']['url'] ), 'alt' );
                                        }
                                    ?>

                                <?php if( !empty($qitem) ): ?>
                                    <div class="blockquoteSlider">
                                        <?php foreach ($qitem as $quates): ?>
                                            <div class="quote-item">

                                                <?php 

                                                    if($quates['content'] ||$quates['name'] || $quates['position'] || $quates['company'] )
                                                    {
                                                        printf( '%s  <div class="bottom"> <h6 class="name">%s</h6> <span class="position">%s</span><span class="company">%s</span></div>'
                                                        ,$quates['content'], $quates['name'], $quates['position'], $quates['company']  );
                                                    }

                                                ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>    

                                    <div class="slider-controls d-flex align-items-end justify-content-between">
                                        <div class="pqsprogress slider-progress">
                                            <div class="progress"></div>
                                        </div>

                                        <div class="play-pause pqsPlayPause">
                                            <i class="icon-pause"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>

                                <?php foreach( $nitem as $items ): ?>                                
                                    <div class="col-xl-3 col-lg-3 col-6 item">
                                        <?php
                                            if( $items['url'] )
                                            {
                                                printf( '<a href="%s" class="partner-item d-flex align-items-center justify-content-center">', esc_url($items['url']) );
                                            }
                                            if( $items['image'] )
                                            {
                                                printf( '<img src="%s" class="img-fluid" alt="%s">', $items['image'], 'alt' );
                                            }
                                        ?>
							
                                            
                                        </a>
                                    </div>
                                <?php endforeach ;?>
                            </div>
                        </div>
                    </section><!-- /partners-introduction -->
                <?php endif; ?>    

		</div><!-- /background -->
    <?php $suite = get_field( 'software_suite' ); $btn = $suite['button']; if( !empty($suite) ): ?>                        
		<section class="software-suite">
			<div class="container">
				<div class="row lr-10 align-items-center">
					<div class="col-lg-4 col-md-5">
						<div class="entry-title">
                            <?php
                            
                                if( $suite['sub_title'] )
                                {
                                    printf( '<span class="sub-title">%s</span>', $suite['sub_title'] );
                                }
                                if($suite['title'])
                                {
                                    printf( '<h3 class="title base">%s</h3>', $suite['title'] );
                                }
                                if( $suite['content'] )
                                {
                                    printf( '%s', $suite['content'] );
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
															
										if( !empty($btn['text'] ))
										{
											printf( '%s',$btn['text'] );
										}
									?>
                            </a>
						</div>
					</div>
                  
                    <?php if( !empty($suite['image']) )
                    {
                        printf( '<div class="col-lg-8 col-md-7"><div class="media"><img src="%s" class="img-fluid" alt="%s"></div></div>',
                        esc_url($suite['image']['url']), 'alt' );
                    }
                    
                    ?>             
				</div>
			</div>
		</section><!-- /software-suite -->
    <?php endif;?>

	</div><!-- /content-area -->



<?php 
    
    get_template_part( 'template_parts/call_action');

    get_footer();
?>