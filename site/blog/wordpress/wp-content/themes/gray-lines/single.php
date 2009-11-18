<?php get_header(); ?>

<div id="container">

	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<div class="postmetadata">
						<?php _e('by'); ?> <?php  the_author(); ?> &#124; <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?><?php the_tags('<br />Tags: ', ', ', ''); ?>
					</div>
					<?php the_content(); ?>
					<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
				</div>
				<div class="comments-template">
					<?php comments_template(); ?>
				</div>
			</div>
		<?php endwhile; ?>
		<div class="navigation">
			<?php previous_post_link('&laquo; %link') ?> <?php next_post_link(' %link &raquo;') ?>
		</div>
	<?php else : ?>
		<div class="post">
			<h2><?php _e('Not Found'); ?></h2>
		</div>
	<?php endif; ?>

</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>
