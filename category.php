<?php
    get_header();
    $object = get_queried_object();
	$page_banner = get_field('page_banner','category_'.$object->term_id) ? get_field('page_banner','category_'.$object->term_id): '';	
	$articles = get_field('articles_slider','category_'.$object->term_id) ? get_field('articles_slider','category_'.$object->term_id): '';	
?>

    <?php // get_template_part('inc/page', 'banner'); ?>

    <div class="page_banner">
        <div class="row">
            <div class="large-12 column">
                <div class="inner_banner" style="background-image: url(  <?php echo $page_banner['url']; ?> );">
                    <div class="wrap_h1">
                        <h1 class="head"><?php echo get_cat_name($object->term_id); ?></h1>
                    </div>
                </div>
            </div>
        </div>    
    </div>

    <?php get_template_part('inc/breadcrumbs'); ?>

    <section class="cat_sec">
        <div class="inner_cat">
            <div class="row pad_row">
            	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="large-4 medium-6 small-12 column cat_col">
						<div class="cat_box">
							<div class="title_cat">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<h3><?php the_title(); ?></h3>
								</a>
							</div>
							<div class="row">
								<div class="large-4 column img_col">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</div>
								<div class="large-8 column">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<div class="post_content">
											<p>
												<?php dynamic_excerpt(120, $post); ?>
											</p>
											<div class="addthis_inline_share_toolbox"></div>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; endif; ?>
            </div>            
        </div>
    </section>

	<?php if($articles):?>
	    <section class="articles_slider_sec">
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-12 column">
	    				<div class="article_slider_head">
	    					<h4><?php echo get_field('more_about', 'option'); ?></h4>
	    				</div>
	    				<div class="wrap_articles">
	    					<?php foreach ($articles as $artilce) {
	    						$article_img = wp_get_attachment_url( get_post_thumbnail_id($artilce->ID) );
	    					?>
	    						<div class="inner_article">
	    							<a href="<?php echo get_permalink($artilce->ID); ?>" title="<?php echo get_the_title($artilce->ID); ?>">
	    								<div class="article_slide" style="background-image: url( <?php echo $article_img; ?> );">
		    								<div class="article_label">
		    									<?php echo get_the_title($artilce->ID); ?>
		    								</div>
	    								</div>
	    							</a>
	    						</div>
	    					<?php } ?>
	    				</div>
	                </div>
	            </div>
	        </div>
	    </section>
	<?php endif; ?>

<?php
get_sidebar();
get_footer();
?>


