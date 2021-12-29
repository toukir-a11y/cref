<div class="container">
		<div class="row">
			<div class="col-12">
				<hr class="two">
			</div>
		</div>
	</div>

	<footer class="footer">
		<div class="container">
			<div class="row lr-10">
				<div class="col-lg-3">
					<div class="footer-logo">
						<a href="<?php echo esc_url( home_url( '/' ) );?>">

						<?php

							$footer_logo = get_field( 'footer_logo', 'options' );

							if( $footer_logo )
							{
							printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $footer_logo['url'] ), $footer_logo['alt']  );
							}
							else
							{
							printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( get_theme_file_uri( '/images/footer-logo.png' ) ), get_bloginfo( 'name') );
							}
						?>
							
						</a>
					</div>
				</div>

				<div class="col-lg-8">
					<div class="footer-menu">
					<?php
                        wp_nav_menu(array(
                            'theme_location'     => 'footer-menu',
                            'depth'              => 2,
                            'container'          => false,
                            'menu_class'         => 'list-inline',
                            'menu_id'            => '',
                            'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                            'walker'             => new wp_bootstrap_navwalker()
                        ));
                    ?>
					</div>

					<div class="row lr-10">
						<div class="col-sm-6">
							<div class="footer-widget">
								<ul class="footer-widget-menu list-unstyled">
									<li class="title"><a href="#">Capital Program Management</a></li>
									<li><a href="#">Capital Budget Planning
									<li><a href="#">Staff Programming & Fit Planning</a></li>
									<li><a href="#">Owners Project Management</a></li>
									<li><a href="#">Funding Requisitioning & Allocation</a></li>
								</ul>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="footer-widget">
								<ul class="footer-widget-menu list-unstyled">
									<li class="title"><a href="#">Real Estate Services</a></li>
									<li><a href="#">Development/ Acquisitions/ Disposition</a></li>
									<li><a href="#">Property Management</a></li>
									<li><a href="#">Lease Administration</a></li>
									<li><a href="#">Tenant Coordination</a></li>
								</ul>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="footer-widget">
								<ul class="footer-widget-menu list-unstyled">
									<li class="title"><a href="#">Green Seal</a></li>
									<li><a href="#">Environmental Engineering</a></li>
									<li><a href="#">Civil Engineering</a></li>
									<li><a href="#">Land Surveying</a></li>
									<li><a href="#">3D Laser Scanning</a></li>
									<li><a href="#">Energy</a></li>
								</ul>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="footer-widget">
								<ul class="footer-widget-menu list-unstyled">
									<li class="title"><a href="#">Facilities Performance Services</a></li>
									<li><a href="#">Regulatory Preparedness</a></li>
									<li><a href="#">Organizational Integration</a></li>
									<li><a href="#">Facilities Management</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="copyright-wrapper">	
				<div class="row lr-10 align-items-center">
				<?php $social = get_field( 'social_media', 'options' );  if ( !empty($social) ):?>
					<div class="offset-lg-3 col-lg-4 col-sm-6">
						<ul class="social-media list-inline">
							<?php 								
								foreach ( $social as $social_media )
								
								{
									printf( '<li><a href="%s" class="%s" target="_blank"></a></li>', esc_url( $social_media['url'] ), $social_media['icon'] );
								}																
							?>
						</ul>
					</div>
					<?php endif;?>

				<?php $copyright = get_field( 'copyright', 'options' ); if( !empty ($copyright) ):?>
					<div class="col-lg-5 col-sm-6">
						<div class="copyright">
							<?php 
								if ( $copyright )
								{
									printf( '%s', $copyright );
								}
							?>
						</div>
					</div>
				<?php endif;?>
				</div>
			</div>
		</div>
	</footer><!-- /footer -->

<?php wp_footer();?>
</body>
</html>