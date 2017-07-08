<?php get_header(); ?>

	<div id="content">
				
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <!--- pre & next --->

<div align="center">
	<div class="floatleft"><?php previous_post_link('&laquo; %link') ?></div>
	<div class="floatright"><?php next_post_link('%link &raquo;') ?></div>	<br /><br />
</div>

<!--- pre & next End --->
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>

			<p class="info"><?php the_time('F jS Y') ?> - <?php if(function_exists('the_views')) { the_views(); } ?> <?php edit_post_link('edit','',''); ?></p> 
					

				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
	
			
	<?php comments_template(); ?></div>
	
	
	<?php endwhile; else: ?>
	
		<p>Sorry, no posts matched your criteria.</p>
	
<?php endif; ?>
	
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
