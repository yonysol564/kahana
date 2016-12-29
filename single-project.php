<?php
    get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>
    <?php $address = get_field('project_address');  ?>
    <?php $project_gallery = get_field('project_gallery'); ?>
        <div class="project_slider">            
            <?php foreach ($project_gallery as $gallery) {  ?>
                <div class="inner_slider"><img src="<?php echo $gallery['project_gallery_img']['url']; ?>" alt="slider image"></div>
            <?php } ?>
        </div>

        <section class="project_main">
            <div class="row">
                <div class="medium-4 column">
                    <div class="project_title">
                        <h1><?php echo $address;?></h1>
                    </div>
                    <div class="project_desc">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
                 <div class="medium-8 column">
                    <div class="project_content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="more_projects">
            <div class="row">
                <div class="medium-12 column">
                    <?php $more_projects_text = get_field('more_projects_text' ,'option'); ?>
                    <h2><?php echo $more_projects_text; ?></h2>  
                </div>
            </div>

            <?php 
                $exclude_post   = $post->ID;
                $projects = new WP_Query( 
                    array( 
                        'posts_per_page' => 3, 
                        'post_type' => 'project',
                        'orderby' => 'rand', 
                        'post__not_in' => array($exclude_post)
                    )
                ); 
             ?>
            <div class="row">
            <?php while ( $projects->have_posts() ) : $projects->the_post(); 
                $term_name = wp_get_post_terms( $post->ID, 'project_cat' ); 
            ?>
                <div class="medium-4 column project_col">
                    <a class="more_project_link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <div class="more_projects_img">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="wrap_projects_info">
                            <div class="more_projects_title">
                                <h3>
                                    <?php the_title(); ?>
                                </h3>
                            </div>
                            <div class="more_projects_cat">
                                <?php echo $term_name[0]->name; ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile; // End of the loop.?>
            </div>
        </section>

<?php endwhile; // End of the loop.?>
<?php
get_sidebar();
get_footer();
?>





