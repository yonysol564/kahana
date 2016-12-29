<?php
/* Template Name: Awards */
	get_header();
?>
<?php 
	$awards_banner	 = get_field('awards_banner');
	$banner_title	 = get_field('awards_banner_title');
	$awards_rep	 = get_field('awards_rep');
	$awards_rep_count = count($awards_rep);
?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="awards_banner" style="background-image: url(<?php echo $awards_banner['url']; ?>)">
			<div class="main_title">
				<h1><?php echo $banner_title; ?></h1>
			</div>
			<div class="wrap_awards">
				<div class="row awards_row">
					<?php if ($awards_rep_count == 5) {
						$cnt = 1;
					} ?>
					<?php foreach ($awards_rep as $award) { ?>
						<?php if ($cnt <= 3) { ?>
							<div class="large-4 column award_col end">
								<div class="img_wrap">
									<img src="<?php echo $award['awards_rep_img']['url']; ?>" alt="award">
								</div>
								<div class="year_div">
									<?php echo $award['awards_rep_year']; ?>
								</div>
								<div class="title_div">
									<?php echo $award['awards_rep_title']; ?>
								</div>
								<div class="desc_div">
									<?php echo $award['awards_rep_desc']; ?>
								</div>
							</div>
						<?php } else { if ($cnt == 4) {$class = 'right_pad'; } if ($cnt == 5) {$class = 'left_pad'; } ?>
							<div class="large-6 column award_col award_col_6 end">
								<div class="inner_wrap <?php echo $class; ?>">
									<div class="img_wrap">	
										<img src="<?php echo $award['awards_rep_img']['url']; ?>" alt="award">
									</div>
									<div class="year_div">
										<?php echo $award['awards_rep_year']; ?>
									</div>
									<div class="title_div">
										<?php echo $award['awards_rep_title']; ?>
									</div>
									<div class="desc_div">
										<?php echo $award['awards_rep_desc']; ?>
									</div>
								</div>
							</div>
						<?php }	?>
					<?php if ($awards_rep_count == 5) { $cnt++; }  } ?>
				</div>
			</div>
		</div>
		
		<?php 
			$journal_main_title = get_field('journal_main_title'); 
			$journal_rep 		= get_field('journal_rep'); 
		 	$read_more = get_field('read_more','option');
		 	$show_more = get_field('show_more','option');		 
		?>
		<section class="journal_sec" data-pid="<?php echo $post->ID; ?>" >
			<div class="row">
				<div class="large-12 column">
					<h2><?php echo $journal_main_title; ?></h2>
				</div>
			</div>
			<div class="row ajax_response_row"></div>
			<div class="row">
				<div class="large-12 column">
					<div class="wrap_load_more">
						<a href="#" data-current="1" data-post_id="<?php echo $post->ID; ?>"><?php echo $show_more; ?></a>
					</div>
				</div>
			</div>
		</section>
	
	<?php endwhile; // End of the loop.?>

<?php
get_sidebar();
get_footer();
?>
