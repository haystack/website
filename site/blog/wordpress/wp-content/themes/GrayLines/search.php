<?php get_header(); ?>

<div id="container">

	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<div class="postmetadata">
						<?php _e('Filed under&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?> <?php _e('on'); ?> <?php the_time('l, j F Y') ?> &#124; <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?><br /><?php the_tags('Tags: ', ', ', ''); ?>
					</div>
					<?php the_excerpt(); ?>					
				</div>
			</div>
		<?php endwhile; ?>
		<div class="navigation">
			<?php posts_nav_link(); ?>
		</div>
	<?php else : ?>
		<div class="post">
			<h2><?php _e('Not Found'); ?></h2>
		</div>
	<?php endif; ?>

</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>