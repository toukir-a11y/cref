

<?php $call_action = get_field ( "call_action",'options' ); $btn = $call_action['button']; if ( !empty( $call_action ) && array_filter( $call_action) ): ?>

<section class="call-action">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="content" <?php if ( $call_action['background_image'] ) echo 'style="background-image: url('.esc_url( $call_action['background_image'] ).');"'; ?>>
							<?php

	                    		if ( $call_action['sub_tilte'] ) 
	                    		{
	                    			printf( '<span class="sub-title">%s</span>', $call_action['sub_tilte'] );
	                    		}
								
	                    		if ( $call_action['title'] ) 
	                    		{
	                    			printf( '<h3 class="title h1">%s</h3>', $call_action['title'] );
	                    		}

	                    		if ( $call_action['content'] ) 
	                    		{
	                    			printf( '%s', $call_action['content'] );
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
			</div>
		</div>
</section><!-- /call-action -->

<?php endif;?>