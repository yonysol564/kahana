<?php
    /* Template Name: About */
    get_header();
    $about_banner_img        = get_field('about_banner_img');
    $about_banner_title      = get_field('about_banner_title');
    $about_banner_subtitle   = get_field('about_banner_subtitle');
    $about_banner_content    = get_field('about_banner_content');
?>

<?php while ( have_posts() ) : the_post(); ?>
    <div class="about_banner" style="background-image: url(<?php echo $about_banner_img['url']; ?>)">
        <div class="row">
            <div class="large-12 column">
                <h1>
                    <?php echo $about_banner_title; ?>
                </h1>

                <div class="wrap_subtitle desktop_only">
                    <?php echo $about_banner_subtitle; ?>
                </div>
                <div class="wrap_about_con desktop_only">
                    <?php echo $about_banner_content; ?>
                </div>
            </div>
        </div>
    </div>

    <section class="mobile_only about_mobile_con">
        <div class="row">
            <div class="large-12 column">
                <div class="wrap_subtitle">
                    <?php echo $about_banner_subtitle; ?>
                </div>
                <div class="wrap_about_con">
                    <?php echo $about_banner_content; ?>
                </div>
            </div>
        </div>
    </section>

    <?php 
        $women_power_title    = get_field('women_power_title');
        $women_power_subtitle   = get_field('women_power_subtitle');
        $women_power_content    = get_field('women_power_content');
        $art_women_rep    = get_field('art_women_rep');
    ?>

    <section class="women_power">
        <div class="row">   
            <div class="large-12 column">
                <h2>
                    <span><?php echo $women_power_title; ?></span>
                    <span class="upper"><?php echo $women_power_subtitle; ?></span>
                </h2>
                <div class="content">
                    <?php echo $women_power_content; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $cnt = 1; $class = ''; ?>
            <?php foreach ($art_women_rep as $val) { ?>
            <?php 
                if ($cnt%2 == 0) { $class = 'mobile_col_women_right';}   
                else { $class = 'mobile_col_women_left'; } 
            ?>
                <div class="large-4 medium-6 small-6 column col_women <?php echo $class; ?>">
                    <div class="wrap_img" data-mh="image">
                        <img class="img_normal" src="<?php echo $val['art_women_rep_img']['url']; ?>" alt="woman image">
                        <img class="img_hover" src="<?php echo $val['art_women_rep_hoverimg']['url']; ?>" alt="woman image">
                    </div>
                    <div class="wrap_name">
                        <div class="inner_div">
                            <span class="span_name"><?php echo $val['art_women_rep_name']; ?></span>
                            <span><?php echo $val['art_women_rep_role']; ?></span>
                        </div>
                    </div>
                </div>
            <?php $cnt++; } ?>
        </div>
    </section>

    <?php 
        $about_con    = get_field('about_con');
        $about_con_img   = get_field('about_con_img');
    ?>

    <section class="about_con_sec">
        <div class="row about_row" data-mh="col">
            <div class="large-6 medium-6 column">
                <div class="wrap_con">
                    <?php echo $about_con; ?>
                </div>
            </div>
            <div class="large-6 medium-6 column col_img"  style="background-image: url(<?php echo $about_con_img['url']; ?>)">
                
            </div>
        </div>
    </section>
<?php endwhile; // End of the loop.?>
<?php
get_sidebar();
get_footer();
?>
