	<div id="footer">
		Copyright &copy; 2008 <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> &middot; Subscribe 
		<?php 
		global $options;
				foreach ($options as $value) {
				if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
				}
		if ($gl_rss_feed) {
			?>
			<a href="<?php echo $gl_rss_feed; ?>">
				<?php if ($gl_rss_title) {
							echo $gl_rss_title;
						} else {
							echo "RSS Feed";
						} ?></a>
			<?php } else { ?>
			<a href="<?php bloginfo('rss2_url'); ?>">RSS Feed</a>
			<?php
			} ?> now<br />
		Powered by <a href="http://wordpress.org/" target="_blank">WordPress</a> &middot; <a href="http://zacklive.com/my-first-wordpress-theme-gray-lines/168/" target="_blank">Gray Lines</a> Theme by <a href="http://zacklive.com/" target="_blank">Zack</a>
	</div>
<div id="cle"></div>
</div>
<?php wp_footer(); ?>
</body>

</html>