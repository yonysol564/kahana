<?php
    get_header();
    $for_more_posts = get_field('for_more_posts','option');
    $read_more = get_field('read_more','option');
?>

<?php while ( have_posts() ) : the_post(); ?>
    <?php 
        $single_banner  = get_field('singel_banner'); 
        $short_desc     = get_field('short_desc');     
    ?>

    <div class="single_banner" style="background-image: url(<?php echo $single_banner['url']; ?>);">
          
    </div>
    <?php 
        $exclude_post   = $post->ID;
        $all_posts = new WP_Query( 
            array( 
                'posts_per_page' => -1, 
                'post_type' => 'post',
                'orderby' => 'date',
                'post__not_in' => array($exclude_post)
            )
        ); 
     ?>
    <section class="page_sec">
        <div class="row">
            <div class="medium-8 column">
                <h1 class="head"><?php the_title(); ?></h1>
                <div class="subtitle_wrap">
                    <?php echo $short_desc; ?>
                </div>
                <div class="socials_author">
                    <div class="row">
                        <div class="medium-8 small-12 column">
                            <div class="wrap_author_date">
                            <?php  $author = get_the_author(); //echo $author; ?>
                                <span class="author_span">מאת: טלי כהנא</span><span class="date_span"><?php echo get_the_date('d.m.Y', $post->ID ); ?></span>
                            </div>
                        </div>
                        <div class="medium-4 small-12 column">
                            <div class="socials_single">
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=http%3A//kahana.devurl.net/?p=<?php echo $post->ID; ?>&title=&summary=&source=">
                                    <img class="normal_state" src="<?php echo THEME_DIR; ?>/images/linkdinimg.jpg" alt="facebook">
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//kahana.devurl.net/?p=<?php echo $post->ID; ?>">
                                    <img class="normal_state" src="<?php echo THEME_DIR; ?>/images/faceimg.jpg" alt="facebook">
                                </a>
                                <div class="clearfix"></div>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="single_content">
                    <?php 
                        $format = get_post_format($post->ID); 
                        if ($format == 'video') { 
                            $blog_video = get_field('blog_video_id');
                        ?>
                            <div class="video_wrap">
                                    <?php if ($blog_video) 
                                    {
                                        $youtube_img = getYoutubeThumbUrl($blog_video);
                                    ?>
                                        <img class="img_youtube" src="<?php echo $youtube_img; ?>" alt="Play Youtube">   
                                    <?php 
                                    } 
                                    ?>
                                <a class="video_open fancybox-media" data-fancybox-type="iframe" href="http://www.youtube.com/embed/<?php echo $blog_video; ?>">
                                    <div class="">
                                        <img src="<?php echo THEME_DIR; ?>/images/playpost.png" title="" alt="play">
                                    </div>
                                </a>
                            </div>
                        <?php }
                    ?>
                    <?php the_content(); ?>

                </div>
            </div>
            <div class="medium-4 column more_posts_col">
                <div class="inner_col">
                    <div class="more_posts_wrap">
                        <h2>
                            <?php echo $for_more_posts; ?>
                        </h2>
                    </div>

                    <div class="single_more_posts">
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
                            }else{
                                $url = '';
                            }
                        ?>
                        <a class="post_link" href="<?php the_permalink(); ?>">
                            <div class="wrap_post_format <?php echo $class; ?>">
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
                                            <span>
                                                <?php echo $read_more; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a> 
                        <?php endwhile; wp_reset_query(); // End of the loop.?>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

<?php endwhile; // End of the loop.?>
<?php
get_sidebar();
get_footer();
?>





