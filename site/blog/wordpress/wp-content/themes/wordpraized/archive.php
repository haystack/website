<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle"><?php printf(__('Archive for the &#8216;%s&#8217; Category', 'wordpraized'), single_cat_title('', false)); ?></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle"><?php printf(__('Posts Tagged &#8216;%s&#8217;', 'wordpraized'), single_tag_title('', false) ); ?></h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle"><?php printf(_c('Archive for %s|Daily archive page', 'wordpraized'), get_the_time(__('F jS, Y', 'wordpraized'))); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle"><?php printf(_c('Archive for %s|Monthly archive page', 'wordpraized'), get_the_time(__('F, Y', 'wordpraized'))); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle"><?php printf(_c('Archive for %s|Yearly archive page', 'wordpraized'), get_the_time(__('Y', 'wordpraized'))); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle"><?php _e('Author Archive', 'wordpraized'); ?></h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle"><?php _e('Blog Archives', 'wordpraized'); ?></h2>
 	  <?php } ?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'wordpraized')); ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'wordpraized')); ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'wordpraized'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time(__('l, F jS, Y', 'wordpraized')) ?></small>

				<div class="entry">
					<?php the_content() ?>
				</div>

				<p class="postmetadata"><?php the_tags(__('Tags:', 'wordpraized'), ', ', '<br />'); ?> <?php printf(__('Posted in %s', 'wordpraized'), get_the_category_list(', ')); ?> | <?php edit_post_link(__('Edit', 'wordpraized'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'wordpraized'), __('1 Comment &#187;', 'wordpraized'), __('% Comments &#187;', 'wordpraized'), '', __('Comments Closed', 'wordpraized') ); ?></p>

			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries'), 'wordpraized'); ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'wordpraized')); ?></div>
		</div>

	<?php else : ?>

		<h2 class="center"><?php _e('Not Found', 'wordpraized'); ?></h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
