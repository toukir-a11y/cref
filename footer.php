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
				<?php $widgets = get_field( 'widgets', 'options' );  if( $widgets ): ?>
					<div class="row lr-10">	
						<?php $left_one = $widgets['left_widgets_one']; if ( $left_one ):?>		
						<div class="col-sm-6">
							<div class="footer-widget">
								<ul class="footer-widget-menu list-unstyled">

									<?php foreach( $left_one as $one_left ):?>

										<li>											
											<a href="<?php
											
												if( $one_left['type']  == 'internal' && !empty($one_left['internal_url'] ))
												{
												printf( '%s', esc_url($one_left['internal_url']) );
												}
												if( $one_left['type'] == 'external' && !empty($one_left['external_url'] ))
												{
													printf( '%s', esc_url($one_left['external_url']) );
												}
												
												?>">
												
												<?php 
																
												if( !empty($one_left['text'] ))
												{
													printf( '%s',$one_left['text'] );
												}
												?>
											</a>
										</li>									
									<?php endforeach;?>																																												
								</ul>
							</div>
						</div>
						<?php endif;?>

						<?php $right_one = $widgets['Right_widgets_one']; if ( $right_one ):?>
						<div class="col-sm-6">
							<div class="footer-widget">
								<ul class="footer-widget-menu list-unstyled">
									<?php foreach( $right_one as $one_right ):?>	
										<li>											
											<a href="<?php
											
												if( $one_right['type']  == 'internal' && !empty($one_right['internal_url'] ))
												{
												printf( '%s', esc_url($one_right['internal_url']) );
												}
												if( $one_right['type'] == 'external' && !empty($one_right['external_url'] ))
												{
													printf( '%s', esc_url($one_right['external_url']) );
												}
												
												?>">
												
												<?php 
																
												if( !empty($one_right['text'] ))
												{
													printf( '%s',$one_right['text'] );
												}
												?>
											</a>
										</li>		
									<?php endforeach; ?>
								</ul>												
							</div>
						</div>
						<?php endif;?>
						
					<?php $left_two = $widgets['left_widgets_two']; if ( $left_two ):?>
						<div class="col-sm-6">
							<div class="footer-widget">
								<ul class="footer-widget-menu list-unstyled">
									<?php foreach ( $left_two as $left ): ?>
										<li>											
											<a href="<?php
											
												if( $left['type']  == 'internal' && !empty($left['internal_url'] ))
												{
												printf( '%s', esc_url($left['internal_url']) );
												}
												if( $left['type'] == 'external' && !empty($left['external_url'] ))
												{
													printf( '%s', esc_url($left['external_url']) );
												}
												
												?>">
												
												<?php 
																
												if( !empty($left['text'] ))
												{
													printf( '%s',$left['text'] );
												}
												?>
											</a>
										</li>	
									<?php endforeach; ?>	
								</ul>
							</div>
						</div>
					<?php endif;?>	

					<?php $right_two = $widgets['Right_widgets_two']; if ( $right_two ):?>							
						<div class="col-sm-6">
							<div class="footer-widget">
								<ul class="footer-widget-menu list-unstyled">
									<?php foreach ( $right_two as $right ): ?>
										<li>											
											<a href="<?php
											
												if( $right['type']  == 'internal' && !empty($right['internal_url'] ))
												{
												printf( '%s', esc_url($right['internal_url']) );
												}
												if( $right['type'] == 'external' && !empty($right['external_url'] ))
												{
													printf( '%s', esc_url($right['external_url']) );
												}
												
												?>">
												
												<?php 
																
												if( !empty($right['text'] ))
												{
													printf( '%s',$right['text'] );
												}
												?>
											</a>
										</li>	

									<?php endforeach; ?>
								</ul>
							</div>
						</div>
						<?php endif; ?>
					</div>
					<?php endif;?>				
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