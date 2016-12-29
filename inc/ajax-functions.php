<?php 
add_action( 'wp_enqueue_scripts', 'add_frontend_ajax_javascript_file' );
function add_frontend_ajax_javascript_file() {
    wp_enqueue_script( 'ajax_custom_script', THEME_DIR . '/js/ajax.js', array('jquery') );
    wp_localize_script( 'ajax_custom_script', 'ajaxurl', admin_url( 'admin-ajax.php' ));
}

add_action( 'wp_ajax_load_term_content', 'load_term_content' );
add_action( 'wp_ajax_nopriv_load_term_content', 'load_term_content' );


function load_term_content(){

	$term_id = isset($_POST['term_id']) ? sanitize_text_field( $_POST['term_id']  ) : '';

	if($term_id && $term_id == 'all'){
		$projects_query = array(
			'post_type'			=> 'project',
			'posts_per_page'	=> -1,
		);
	} else {
		$projects_query['tax_query'][] = array(
			'terms'		=> $term_id,
			'field'		=> 'term_id',
			'taxonomy'	=> 'project_cat'
		);
	}

	$response = array();
	$projects = new WP_Query($projects_query);

	if($term_id){
		ob_start();
	    if( $projects->have_posts() ) {
	    	$cnt = $row = 0;
	        while($projects->have_posts()): $projects->the_post();
	            global $post; 
	            $cnt++;
	            $row++;
		    	$float = 'left';
		    	$indx = 'cube_left';
		    	if ($cnt%2 == 0) {
		    		$float = "right";
		    	}
		    	if($row == 1 || $row == 2){
		    		$indx = 'cube_right';
		    	} elseif($row == 4){
		    		$row = 0;
		    	}
		    	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		    	$project_city = get_field('project_city' ,$post->ID);
		    	$project_year = get_field('project_year' ,$post->ID);
	           ?>
		            <div class="cube_element <?php echo $float .' '. $indx; ?>">
		            	<a href="<?php the_permalink(); ?>" title="">	
		            		<div class="inner_bg">
								<span class="project_name"><?php echo get_the_title($post->ID); ?></span>
								<span><?php echo $project_city; ?>&nbsp;&nbsp;<?php echo $project_year; ?></span>
							</div>      
							<div class="project_bg" style="background-image: url( <?php echo $url; ?> );">								
							</div>
		            	</a>
					</div>
				<?php
	            //get_template_part("/inc/ajax","loop");
	        endwhile; wp_reset_query();
	    } else {
	        ?>
	        <div class="ajax_response_message no_projects">
	            <?php _e('There is no Projects','kahana'); ?>
	        </div>
	        <?php
	    }
		$response['html'] = ob_get_clean();
		$response['type'] = 'success';
	}

	echo json_encode($response);
	die();
}

add_action( 'wp_ajax_load_more_posts', 'load_more_posts' );
add_action( 'wp_ajax_nopriv_load_more_posts', 'load_more_posts' );
function load_more_posts(){

	global $class,$journal,$read_more;

	$response 			= array();
	$current 			= isset($_POST['current']) ? sanitize_text_field($_POST['current']) : 1;
	$post_id 			= isset($_POST['post_id']) ? sanitize_text_field($_POST['post_id']) : '';
	$journal_rep 		= get_field('journal_rep',$post_id);
	$read_more 			= get_field('read_more','option');

	// Variables
	$row              = 0;
	$posts_per_page  = 4;
	$total_posts 	= count($journal_rep);
	$pages            = ceil( $total_posts / $posts_per_page );
	$min              = ( ( $current * $posts_per_page ) - $posts_per_page ) + 1;
	$max              = ( $min + $posts_per_page ) - 1;	



	$cnt = 1;
	ob_start();
	foreach ($journal_rep as $journal) {
		global $class,$journal,$read_more;
		$row++;
		if($row < $min) { continue; }    
		if($row > $max) { break; }

		$class = ''; 
		if ($cnt%2 == 0) { $class = "left_col"; } else { $class = "right_col"; }
		get_template_part("inc/ajax/loop");
	$cnt++; } 
	
	$response['html'] = ob_get_clean();
	$response['type'] = 'success';

	echo json_encode($response);

	die();
}