<!--sidebar.php-->	
<!--Start Sidebar-->
	<div id="sidebar">
        
       <?php if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar() ) : ?>

      <?php include(TEMPLATEPATH . '/searchform.php'); ?>

      <div class="widget">			
					<h2 class="hl">Categories</h2>
					<ul>
							<?php wp_list_cats('sort_column=name&optioncount=1'); ?>
					</ul>
			</div>
			      
			  

			<div class="widget">			
					<h2 class="hl">Archives</h2>
					<ul>
							<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
					</ul>
			</div>
			
     
		
			<div class="widget">			
				<h2 class="hl">Blogroll</h2>
				<ul>
					<?php get_links(-1, '<li>', '</li>', ' - '); ?>
				</ul>
			</div>
		
		<div class="widget">			
		<h2>Meta</h2>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
				<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
				<?php wp_meta(); ?>
			</ul>
	</div>

		
			
    	<?php endif; ?>		
   </div>
<!--/End Sidebar-->

<!--sidebar.php end-->
