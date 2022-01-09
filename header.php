<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head();?>
</head>
<body  <?php body_class(); ?>>
	<div id="sidr" class="d-none">
        <div class="navbar-header d-flex align-items-center">
    		<a href="#sidr" class="navbar-toggler">
    			<span class="icon-bar"></span>
    		  	<span class="icon-bar"></span>
    		  	<span class="icon-bar"></span>
    	  	</a>

        	<div class="logo">
        	 	<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					 <?php

					 	$logo = get_field( 'logo', 'options' );

						 if( $logo )
						 {
							printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $logo['url'] ), $logo['alt']  );
						 }
						 else
						 {
							printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( get_theme_file_uri( '/images/logo.png' ) ), get_bloginfo( 'name') );
						 }
					 ?>
        	 		
        	 	</a>
        	</div>
        </div>

        <div class="navigation mobile-nav">
            <ul class="nav navbar-nav">
					<?php
                        wp_nav_menu(array(
                            'theme_location'     => 'primary-menu',
                            'depth'              => 2,
                            'container'          => false,
                            'menu_class'         => 'nav navbar-nav',
                            'menu_id'            => '',
                            'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                            'walker'             => new wp_bootstrap_navwalker()
                        ));
                    ?>
              	</li>
            </ul>
        </div>

        <div class="navbar-footer">

			<?php $btn = get_field('button', 'options'); if( $btn ):?>
					
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

			<?php endif;?>	
        </div>
	</div><!-- /mobile-header -->

	<header class="header">
		<div class="navbar navbar-expand">
		  	<div class="container-fluid d-flex align-items-center justify-content-between">
				<div class="navbar-header d-flex align-items-center">
					<div class="navbar-toggler">
							<span class="icon-bar"></span>
						  	<span class="icon-bar"></span>
						  	<span class="icon-bar"></span>
					</div>

					<div class="logo">
					 	<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						 <?php
							$logo = get_field( 'logo', 'options' );

							if( $logo )
							{
								printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $logo['url'] ), $logo['alt']  );
							}
							else
							{
								printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( get_theme_file_uri( '/images/logo.png' ) ), get_bloginfo( 'name') );
							}
					 	?>
					 	</a>
					</div>
				</div>
		
				<div class="collapse navbar-collapse">
				  	<ul class="nav navbar-nav">
						<?php

							wp_nav_menu(array(
								'theme_location'     => 'top-menu',
								'depth'              => 2,
								'container'          => false,
								'menu_class'         => 'nav navbar-nav',
								'menu_id'            => '',
								'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
								'walker'             => new wp_bootstrap_navwalker()
							));
						?>
				  	</ul>
				
				  	<ul class="navbar-nav navbar-nav-right">
					 <?php $social = get_field( 'social_media', 'options' );  if ( $social ):?>
				  	  	<li class="social">
				  	  		<ul class="social-media list-inline">
								<?php 
								
								foreach ( $social as $social_media )
								
								{
									printf( '<li><a href="%s" class="%s" target="_blank"></a></li>', esc_url( $social_media['url'] ), $social_media['icon'] );
								}
																
								?>				  	  			
				  	  		</ul>
				  	  	</li>
					 <?php endif; ?>
				  	  	<li class="header-search">
				  	  		<div class="search-wrap">
				  	  			<a class="search-toggle" data-selector=".search-wrap">
				  	  				<i class="icon-search"></i>
				  	  			</a>
								
				  	  			<form action="" method="get" class="search-box">
				  	  				<input type="search" name="s" class="search-input" id="search"
				  	  					placeholder="Search CREF">
				  	  				<button type="submit" class="search-submit"><i class="icon-search"></i></button>
				  	  			</form>
				  	  		</div>
				  	  	</li>
				  	</ul>	
				</div><!-- /collapse -->
		  	</div><!-- /container-fluid -->
		</div><!--/ Navbar -->
	</header>

	