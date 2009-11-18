<?php
if ( function_exists('register_sidebar') )
register_sidebar(array(
'before_widget' => '<div class="sbcontainers">',
'after_widget' => '</div>',
'before_title' => '<h1>',
'after_title' => '</h1>',
));


function show_avatar($comment, $size)
	{				
	 $email=strtolower(trim($comment->comment_author_email));
	 $rating = "G"; // [G | PG | R | X]
	 
	 if (function_exists('get_avatar')) {
      echo get_avatar($email, $size);
   } else {
      
      $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=
         " . md5($emaill) . "&size=" . $size."&rating=".$rating;
      echo "<img src='$grav_url'/>";
   }		
	}

?>