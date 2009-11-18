<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>
		
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="archive" id="post-<?php the_ID(); ?>">
				<?php the_time('F jS Y') ?> &#183; <a href="<?php the_permalink() ?>"><?php the_title(); ?></a><?php comments_popup_link('(0)', '(1)', '(%)'); ?>
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; ') ?></div>
			<div class="alignright"><?php previous_posts_link(' &raquo;') ?></div>
		</div>
	
	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>