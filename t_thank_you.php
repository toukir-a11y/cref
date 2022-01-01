<?php
 /* 
 Template Name: Thank you*/

  get_header();
  ?>


	<div class="header_gutter"></div>

	<div id="primary" class="content-area">

		<div class="page-header">
			<img src="../images/page-header-thankyou.jpg" class="img-fluid" alt="">
		</div>

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

    <?php $msg = get_field( 'message' ); $item = $msg['interesting_item']; if( $msg ): ?>

		<section class="contact-page thankyou-page">
			<div class="container">
				<div class="row">
					<div class="col-12">
                        <?php
                         if( $msg['title'] || $msg['content'] )
                         {
                             printf(
                                 
                                        '<div class="entry-title">
                                            <h1 class="title h2 primary text-uppercase">%s</h1>
                                                <h3 class="sub-title base">%s</h3>
                                        </div>',$msg['title'], $msg['content']
                                        
                                    );
                         }

                         echo '<div class="row lr-10 minust">';
                         
                        ?>

                        <?php if ( !empty($item) ): foreach( $item as $items ):?>
							<div class="col-lg-4 col-sm-6">
                                
                                    <?php 
                                        if( $items['url'] )
                                        {
                                            printf( '<a href="%s" class="interesting-item d-flex align-items-end justify-content-between">', esc_url( $items['url'] ) );
                                        }
                                        if( $items['sub_title'] || $items['title'] )
                                        {
                                            printf(
                                                        '<div class="text">
                                                            <span class="sub-title">Solutions</span>
                                                                <h4 class="title">Facilities Performance Services</h4>
                                                        </div>', $items['sub_title'], $items['title'] 
                                                );
                                        }
                                    ?>
								
                                    <div class="arrow">
                                        <i class="icon-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                                <?php
                                        endforeach;
                                        
                                    endif;
                                ?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /contact-page -->

    <?php endif;?>

	</div><!-- /content-area -->

<?php 
    
    get_template_part( 'template_parts/call_action');

    get_footer();
?>