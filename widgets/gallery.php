<?php

	class Gallery_Grid extends WP_Widget {
		
		function __construct () {
			
			parent::__construct("gallery-grid","Gallery Grid",array(
			
				"description" => __("a Grid That Shows Your Pictures.")
			
			));
			
		}
		
		function widget ($args,$instance) {
			
			//Title Here.
			echo !empty($instance['title']) ? "<h2 style = 'margin-bottom:-50px;' id = 'sign'>" . $instance['title'] . "</h2>":"No Sign Here";
			
			//Get The Pictures.
			$pics = new WP_Query(array(
			
				"post_type" => "picture",
				"posts_per_page" => 8
			
			));
			
			//Gallery Body.
			echo "<a id = 'gallery-grid' style = 'padding-top:75px;'>";

			//Start Loop.
			if($pics->have_posts()):
				while($pics->have_posts($pics)):

				$pics->the_post();

				//Picture Start.
				echo "<li id = 'picture' onclick = window.location.href=\"" . get_the_permalink() . "\">";
					
					the_post_thumbnail();
				
					echo "<div class = 'layout'>";
					
						echo "<h2>" . get_the_title() . "</h2>";
					
					echo "</div>";
				
				//Picture End.
				echo "</li>";
			
			//End The Loop.
			endwhile;endif;
			
			$pics->wp_reset_postdata();
			
			echo "</div>";
			
		}
		
		function update($new,$old) {
			
			//Only Sanitize The Title.
			$title = sanitize_text_field($old['title']);
			
			return $title;
			
		}
		
		function form($instance) {
			
			$title = empty($instance['title']) ? "":$instance['title'];
			
			/* The Title. */
			echo "<label for = '" . $this->get_field_id('title') . "'>Title</label>";
			echo "<input 
					type = 'text'
					name = '" . $this->get_field_name('title') . "'
					id = '" . $this->get_field_id('title') . "'
					value = '$title'
					placeholder = '...' />";
			
		}
		
	}

	//Register The widget.
	register_widget("Gallery_Grid");

?>
