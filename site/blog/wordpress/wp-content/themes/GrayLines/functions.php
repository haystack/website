<?php
if ( function_exists('register_sidebar') )
    register_sidebar();
	

$themename = "Gray Lines";
$shortname = "gl";

$options = array (

	array(	"name" => "Custom RSS Feed Setting",
			"type" => "title"),
			
	array(	"type" => "open"),
	
	array(	"name" => "RSS Feed Title",
			"desc" => "Enter your RSS Feed title.",
			"id" => $shortname."_rss_title",
			"std" => "RSS Feed",
			"type" => "text"),

	array(	"name" => "Custom RSS Feed",
			"desc" => "Enter your RSS Feed.",
			"id" => $shortname."_rss_feed",
			"std" => "",
			"type" => "text"),

	array(	"type" => "close"),
	
	array(	"name" => "Logo Setting",
			"type" => "title"),
			
	array(	"type" => "open"),

	array(	"name" => "Logo URL",
			"desc" => "Enter the URL of your Logo, suggest height < 80px, width < 100px.",
			"id" => $shortname."_logo_url",
			"std" => "",
			"type" => "text"),
	
	array(  "name" => "Don't Show Blog Description?",
			"desc" => "Check this box if you don't want to show the blog description.",
            "id" => $shortname."_no_desc",
            "type" => "checkbox",
            "std" => "false"),
			
	array(	"type" => "close")
	
);

function graylines_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'graylines_admin');

}

function graylines_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
?>
<div class="wrap">
<h2><?php echo $themename; ?> Settings</h2>

<form method="post">



<?php foreach ($options as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		?>
        <table width="100%" border="0" style="background-color:#eef5fb; padding:10px;">
		
        
        
		<?php break;
		
		case "close":
		?>
		
        </table><br />
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" border="0" style="background-color:#dceefc; padding:5px 10px;"><tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>
                
        
		<?php break;

		case 'text':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		            
		case "checkbox":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><small><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
        <?php 		break;
} 
}
?>

<!--</table>-->

<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset to Default" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}

add_action('admin_menu', 'graylines_add_admin'); ?>