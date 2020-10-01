<div id = 'single-pagination'>

	<?php 

		//The Previous Post Link.
		if( get_previous_post_link() ) {
			
			previous_post_link('<p><i class = "dashicons dashicons-arrow-left-alt"></i>  %link</p>');
			
		}else {
			
			echo "<p style = 'background:#777;'><i class = 'dashicons dashicons-arrow-left-alt'></i></a></p>";
			
		}
		
		//The Next Post Link.
		if( get_next_post_link() ) {
			
			next_post_link('<p>%link <i class = "dashicons dashicons-arrow-right-alt"></i>  </p>');
			
		}else {
			
			echo "<p style = 'background:#777;'><i class = 'dashicons dashicons-arrow-right-alt'></i></a></p>";
			
		}

	?>

</div>