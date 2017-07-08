<?php get_header(); ?>

	<!--index.php-->

<!--Start Content-->
<div id="container">

<!--Start Maincontent-->
<div id="maincontent">

<!--the loop-->
<?php if (have_posts()) : ?>
<!--the loop-->
<?php while (have_posts()) : the_post(); ?>

<!--Start Posts-->
<div class="postcon">
        
<div class="title">
<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
</div>
            
<h2>WRITTEN ON <?php the_time('F jS, Y') ?> BY <?php the_author() ?> AND STORED IN <?php the_category(', ') ?></h2>
<h2><?php the_tags('Tags: ', ', ', '<br />'); ?></h2>

<?php the_content(); ?>
            
<br />
            
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">CONTINUE READING</a> - <?php comments_popup_link('LEAVE A COMMENT (0)', 'LEAVE A COMMENT (1)', 'LEAVE A COMMENT (%)'); ?></h2>
        
</div>
<!--/End Posts-->
			
	        <!--end of one post-->
		<?php endwhile; ?>

		<!--navigation-->
                <?php next_posts_link('&laquo; Previous Entries') ?>
		<?php previous_posts_link('Next Entries &raquo;') ?>
		
	<!--do not delete-->
	<?php else : ?>

		Not Found
		Sorry, but you are looking for something that isn't here.
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
        <!--do not delete-->
	<?php endif; ?>

	

</div><!--/End Maincontent-->
<!--index.php end-->
<!--include sidebar-->
<?php get_sidebar(); ?>
<!--include footer-->
<?php get_footer(); ?>