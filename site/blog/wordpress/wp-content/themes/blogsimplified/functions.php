<?php
if ( function_exists('register_sidebar') )
	register_sidebar(array(
        'before_widget' => '<li><div id="%1$s" class="%2$s">',
        'after_widget' => '</div></li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
function widget_mytheme_search() {
?>

<li><div>
<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>"><p><input type="text" value="Search..." name="s" id="s" onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}" /></p></form>
</div></li>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_mytheme_search');

?>
