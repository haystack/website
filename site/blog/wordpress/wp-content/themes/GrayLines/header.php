<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
	
</head>

<body>
<div id="wrapper">
<?php /* This code retrieves all our admin options. */
	global $options;
	foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) { 
		$$value['id'] = $value['std']; 
	} else { 
		$$value['id'] = get_settings( $value['id'] ); }
	}
?>
	<div id="header">
	<div id="logo">		
		<?php if ($gl_logo_url) { ?>			
				<a href="<?php bloginfo('url'); ?>"><img src="<?php echo $gl_logo_url ?>" alt="<?php bloginfo('name'); ?>" /></a>
		<?php } else { ?>
				<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		<?php } ?>
		<?php if ($gl_no_desc == "false") { ?>
				<h2><?php bloginfo('description'); ?><h2>
		<?php } ?>
	</div>
	</div>