<?php get_header(); ?>
<!--single.php-->

<div id="container">

<div id="maincontent">

<!--loop-->			
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
<div class="postcon">

<div class="title">
<h1><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>
</div>

<h2>WRITTEN ON <?php the_time('F jS, Y') ?> BY <?php the_author() ?> AND STORED IN <?php the_category(', ') ?></h2>
<h2><?php the_tags('Tags: ', ', ', '<br />'); ?></h2>

<?php the_content(); ?>

</div>	

												
					
				</p><!--all options over and out-->
			<!--you need trackback rdf for pings from non wp blogs do not delete the html comments they are necessary-->
		 <!--<?php trackback_rdf(); ?>-->
		
	<!--include comments template-->
	<?php comments_template(); ?>
	
        <!--do not delete-->
	<?php endwhile; else: ?>
	
	Sorry, no posts matched your criteria.

<!--do not delete-->
<?php endif; ?>
	
</div>	
<!--single.php end-->
<!--include sidebar-->
<?php get_sidebar(); ?>
<!--include footer-->
<?php get_footer(); ?>