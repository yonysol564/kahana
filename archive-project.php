<?php 
	get_header();
	$object = get_queried_object();
	$projects_main_title = get_field('projects_main_title', 'option'); 
	$projects_main_desc = get_field('projects_main_desc', 'option');	
	$projects = get_terms('project_cat', array('hide_empty'=>false));
?>

	<div class="projects_top">
		<div class="row">
			<div class="medium-12 column">
				<div class="wrap_h1">
					<?php if($projects_main_title): ?>
						<h1><?php echo $projects_main_title; ?></h1>
					<?php endif; ?>	
				</div>
				<div class="wrap_desc">
					<?php if($projects_main_desc): ?>
						<?php echo $projects_main_desc; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="projects_cat_nav desktop_only">
		<div class="row">
			<?php if($projects): ?>
				<ul class="menu">
					<?php foreach($projects as $term) : ?>
						<li>							
							<a href="<?php echo $term->term_id; ?>" aria-label="<?php echo $term->name; ?>">
								<?php echo $term->name; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>

	<div class="choose_cat mobile_only">
	  <span class="outer_span">
	  	<span class="inner_span">
	  		<?php echo get_field('all_projects' , 'option') ?>
	  	</span>
	  </span>
	</div>
	<div id="projects_nav_mobile" class="mobile_only">
		<?php if($projects): ?>
			<ul>
				<?php foreach($projects as $term) : ?>
					<li>							
						<a href="<?php echo $term->term_id; ?>" aria-label="<?php echo $term->name; ?>">
							<?php echo $term->name; ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>

	<section class="projects_main">
		<!-- <div class="loader_div">
			<img src="<?php //echo THEME_DIR; ?>/images/ajax-loader.gif" alt="loader">
		</div> -->
		<div class="loader_div spinner"></div>
		<div class="ajax_res">
			<div class="row">
				<div class="large-12 column ajax_holder"></div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>