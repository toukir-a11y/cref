<?php

 /* Template Name: Contact*/

    get_header();

    $image = get_field('bg_image'); $contact = get_field('content'); $option = get_field( 'contact','options' ); 
    $location = $option['locations'];  $widget = $location['widgets']; 
 ?>


	<div class="header_gutter"></div>

	<div id="primary" class="content-area">

    <?php 
        if( !empty($image) )
        {
            printf( '<div class="page-header"><img src="%s" class="img-fluid" alt="%s"></div>', esc_url($image['url']), 'alt' );
        }
    ?>

		<section class="breadcrumb-wrapper">
		    <div class="container">
		        <div class="row">
		            <div class="col-12">
		                <nav class="breadcrumb">
		                    <a href="index.html">Home</a>
		                    <span class="angle-right">/</span>
		                    <a class="current-page">Contact Us</a>
		                </nav>
		            </div>
		        </div>
		    </div>
		</section><!-- /breadcrumb -->
    <?php if( !empty( $contact &&  $option) ): ?>  
		<section class="contact-page">
			<div class="container">
                <?php if( $contact['sub_title'] || $contact['title'] ): ?>    
                    <div class="row">
                        <div class="col-12">
                            <div class="entry-title">
                                <?php 
                                    if( $contact['sub_title'] )
                                    {
                                        printf( '<h1 class="title h2 primary text-uppercase">%s</h1>', $contact['sub_title'] );
                                    }
                                    if( $contact['title'] )
                                    {
                                        printf( '<h3 class="sub-title base">%s</h3>', $contact['title'] );
                                    }
                                
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>    

				<div class="row">
                    <?php if( $location && $widget ):?>
                        <div class="col-lg-6">
                            <div class="content">
                                <?php 

                                    if( $location['title'] )
                                    {
                                        printf( '<h4 class="title">%s</h4>', $location['title'] );
                                    }
                                    if( $location['sub_title'] && $location['content'] && $location['number'] )
                                    {
                                        printf( '<p>%s<a href="%s">%s</a>%s</p>',
                                        $location['sub_title'], $location['number'], $location['number'],$location['content'] );
                                    }
                                ?>

                                <?php if( $widget ): ?>
                                <div class="row lr-10 minus">
                                    <?php foreach( $widget as $widgets ): ?>
                                        <div class="col-6">
                                            <address class="widget-location">
                                                <?php

                                                    if( $widgets['title'] )
                                                    {
                                                        printf( ' <span class="location-title">%s</span>', $widgets['title'] );
                                                    }
                                                    if( $widgets['google_map_url'] && $widgets['address'] )
                                                    {
                                                        printf( '<a href="%s" target="_blank">%s</a>', $widgets['google_map_url'], $widgets['address'] );
                                                    }
                                                    
                                                ?>                                      
                                            </address>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>    
                            </div>
                        </div>
                    <?php endif; ?>    

					<div class="col-lg-6">
						<div class="contact-form">
							<h4 class="form-title">Send us a Message</h4>

							<img src="../images/form.png" class="img-fluid w-100" alt="">
						</div>
					</div>
				</div>
			</div>
		</section><!-- /contact-page -->
    <?php endif; ?>    

	</div><!-- /content-area -->

<?php 
    
    get_template_part( 'template_parts/call_action');

    get_footer();
?>