<?php $suite = get_field( 'cref_suite' );  if( !empty($suite) ): $btn = $suite['button']; ?> 
    <div class="icref-suite">
        <div class="row align-items-center">
            <div class="col-sm-6">
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

                        ?>" class="btn primary text-uppercase">
                        <?php 
                                            
                        if( !empty($btn['text'] ))
                        {
                            printf( '%s',$btn['text'] );
                        }
                        ?>
                    </a>
                </div>
            </div>
                <?php							
                        if( !empty($suite['image']) )
                        {
                            printf( '<div class="col-sm-6"><div class="media"><img src="%s" class="img-fluid" alt="%s"></div>'
                            , esc_url($suite['image']['url']), 'alt' );
                        }
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>	