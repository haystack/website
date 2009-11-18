<?php get_header(); ?>

	<!--the loop-->

<!--Start Content-->
<div id="container">

<!--Start Maincontent-->
<div id="maincontent">

		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>				
		<?php echo single_cat_title(); ?>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		Archive for <?php the_time('F jS, Y'); ?>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		Archive for <?php the_time('F, Y'); ?>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		Archive for <?php the_time('Y'); ?>
		
	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		Search Results
		
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		Author Archive

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		Blog Archives

               <!--do not delete-->
		<?php } ?>


		<!-- navigation-->
               <?php next_posts_link('&laquo; Previous Entries') ?>
		<?php previous_posts_link('Next Entries &raquo;') ?>
		
                <!--loop article begin-->
		<?php while (have_posts()) : the_post(); ?>
<!--post title as a link-->

<div class="postcon">
<div class="title">
<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
</div>

<h2>WRITTEN ON <?php the_time('l, F jS, Y') ?> BY <?php the_author() ?> AND STORED IN <?php the_category(', ') ?></h2>

<p><?php the_excerpt(); ?></p>

<br />
            
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">CONTINUE READING</a> - <?php comments_popup_link('LEAVE A COMMENT (0)', 'LEAVE A COMMENT (1)', 'LEAVE A COMMENT (%)'); ?></a></h2>

</div>
<!--/End Posts--> 

			
	       <!--one post end-->
		<?php endwhile; ?>
                
               <!-- navigation-->
               <?php next_posts_link('&laquo; Previous Entries') ?>
		<?php previous_posts_link('Next Entries &raquo;') ?>
	<!-- do not delete-->
	<?php else : ?>

		Not Found
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

         <!--do not delete-->
	<?php endif; ?>
		

</div><!--/End Maincontent-->
<!--archive.php end-->

<!--include sidebar-->
<?php get_sidebar(); ?>
<!--include footer-->
<?php get_footer(); ?>