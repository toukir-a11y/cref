<?php
 /* Template Name: solutions */ 

 get_header();
 $solution = get_field( 'content' );
 
?>
	<div id="primary" class="content-area">
        
        <?php
            if( !empty($solution['image']) )
            {
                printf( '<div class="page-header"><img src="%s" class="img-fluid" alt="%s"></div>', esc_url($solution['image']['url']), 'alt' );
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

		<section class="solutions-page">
			<div class="container">
                <?php if( !empty($solution['title'] || $solution['sub_title'] || $solution['content']) ):?>    
                    <div class="row">
                        <div class="col-12">
                            <div class="entry-title">
                                <?php 
                                    if($solution['title'])
                                    {
                                        printf( ' <h1 class="title h2 primary text-uppercase">%s</h1>', $solution['title'] );                                        
                                    }
                                    if( $solution['sub_title'] )
                                    {
                                        printf( ' <h3 class="sub-title base">%s</h3>',$solution['sub_title'] );
                                    }
                                    if( $solution['content'] )
                                    {
                                        printf( '%s',$solution['content'] );
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>    

				<div class="row lr-10 minus">
                        <?php

                            $args = array(
                                'post_type'         => 'solution',                        
                                'order'             => 'ASC',
                                'posts_per_page'    =>  4
                            );
                                
                            $the_query = new WP_Query($args); 

                            if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); 
                           
                           $meta = get_field('meta_field');
                            
					    ?>   
					<div class="col-md-6">
						<a href="<?php the_permalink();?>" class="solution-item">
							<div class="icon float-right">
								<i class="<?php if( !empty($meta) ): echo $meta['icon']; endif;?>"></i>
							</div>

							<div class="text">
								<h5 class="title"><?php the_title();?></h5>

                                
								<ul class="arrow-lists list-unstyled">
                                <?php $points = $meta['points']; if( !empty($points) ){ foreach( $points as $point ) 
                                    {
                                            if( ($point['text']) )
                                            {
                                                printf( '<li>%s</li>', $point['text'] );
                                            }
                                        }

                                    } 
							    ?>
								</ul>
                               
                                <?php
                                    if( $meta['text'] )
                                    {
                                        printf( '<button class="btn text-uppercase">%s</button>',$meta['text'] );
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
		</section><!-- /about-page -->

	</div><!-- /content-area -->


<?php 

    
    get_template_part( 'template_parts/call_action');

    get_footer();
?>