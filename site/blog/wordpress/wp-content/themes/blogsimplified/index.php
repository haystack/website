<?php get_header(); ?>

<div id="mainpage">

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">

<h2 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

<div class="meta"><?php _e("Filed under:"); ?> <?php the_category(',') ?> &#8212; <?php the_tags(__('Tags: '), ', ', ' &#8212; '); ?> <?php the_author() ?> @ <?php the_time() ?> <?php the_date('','<em>','</em>'); ?> <?php edit_post_link(__('Edit This')); ?></div>

<div class="storycontent"><?php the_content(__('(more...)')); ?></div>

<div class="feedback"><?php wp_link_pages(); ?><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?></div>

</div>

<?php comments_template(); ?>

<?php endwhile; else: ?>
<h3><?php _e('Sorry, no posts matched your criteria.'); ?></h3>
<?php endif; ?>

<?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>

</div>

<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
