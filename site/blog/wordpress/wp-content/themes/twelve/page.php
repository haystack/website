<?php get_header(); ?>

<!--page.php-->

<div id="container">

<div id="maincontent">

    <!--loop-->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
<!--post title-->
<div class="title">
<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
</div>		
	
<!--post with more link -->
<?php the_content(); ?>
	
	<!--end of post and end of loop-->
	  <?php endwhile; endif; ?>
	
</div>
<!--page.php end-->
<!--include sidebar-->
<?php get_sidebar(); ?>
<!--include footer-->
<?php get_footer(); ?>