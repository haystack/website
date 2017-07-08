	<div class="bottom-rounded-corners"></div>
</div>
<!-- [/#center] -->


<hr />
<div id="footer">
<!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
	<p>
		<?php printf(__('%1$s is proudly powered by %2$s', 'wordpraized'), get_bloginfo('name'),
		'<a href="http://wordpress.org/">WordPress</a>'); ?>
		<br /><?php printf(__('%1$s and %2$s.', 'wordpraized'), '<a href="' . get_bloginfo('rss2_url') . '">' . __('Entries (RSS)', 'wordpraized') . '</a>', '<a href="' . get_bloginfo('comments_rss2_url') . '">' . __('Comments (RSS)', 'wordpraized') . '</a>'); ?>
		<!-- <?php printf(__('%d queries. %s seconds.', 'wordpraized'), get_num_queries(), timer_stop(0, 3)); ?> -->
	</p>
</div>
</div>

<?php /* "All your base are belong to us!" */ ?>

<?php wp_footer(); ?>


<?php if (stristr($_SERVER['HTTP_USER_AGENT'], 'iPhone')): ?>
<script type="text/javascript">  
// iPhone orientaton switcher (see theme's iphone.css)
function orient() {  
	switch(window.orientation){    
		case 0:
			document.body.setAttribute("class", 'portrait');
			break;  
		case -90:
			document.body.setAttribute("class", 'landscape');
			break;  
		case 90:
			document.body.setAttribute("class", 'landscape');
			break;  
	}
}  
  
window.onload = orient();  
</script>
<?php endif ?>
		
</body>
</html>
