
<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div class="search"><input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" size="15" id="s" /><input type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/icon_search.gif" align="top" id="button_search" value="Search" />
</div>
</form>
