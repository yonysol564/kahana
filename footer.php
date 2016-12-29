<?php 
	$footer_copy 		= get_field('footer_copy', 'option');
	$footer_logo 		= get_field('footer_logo','option');
	$facebook_img 		= get_field('footer_face_img','option');
	$facebook_link 		= get_field('footer_face_url','option');
	$linkdin_img 		= get_field('footer_linkdin_img','option');
	$linkdin_link 		= get_field('footer_linkdin_url','option');
?>
<footer>
	<div class="row">
		<div class="large-8 small-5 column">
			<div class="footer_menu desktop_only">
            	<?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'menu_class' => 'footer_menu' ) ); ?>
			</div>
			<div class="clearfix"></div>
			<div class="socials_footer">
				<a href="<?php echo $linkdin_link; ?>" title="Linkdin" target="_blank">
					<img class="social_img" src="<?php echo $linkdin_img['url']; ?>" alt="facebook">
				</a>
				<a href="<?php echo $facebook_link; ?>" title="facebook" target="_blank">
					<img class="social_img" src="<?php echo $facebook_img['url']; ?>" alt="facebook">
				</a>
				<span class="desktop_only"><?php echo $footer_copy; ?></span>
				<div class="clearfix"></div>
			</div>	
		</div>
		<div class="large-4 small-7 column">
			<div class="footer_logo">
				<a href="<?php echo home_url(); ?>" title="home">
					<img src="<?php echo $footer_logo['url']; ?>" alt="logo">
				</a>
				<span class="mobile_only"><?php echo $footer_copy; ?></span>
			</div>
		</div>
	</div>
</footer>
	</div>
</div> <!-- end wrapper -->
<?php wp_footer(); ?>

<!-- Go to www.addthis.com/dashboard to customize your tools --> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-581596cf85ebe836"></script> 
</body>
</html>
