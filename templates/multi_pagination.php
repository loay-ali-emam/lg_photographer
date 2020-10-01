<?php

	//Moving Backward.	
	if( get_previous_posts_link() ) {
	
		previous_posts_link('<p><i class = "dashicons dashicons-arrow-left-alt"></i> Previous</p>');
		
	}else {
		
		echo "<p style = 'background:#777;'><i class = 'dashicons dashicons-arrow-left-alt'></i><a>Previous</a></p>";
		
	}
		
	if( get_next_posts_link() ) {
		
		//Moving Forward.
		next_posts_link('<p>Next <i class = "dashicons dashicons-arrow-right-alt"></i></p>');
	
	}else {
		
		echo "<p style = 'background:#777;'><a>Next</a> <i class = 'dashicons dashicons-arrow-right-alt'></i></p>";
		
	}
	
?>