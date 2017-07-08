<?php get_header(); ?>

	<div class="post">
		<h2>Error 404 - Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<p>Back to <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>, or</p>
		<div class="entry">
			<?php include(TEMPLATEPATH . '/searchform.php'); ?>
		</div>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>