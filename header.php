<?php
	$logo_img            = get_field('main_logo','option');
	$logo = get_field('main_logo', 'option');
?>
<!doctype html>
<!--[if lt IE 10]><html lang="he" class="lt10"><![endif]-->
<!--[if gt IE 9]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
<title><?php echo the_title(); ?></title>
<!--[if lt IE 10]>
	<script type='text/javascript'>
		$(document).ready(function(){
			$.get('browsers.html' , function(data){
				$('body').html(data);
			});
		});
	</script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<script>
    var domainurl = '<?php echo THEME_DIR; ?>';
</script>
<div class="wrapper">
	<header>
		<div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
			<div class="logo_wrap logo_wrap_mobile mobile_only">
		  		<a class="logo_img" href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo($show = 'name'); ?>">
					<div>
						<img src="<?php echo $logo['url']; ?>" title="<?php echo get_bloginfo($show = 'name'); ?>" alt="<?php echo get_bloginfo('name'); ?>">
					</div>
				</a>
			</div>
			<button class="menu-icon" type="button" data-toggle></button>
			<div class="title-bar-title"></div>
		</div>
		<div class="top-bar menu_div" id="example-menu">
	  		<div class="row">
				<div class="large-8 medium-8 column menu_col">
					<nav>	
			    		<?php
				           	wp_nav_menu( array(
				                  'theme_location'    => 'top_menu',
				                  'menu_class'        => '',
				                  'container'         => '',
				                  'container_class'   => '',
				                  )
				            );
				        ?>
					</nav>
				</div>
				<div class="large-4 medium-4 column logo_col_desk"> 
					<div class="logo_wrap desktop_only">
				  		<a class="logo_img" href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo($show = 'name'); ?>">
							<div>
								<img src="<?php echo $logo['url']; ?>" title="<?php echo get_bloginfo($show = 'name'); ?>" alt="<?php echo get_bloginfo('name'); ?>">
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>	

	</header>
	<div class="inner_wrapper">




