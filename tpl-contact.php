<?php
    /* Template Name: Contact */
    get_header();
    $contact_form  = get_field('page_contactform');
    $contact_address  = get_field('contact_address');
    $contact_phone  = get_field('contact_phone');
    $page_contactform_title  = get_field('page_contactform_title');
    $locations      = get_field('contact_map'); 
?>

<?php while ( have_posts() ) : the_post(); ?>
    <div class="map_sec">


        <?php if($locations): ?>
            <script>
                var locations = [ "<?php echo $locations['address']; ?>", <?php echo $locations['lat']; ?> , <?php echo $locations['lng']; ?> ];
            </script>
            <div class="map_div" id="contact_map" data-phone="<?php echo $contact_phone; ?>" data-address="<?php echo $contact_address; ?>">
                
            </div>
        <?php endif; ?>
            <div class="wrap_form">
                <div class="row">   
                    <div class="large-12 column">    
                        <div class="inner_div">
                            <h1>
                               <?php echo $page_contactform_title; ?>  
                            </h1>
                            <?php echo do_shortcode($contact_form); ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php endwhile; // End of the loop.?>
<?php
get_sidebar();
get_footer();
?>
