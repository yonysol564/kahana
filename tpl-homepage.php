<?php
/* Template Name: Home */
	get_header();
		$banner_img		 = get_field('banner_img');
		$banner_title	 = get_field('banner_title');
		$banner_desc	 = get_field('banner_desc');
		$banner_con_text = get_field('banner_contact_text');
		$banner_con_url	 = get_field('banner_contact_url');
		$read_more       = get_field('read_more','option');
	?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="home_banner">
			<div class="inner_home_banner" style="background-image: url( <?php echo $banner_img['url']; ?> )">
				<div class="wrap_con_banner">
					<div class="home_banner_title">
						<?php echo $banner_title; ?>
					</div>
					<div class="home_banner_desc">
						<?php echo $banner_desc; ?>
					</div>
					<div class="home_banner_link">
						<a href="<?php echo $banner_con_url; ?>"><?php echo $banner_con_text; ?></a>
					</div>
				</div>
			</div>
		</div>

	<?php 
		$create_title = get_field('create_title');
		$create_con = get_field('create_con');
	?>

	<section class="home_create">
			<div class="row">
				<div class="large-12 column">
					<div class="inner_div">
						<h2><?php echo $create_title; ?></h2>
						<div class="con_create">
							<?php echo $create_con; ?>
						</div>
					</div>
				</div>
			</div>
	</section>

	<?php 
		$boxes_rep = get_field('boxes_strip'); 
		$blank1 = ''; $blank2 = ''; $blank3 = ''; $blank4 = ''; $blank5 = ''; $blank6 = '';
		if ($boxes_rep[0]['box_new_window'] ) { $blank1 = 'target="_blank"'; } 
		if ($boxes_rep[1]['box_new_window'] ) { $blank2 = 'target="_blank"'; } 
		if ($boxes_rep[2]['box_new_window'] ) { $blank3 = 'target="_blank"'; } 
		if ($boxes_rep[3]['box_new_window'] ) { $blank4 = 'target="_blank"'; } 
		if ($boxes_rep[4]['box_new_window'] ) { $blank5 = 'target="_blank"'; } 
		if ($boxes_rep[5]['box_new_window'] ) { $blank6 = 'target="_blank"'; } 
	?>
	<section class="home_boxes">
			<div class="row boxes_row">
				<div class="large-3 medium-3 column">
					<a href="<?php echo $boxes_rep[0]['boxes_strip_link']; ?>" <?php echo $blank1; ?>>
						<div class="small_box" style="background-image: url( <?php echo $boxes_rep[0]['boxes_strip_img']['url']; ?>);">
							<div class="wrap_title">
								<h4><?php echo $boxes_rep[0]['boxes_strip_title']; ?></h4>
								<span><?php echo $boxes_rep[0]['boxes_strip_subtitle']; ?></span>
							</div>
						</div>
					</a>
					<a href="<?php echo $boxes_rep[1]['boxes_strip_link']; ?>" <?php echo $blank2; ?>>
						<div class="small_box" style="background-image: url( <?php echo $boxes_rep[1]['boxes_strip_img']['url']; ?>);">
							<div class="wrap_title">
								<h4><?php echo $boxes_rep[1]['boxes_strip_title']; ?></h4>
								<span><?php echo $boxes_rep[1]['boxes_strip_subtitle']; ?></span>
							</div>
						</div>
					</a>
				</div>

				<div class="large-3 medium-3 column box_col">
					<a href="<?php echo $boxes_rep[2]['boxes_strip_link']; ?>" <?php echo $blank3; ?>>
						<div class="large_box" style="background-image: url( <?php echo $boxes_rep[2]['boxes_strip_img']['url']; ?>);">
							<div class="wrap_title">
								<h4><?php echo $boxes_rep[2]['boxes_strip_title']; ?></h4>
								<span><?php echo $boxes_rep[2]['boxes_strip_subtitle']; ?></span>
							</div>
						</div>
					</a>
				</div>

				<div class="large-3 medium-3 column">
					<a href="<?php echo $boxes_rep[3]['boxes_strip_link']; ?>" <?php echo $blank3; ?>>
						<div class="small_box" style="background-image: url( <?php echo $boxes_rep[3]['boxes_strip_img']['url']; ?>);">
							<div class="wrap_title">
								<h4><?php echo $boxes_rep[3]['boxes_strip_title']; ?></h4>
								<span><?php echo $boxes_rep[3]['boxes_strip_subtitle']; ?></span>
							</div>
						</div>
					</a>
					<a href="<?php echo $boxes_rep[4]['boxes_strip_link']; ?>" <?php echo $blank4; ?>>
						<div class="small_box" style="background-image: url( <?php echo $boxes_rep[4]['boxes_strip_img']['url']; ?>);">
							<div class="wrap_title">
								<h4><?php echo $boxes_rep[4]['boxes_strip_title']; ?></h4>
								<span><?php echo $boxes_rep[4]['boxes_strip_subtitle']; ?></span>
							</div>
						</div>
					</a>
				</div>
				<div class="large-3 medium-3 column box_col">
					<a href="<?php echo $boxes_rep[5]['boxes_strip_link']; ?>" <?php echo $blank5; ?>>
						<div class="large_box" style="background-image: url( <?php echo $boxes_rep[5]['boxes_strip_img']['url']; ?>);">
							<div class="wrap_title">
								<h4><?php echo $boxes_rep[5]['boxes_strip_title']; ?></h4>
								<span><?php echo $boxes_rep[5]['boxes_strip_subtitle']; ?></span>
							</div>
						</div>
					</a>
				</div>
			</div>
	</section>

	<?php 
		$home_about_img	 = get_field('home_about_img');
		$home_about_title = get_field('home_about_title');
		$home_about_content	 = get_field('home_about_content');
		$home_about_link	 = get_field('home_about_link');
	?>

	<section class="home_about" style="background-image: url( <?php echo $home_about_img['url']; ?> );">
		<div class="row">
			<div class="large-12 column">
				<div class="inner_div">
					<h2><?php echo $home_about_title; ?></h2>
					<div class="con_create">
						<?php echo $home_about_content; ?>
					</div>
					<div class="wrap_link_about">
						<a href="<?php echo $home_about_link; ?>"><?php echo $read_more; ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php 
		$home_video_img	   = get_field('home_video_img');
		$home_video_title  = get_field('home_video_title');
		$youtube_id  	  = get_field('youtube_id');
	?>

	<section class="home_video" style="background-image: url( <?php echo $home_video_img['url']; ?> );">
		<div class="row">
			<div class="large-12 column">
				<div class="inner_div">
					<a class="video_open fancybox-media fancybox" data-fancybox-type="iframe" href="http://www.youtube.com/embed/<?php echo $youtube_id; ?>" target="_self">
						<div class="">
							<img src="<?php echo THEME_DIR; ?>/images/play.png" title="" alt="play">
						</div>
						<div>
							<?php echo $home_video_title; ?>	
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	
	<?php endwhile; // End of the loop.?>

<?php
get_sidebar();
get_footer();
?>
