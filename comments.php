<?php

	//Check If The Comment Is Open.
	if( comments_open() ) {
		
		echo "<section id = 'comments'>";
			
			//Print Out Comments Number.
			$com_num = get_comments_number($post->ID);
			
			echo "<p class = 'text-center display-5'><i class = 'dashicons dashicons-admin-comments'></i> : ";
			
			switch($com_num) {
				
				case 0:
				
					echo "No Comments Yet";
				
				break;
				
				case 1:
				
					echo "One Comment";
				
				break;
				
				default:
				
					echo  $com_num . " Comments";
				
				break;
				
			}
			
			echo "</p>";
			
			wp_list_comments(array(
			
				"max_depth" => 3,
				"avatar_size" => 64
			
			));
			
			comment_form(array(
			
				"comment_field" => "<textarea class = 'form-control' id = 'comment' name = 'comment' cols=45 rows=8></textarea>",
				"class_submit" => "btn btn-dark"
			
			));

		echo "</section>";
		
	}else {
		
		echo "Comments Are Closed";
		
	}

?>