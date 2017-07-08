<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'wordpraized'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time(__('F jS, Y', 'wordpraized')) ?> <!-- by <?php the_author() ?> --></small>

				<div class="entry">
					<?php the_content(__('Read the rest of this entry &raquo;', 'wordpraized')); ?>
				</div>

				<p class="postmetadata"><?php the_tags(__('Tags:', 'wordpraized') . ' ', ', ', '<br />'); ?> <?php printf(__('Posted in %s', 'wordpraized'), get_the_category_list(', ')); ?> | <?php edit_post_link(__('Edit', 'wordpraized'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'wordpraized'), __('1 Comment &#187;', 'wordpraized'), __('% Comments &#187;', 'wordpraized'), '', __('Comments Closed', 'wordpraized') ); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'wordpraized')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'wordpraized')) ?></div>
		</div>

	<?php else : ?>

		<h2 class="center"><?php _e('Not Found', 'wordpraized'); ?></h2>
		<p class="center"><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'wordpraized'); ?></p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>


