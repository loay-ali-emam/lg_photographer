<?php

	//Start The Loop.
	if( have_posts() ) {
	
		while( have_posts() ) {

			echo "<div id = 'post'>";

			the_post();

			the_title('<h1 id = "title">','</h1>');
			the_excerpt();

			echo "</div>";

		}
		
	}
	
?>
