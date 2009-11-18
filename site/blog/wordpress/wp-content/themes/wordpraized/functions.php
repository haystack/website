<?php

function praized_load_theme_textdomain($domain, $abs_rel_path = false) {
	$locale = get_locale();

	if ( false !== $abs_rel_path	)
		$path = get_theme_root() . '/' . get_template() . '/' . trim( $abs_rel_path, '/');
	else
		$path = get_theme_root();

	$mofile = $path . '/'. $domain . '-' . $locale . '.mo';
	load_textdomain($domain, $mofile);
}

praized_load_theme_textdomain('wordpraized', 'languages');

/**
 * Available theme color schemes (Key is theme scheme, value is equivalent PraizedXHTML scheme )
 * @var array $praized_schemes 
 */
$praized_color_schemes = array(
	'green'        => '009900',
	'red'          => 'cc0000',
	'wine'         => '660000',
	'orange'       => 'ff6633',
	'burnt_orange' => 'ff9900',
	'tan_olive'    => '666633',
	'blue'         => '0066ff',
	'purple'       => '330066',
	'magenta'      => 'cc33cc',
	'black'        => '000000'
);

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}

function praized_head() {
	if(praized_custom_header_image()) {
		$header_image = praized_custom_header_image();

		// begin css block		
		echo <<<END
<style type="text/css" media="screen">
	#headerimg {
		background-image: url($header_image);
	}
</style>
END;
		// end css block
	}
	
	if(praized_custom_css_block()) {
		$custom_css = praized_custom_css_block();

		// begin css block		
		echo <<<END
<style type="text/css" media="screen">
	$custom_css
</style>
END;
		// end css block
	}
	
}

add_action('wp_head', 'praized_head');

function praized_current_theme_css() {
	if( praized_current_theme() ) {
		return get_template_directory_uri() . '/styles/' . praized_current_theme() . '/color.css';	
	}
}

function praized_current_theme() {
	if( get_option('wordpraized-color-scheme') ) {
		return get_option('wordpraized-color-scheme');
	}
}

function praized_custom_header_image() {
	if( get_option('wordpraized-header-image-url') ) {
		return get_option('wordpraized-header-image-url');
	}	
}

function praized_custom_css_block() {
	if( get_option('wordpraized-custom-css-block') ) {
		return get_option('wordpraized-custom-css-block');
	}
}

add_action('admin_menu', 'praized_customize_theme');

function praized_customize_theme() {
	global $praized_color_schemes;
    
    // saving header image option
	if( isset($_REQUEST['header_image']) ) {
		update_option('wordpraized-header-image-url', $_REQUEST['header_image']);
	}
	
	// reset header image option
	if( isset($_REQUEST['remove_header_preference']) ) {
		delete_option('wordpraized-header-image-url');
		wp_redirect("themes.php?page=functions.php&saved=true");
		die;
	}
	
	// saving custom css block option
	if( isset($_REQUEST['custom_css']) ) {
		update_option('wordpraized-custom-css-block', $_REQUEST['custom_css']);
	}
	
	// reset header image option
	if( isset($_REQUEST['remove_custom_css']) ) {
		delete_option('wordpraized-custom-css-block');
		wp_redirect("themes.php?page=functions.php&saved=true");
		die;
	}
	
	// saving color scheme option
	if( isset($_REQUEST['scheme']) && isset($praized_color_schemes[$_REQUEST['scheme']]) ) {
		update_option('wordpraized-color-scheme', $_REQUEST['scheme']);
		praized_match_plugin_theme('community', $_REQUEST['scheme']);
		praized_match_plugin_theme('tools', $_REQUEST['scheme']);
	}

	add_theme_page(__('Customize Praized'), __('Theme Option', 'wordpraized'), 'edit_themes', basename(__FILE__), 'praized_theme_page');
}

function praized_match_plugin_theme($plugin, $scheme) {
    global $praized_color_schemes;
    if ( ! isset($praized_color_schemes[$scheme]) )
        return;
    if ( $plugin_config = get_option("praized-{$plugin}-config") ) {
	    $plugin_config['theme'] = $praized_color_schemes[$scheme];
	    update_option("praized-{$plugin}-config", $plugin_config);
	}
}


// Admin function.php html content
function praized_theme_page() {	
	$color_scheme_list = praized_list_color_scheme();	
	$page_url = attribute_escape($_SERVER['REQUEST_URI']);
	$header_image = praized_custom_header_image();
	$custom_css = praized_custom_css_block();

	// print <<<END
	echo '<div class="wrap">';
	echo '
	<style type="text/css" media="screen">
		.scheme_selector {
			list-style: none;
			padding: 0;
		}
		
		.scheme_selector li {
			float: left;
			position: relative;
			width: 170px;
			height: 190px; 
			margin: 0 20px 10px 0;
			padding: 0 0 0 20px;
		}
		
		.scheme_selector li input {
			position: absolute;
			top: 4px;
			left: 0;
		}
		
		.scheme_selector li img { padding: 10px; background: #f0f0f0; border: 1px solid #ddd; }
		
		small {
			margin-top: 5px;
			clear: both;
			display: block;
		}
		
	</style>
	';
	echo '<h2>' . __('Praized Theme : Change header image', 'wordpraized') . '</h2>';
	echo '<form action="' . $page_url . '" method="post" accept-charset="utf-8">';
	echo '<p><strong>' . __('To change the theme default header image, first upload an image in your site\'s <a href="/wp-admin/upload.php">Media Library</a> and copy the image URL in the input below.', 'wordpraized') . '</strong><br />' . __('Recommended image size: 816x90px (see wordpraized/graphic_sources/ for our master Photoshop template).','wordpraized') . '</p>';
	echo '<input type="text" name="header_image" value="' . $header_image . '" id="header_image" style="width: 500px;" />';
	echo '<input type="submit" value="'.__('Save Header Image', 'wordpraized').'" class="button-secondary" /><br />';
	echo '<small><a href="' . $page_url . '&remove_header_preference=true">' . __('Reset Header preferences', 'wordpraized'). '</a></small>';
	echo '</form><br class="clear"/>';
	
	echo '<h2 style="margin-top: 30px;">' . __('Praized Theme : Select a color scheme', 'wordpraized') . '</h2>';
	echo '<form action="' . $page_url . '" method="post" accept-charset="utf-8">';
	echo $color_scheme_list;
	echo '<p class="clear"><input type="submit" value="'.__('Save Color Scheme', 'wordpraized').'" class="button-secondary"></p>';
	echo '</form>	<br class="clear"/>';
	
	echo '<h2 style="margin-top: 30px;">' . __('Praized Theme : Custom css', 'wordpraized') . '</h2>';
	echo '<form action="' . $page_url . '" method="post" accept-charset="utf-8">';
	echo '<p>'.__('<strong>Note:</strong> Any styling added here will be loaded after curent theme CSS. The purpose of this option is to overide any theme specific styling.', 'wordpraized').'</p>';
	echo '<textarea name="custom_css" id="custom_css" style="width: 750px; height: 120px;">'.$custom_css.'</textarea><br />';
	echo '<small><a href="' . $page_url . '&remove_custom_css=true">'.__('Remove custom CSS', 'wordpraized').'</a></small>';
	echo '<p class="clear"><input type="submit" value="'.__('Save Custom CSS Block', 'wordpraized').'" class="button-secondary"></p>';
	echo '</form>';
	echo '</div>';


}

function praized_list_color_scheme() {	
	global $praized_color_schemes;
  $theme_path = get_template_directory_uri();
	$current_color_scheme = praized_current_theme();
	
	$html = "<ul class='scheme_selector'>";
	foreach ($praized_color_schemes as $theme_scheme => $plugin_scheme) {
		if($theme_scheme == $current_color_scheme) { $checked = "checked='checked'"; } else { $checked = ""; }
		$html .= "<li><label><input type='radio' name='scheme' $checked value='$theme_scheme' id='scheme' /><img src='$theme_path/styles/$theme_scheme/screenshot.png' alt='$theme_scheme' /></label></li>";
	}
	$html .= "</ul>";
	
	return $html;	
}


?>
