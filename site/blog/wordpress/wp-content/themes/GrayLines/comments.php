<?php // Password Protection Checking
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
	echo 'This post is password protected. Enter the password to view comments.';
	return;
}

?>

<!-- You can start editing here. -->

<?php if ( have_comments() ): ?>
	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<ul class="commentlist">
		<?php wp_list_comments(); ?>
	</ul>
	
	<div class="comment-navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
<?php else : // this is displayed if there are no comments so far ?>

<?php if ('open' == $post->comment_status) : ?>
	<!-- If comments are open, but there are no comments. -->
	<?php else : // comments are closed ?>

	<!-- If comments are closed. -->
<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
	<div class="cle"></div>
	<div id="respond"><h3><?php comment_form_title(); ?></h3>
	<div id="cancel-comment-reply">
		<small><?php cancel_comment_reply_link(); ?></small>
	</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="30" tabindex="1" />
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="30" tabindex="2" />
<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="30" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>

<div>
<?php comment_id_fields(); ?>
<input type="hidden" name="redirect_to" value="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" /></div>

<p><small><strong>XHTML:</strong> <?php _e('You can use these tags&#58;'); ?> <?php echo allowed_tags(); ?></small></p>

<p><textarea name="comment" id="comment" cols="80" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" /></p>

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>