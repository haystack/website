	<div id="sidebar1">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
		<ul>
			<li><h2>Search</h2>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</li>
	<li>
	  <h2>Categories</h2>
				
		<ul>
	<?php wp_list_cats('sort_column=name&optioncount=0&hierarchical=0'); ?>

		</ul>
	</li>			

			<?php get_links_list(); ?>

		
		</ul>
		<?php endif; ?>
	</div>
	
	<div id="sidebar2">
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
		<ul>
			

			<li>
			  <h2>Archives</h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>


		<li><h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
		  </li>

		
			<li><h2>RSS</h2>
				<ul>
				<li><a href="<?php bloginfo('rss2_url'); ?>">Posts</a></li>
				<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments</a></li>
			
				</ul>
			</li>
		</ul>
		<?php endif; ?>
	</div>
