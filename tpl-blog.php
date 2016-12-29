<?php
    /* Template Name: Blog */
    get_header();
    $blog_banner_img        = get_field('blog_banner_img');
    $blog_banner_title      = get_field('blog_banner_title');
    $blog_banner_content    = get_field('blog_banner_content');
    $blog_banner_link       = get_field('blog_banner_link');
    $blog_banner_link_text  = get_field('blog_banner_link_text');
    $read_more              = get_field('read_more','option');
?>

<?php while ( have_posts() ) : the_post(); ?>
    
<div class="blog_banner" style="background-image: url(<?php echo $blog_banner_img['url']; ?>)">
    <div class="row">
        <div class="large-12 column">
            <h1>
                <?php echo $blog_banner_title; ?>
            </h1>
            <div class="wrap_blog_con desktop_only">
                <?php echo $blog_banner_content; ?>
            </div>
            <div class="wrap_blog_link">
                <?php $link_to_post = get_permalink($blog_banner_link); ?>
                <a href="<?php echo $link_to_post; ?>">
                    <?php echo $blog_banner_link_text; ?>
                </a>
            </div>
        </div>
    </div>
</div>

    <?php 
        $all_posts = new WP_Query( 
            array( 
                'posts_per_page' => -1, 
                'post_type' => 'post',
                'orderby' => 'date'
            )
        ); 
     ?>

<section class="posts_grid">
    <div class="row">
        <div class="large-12 column">
            <ul class="masonry grid effect-3" id="grid">
                <?php while ( $all_posts->have_posts() ) : $all_posts->the_post(); ?>
                <?php 
                    $format = get_post_format($post->ID); 
                    $class = "";
                    switch ($format) {
                        case 'image': $class = 'bg_image_post'; break;
                        case 'video': $class = 'video_post';  break;
                        case '': $class = 'normal_post';  break;
                        //default: $class = 'normal_post'; break;
                    }
                    if (has_post_thumbnail($post->ID) && $format != 'image' && $format != 'video') {
                        $class = 'thumb_post';
                    }
                     if ($format == 'image') {
                        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                     }
                ?>
                <li class="grid-item <?php echo $class; ?>">
                    <a class="post_link" href="<?php the_permalink(); ?>">
                        <div class="wrap_post" <?php if ($url && $format == 'image'){ ?> style="background-image: url(<?php echo $url; ?>);" <?php } ?>> 
                            
                               <?php if ($format != 'image') { ?>
                                    <div class="post_img"> 
                                        <?php the_post_thumbnail(); ?>
                                        <?php if ($format == 'video') { ?>
                                            <div class="play_div">
                                                <img src="<?php echo THEME_DIR; ?>/images/playpost.png" alt="play">
                                            </div>
                                        <?php } ?>
                                    </div>
                               <?php } ?>

                                <div class="wrap_post_info">
                                    <div class="the_post_date">
                                        <span><?php echo get_the_date('d.m.Y', $post->ID ); ?></span>
                                    </div>
                                    <div class="the_post_title">
                                        <h3><?php the_title(); ?></h3>
                                    </div>
                                    <div class="the_post_excerpt">
                                        <p> <?php dynamic_excerpt(70 , $post->ID); ?> </p>
                                    </div>
                                    <div class="readmore_post">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $read_more; ?></a>
                                    </div>
                                </div>
                        </div>
                    </a> 
                </li>
                <?php endwhile; // End of the loop.?>
            </ul>
        </div>
    </div>
</section>


<?php endwhile; // End of the loop.?>
<?php
get_sidebar();
get_footer();
?>
