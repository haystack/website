<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if lt IE 7]>
<style type="text/css" media="screen">
	img, div { behavior: url(<?php bloginfo('template_url'); ?>/iepngfix.htc) }
</style>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie6.css" type="text/css" media="screen" />		
<![endif]-->
<?php if (function_exists('praized_current_theme_css') && praized_current_theme_css()): ?>
<link rel="stylesheet" href="<?php echo praized_current_theme_css(); ?>" type="text/css" media="screen" />	
<?php endif ?>
<?php if (stristr($_SERVER['HTTP_USER_AGENT'], 'iPhone')): ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/iphone.css" type="text/css" media="screen" />		
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />  
<?php endif ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

</head>
<body <?php if (stristr($_SERVER['HTTP_USER_AGENT'], 'iPhone')): ?>onorientationchange="orient();"<?php endif ?>>
	
<div id="page">

<div id="header">
	<div id="headerimg">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div class="description"><?php bloginfo('description'); ?></div>
	</div>
</div>
<hr />

<!-- [begin center blog area] (end block in footer.php) -->
<div id="center">
	<div class="top-rounded-corners"></div>
