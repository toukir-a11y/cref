<?php get_header();

$content = get_field( 'content', 173 );
?>

	<div id="primary" class="content-area">

		<?php
			if( !empty($content['image']) )
			{
				printf( '<div class="page-header blog"><img src="%s" class="img-fluid" alt="%s"></div>', $content['image']['url'], 'alt' );
			}
			else
			{
				printf( '<div class="page-header blog"><img src="%s" class="img-fluid" alt="%s"></div>', esc_url( get_theme_file_uri( '/images/page-header-blog.jpg' ) ),'alt' );
			}
		?>	

		<section class="breadcrumb-wrapper">
		    <div class="container">
		        <div class="row">
		            <div class="col-12">
		                <nav class="breadcrumb">
		                    <a href="index.html">Home</a>
		                    <span class="angle-right">/</span>
		                    <a class="current-page">News & Insights</a>
		                </nav>
		            </div>
		        </div>
		    </div>
		</section><!-- /breadcrumb -->

		<section class="featured-posts">
			<div class="container">
				<div class="row lr-10 minus">
					<?php
					
						$counter = 1;

						$args = array(
							'post_type'         => 'post',                       
							'posts_per_page'    =>  4,
							'meta_key'          => '_is_ns_featured_post',
							'meta_value' => 'yes'
						);
							
						$the_query = new WP_Query($args); 

						if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); 
											
						$class = $counter == 1 ? 'featured-post big' : 'featured-post';
						$column = $counter == 1 ? 'col-12' : 'col-lg-4 col-sm-6';
					?> 
					<div class="<?php echo $column; ?>">
						<article class="<?php echo $class; ?>">
							<div class="media">
								<a href="<?php echo esc_url( the_permalink() );?>">
									<?php
										if( has_post_thumbnail() )
										{
											if( $counter == 1 )

											{
												the_post_thumbnail('post_featured_big', array('class'=>'img-fluid') );
											}
											else 
											{
												the_post_thumbnail('post_featured', array('class'=>'img-fluid') );
											}
										}
										else
										{
											if ( $counter == 1 ) 
											{
												printf( '<img src="%s" class="img-fluid" alt="%s">', get_theme_file_uri( 'images/placeholder-featured-thumb-big.jpg' ), get_the_title() );
											}
											else
											{
												printf( '<img src="%s" class="img-fluid" alt="%s">', get_theme_file_uri( 'images/placeholder-featured-thumb.jpg' ), get_the_title() );
											}
										}
									?> 
								</a>
							</div>
							<div class="text">
								<?php
									$categories = get_the_category();

									if( $categories	)
									{
										echo '<ul class="categories list-inline">';

											foreach( $categories as $cat )
											{
												printf( '<li><a href="%s">%s</a></li>', esc_url( get_category_link( $cat ) ), $cat->name );

												break;
											}
									}
									    echo '</ul>';
								?>								
								<a href="<?php echo the_permalink();?>">
									<?php
										if( $counter == 1 )
										{
											printf( '<h3 class="title">%s</h3>', the_title() );
										}
										else 
										{
											printf( '<h5 class="title">%s</h5>', the_title() );
										}									
									?>
								</a>								
								<?php 
									if( has_excerpt() )
									{
										printf( '<div class="excerpt">%s</div>', the_excerpt() );
									}
							
									if( $counter == 1 )
									{
										printf( '<a href="%s" class="btn primary text-uppercase">%s</a>',  get_the_permalink(get_the_ID()), 'READ THE REPORT' );
									}							
								?>								
							</div>
						</article>
						<?php echo $counter == 1 ? '<hr class="two">' : '';?>
					</div>
						<?php
									$counter++;
								endwhile;
							endif;
						wp_reset_query();
						?>
				</div>
			</div>
		</section><!-- /featured-posts -->

		<section class="popularposts pt-0">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="entry-title">
							<h5 class="title">Popular</h5>
						</div>
					</div>
				</div>

				<div class="popularSlider">
					<div class="col-lg-4 col-sm-6">
						<article class="popularpost d-flex align-items-end">
							<a href="blog-details.html" class="link"></a>
							<div class="media">
								<a href="blog-details.html">
									<img src="<?php echo get_theme_file_uri();?>/images/popular-post-1.jpg" class="img-fluid" alt="">
								</a>
							</div>

							<div class="text">
								<ul class="categories list-inline">
									<li><a href="#">Category Title</a></li>
								</ul>

								<a href="blog-details.html">
									<h5 class="title">CFO Signals: 2Q 2021</h5>
								</a>

								<div class="excerpt">
									<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr, sed diam.</p>
								</div>
							</div>
						</article>
					</div>

					<div class="col-lg-4 col-sm-6">
						<article class="popularpost d-flex align-items-end">
							<a href="blog-details.html" class="link"></a>
							<div class="media">
								<a href="blog-details.html">
									<img src="<?php echo get_theme_file_uri();?>/images/popular-post-2.jpg" class="img-fluid" alt="">
								</a>
							</div>

							<div class="text">
								<ul class="categories list-inline">
									<li><a href="#">Category Title</a></li>
								</ul>

								<a href="blog-details.html">
									<h5 class="title">CFO Signals: 2Q 2021</h5>
								</a>

								<div class="excerpt">
									<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr, sed diam.</p>
								</div>
							</div>
						</article>
					</div>

					<div class="col-lg-4 col-sm-6">
						<article class="popularpost d-flex align-items-end">
							<a href="blog-details.html" class="link"></a>
							<div class="media">
								<a href="blog-details.html">
									<img src="<?php echo get_theme_file_uri();?>/images/popular-post-3.jpg" class="img-fluid" alt="">
								</a>
							</div>

							<div class="text">
								<ul class="categories list-inline">
									<li><a href="#">Category Title</a></li>
								</ul>

								<a href="blog-details.html">
									<h5 class="title">CFO Signals: 2Q 2021</h5>
								</a>

								<div class="excerpt">
									<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr, sed diam.</p>
								</div>
							</div>
						</article>
					</div>

					<div class="col-lg-4 col-sm-6">
						<article class="popularpost d-flex align-items-end">
							<a href="blog-details.html" class="link"></a>
							<div class="media">
								<a href="blog-details.html">
									<img src="<?php echo get_theme_file_uri();?>/images/popular-post-4.jpg" class="img-fluid" alt="">
								</a>
							</div>

							<div class="text">
								<ul class="categories list-inline">
									<li><a href="#">Category Title</a></li>
								</ul>

								<a href="blog-details.html">
									<h5 class="title">CFO Signals: 2Q 2021</h5>
								</a>

								<div class="excerpt">
									<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr, sed diam.</p>
								</div>
							</div>
						</article>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<div class="popular-progress slider-progress">
							<div class="progress"></div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /popular-posts -->

		<section class="blog-page pt-0">
			<div class="container">
				<div class="row lr-10" data-sticky_parent>
					<div class="col-lg-8" data-sticky_column>
						<main class="main-content">
							<h5 class="entry-title">All News & Insights</h5>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-1.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr nonumy.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-2.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-1.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr nonumy.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-2.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-1.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr nonumy.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-2.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-1.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr nonumy.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-2.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-1.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr nonumy.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-2.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-1.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr nonumy.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-2.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-1.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr nonumy.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-2.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-1.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr nonumy.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-2.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-1.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr nonumy.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-2.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-1.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr nonumy.</p>
									</div>
								</div>
							</article>

							<article class="blog-post d-flex align-items-center">
								<div class="media float-left">
									<a href="blog-details.html">
										<img src="<?php echo get_theme_file_uri();?>/images/blog-post-2.jpg" class="img-fluid" alt="">
									</a>
								</div>

								<div class="text">
									<ul class="categories list-inline">
										<li><a href="#">Category Title</a></li>
									</ul>

									<a href="blog-details.html">
										<h5 class="title">A new playbook for talent</h5>
									</a>

									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</article>

							<div class="entry-footer d-flex flex-wrap align-items-center justify-content-between">
								<div class="nav-links">
									<a class="page-numbers" href="#">1</a>
									<span class="page-numbers current">2</span>
									<a class="page-numbers" href="#">3</a>
									<a class="page-numbers" href="#">4</a>
									<a class="page-numbers" href="#">5</a>
								</div>

								<div class="pagination">
								    <div class="float-left">
								        <a href="#"><i class="icon-arrow-left"></i></a>
								    </div>

								    <div class="float-right">
								        <a href="#"><i class="icon-arrow-right"></i></a>
								    </div>
								</div>
							</div>
						</main>
					</div>

					<div class="col-lg-4">
						<aside class="sidebar" data-sticky_column>
							<div class="widget">
								<h5 class="widget-title">Search News & Insights</h5>

								<form action="" class="search-form">
									<label for="searchBar">Search</label>
									<div class="form-group">
										<input type="search" name="s" placeholder="|" id="searchBar">
									</div>
								</form>
							</div>

							<div class="widget widget-categories">
								<h5 class="widget-title">Categories</h5>

								<ul class="categories list-unstyled">
									<li><a href="#">Category Title</a></li>
									<li><a href="#">Category Title</a></li>
									<li><a href="#">Category Title</a></li>
									<li><a href="#">Category Title</a></li>
									<li><a href="#">Category Title</a></li>
								</ul>
							</div>

							<div class="widget">
								<h5 class="widget-title">Popular</h5>

								<div class="popular-posts">
									<article class="popular-post">
										<div class="media float-left">
											<a href="blog-details.html">
												<img src="<?php echo get_theme_file_uri();?>/images/popular-post.jpg" class="img-fluid" alt="">
											</a>
										</div>

										<div class="text">
											<ul class="categories list-inline">
												<li><a href="#">Category Title</a></li>
											</ul>

											<h5 class="title">The title of the popular post goes here</h5>

											<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr, sed diam nonumy.</p>
										</div>
									</article>

									<article class="popular-post">
										<div class="media float-left">
											<a href="blog-details.html">
												<img src="<?php echo get_theme_file_uri();?>/images/popular-post.jpg" class="img-fluid" alt="">
											</a>
										</div>

										<div class="text">
											<ul class="categories list-inline">
												<li><a href="#">Category Title</a></li>
											</ul>

											<h5 class="title">The title of the popular post goes here</h5>

											<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr, sed diam nonumy.</p>
										</div>
									</article>

									<article class="popular-post">
										<div class="media float-left">
											<a href="blog-details.html">
												<img src="<?php echo get_theme_file_uri();?>/images/popular-post.jpg" class="img-fluid" alt="">
											</a>
										</div>

										<div class="text">
											<ul class="categories list-inline">
												<li><a href="#">Category Title</a></li>
											</ul>

											<h5 class="title">The title of the popular post goes here</h5>

											<p>Lorem ipsum dolor sit amet, consetetur elit sadipscing elitr, sed diam nonumy.</p>
										</div>
									</article>
								</div>
							</div>

							<div class="widget">
								<h5 class="widget-title">Helpful Links</h5>

								<div class="helpful-links">
									<div class="row lr-10 minus">
										<div class="col-lg-12 col-sm-6">
											<a href="#" class="helpful-link d-flex align-items-end" style="background-image: url(<?php echo get_theme_file_uri();?>/images/helpful-link-1.jpg)">
								 				<div class="text">
													<span class="sub-title">Contact Us</span>
													<h5 class="title">Start the Conversation</h5>
													<span class="icon-arrow-right"></span>
												</div>
											</a>
										</div>

										<div class="col-lg-12 col-sm-6">
											<a href="#" class="helpful-link d-flex align-items-end" style="background-image: url(<?php echo get_theme_file_uri();?>/images/helpful-link-2.jpg)">
												<div class="text">
													<span class="sub-title">Integrated Services</span>
													<h5 class="title">CREF Solutions</h5>
													<span class="icon-arrow-right"></span>
												</div>
											</a>
										</div>

										<div class="col-lg-12 col-sm-6">
											<a href="#" class="helpful-link d-flex align-items-end" style="background-image: url(<?php echo get_theme_file_uri();?>/images/helpful-link-3.jpg)">
												<div class="text">	
													<span class="sub-title">The Undisputed Leader</span>
													<h5 class="title">About CREF</h5>
													<span class="icon-arrow-right"></span>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</aside>
					</div>
				</div>
			</div>
		</section><!-- /contact-page -->


<?php 

get_template_part('template_parts/call_action');
get_footer(); 

?>