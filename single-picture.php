<?php get_header(); ?>

<div class = 'above row'>

	<section class = 'col-11 col-md-6 mx-auto my-4'>
	
		<?php the_post_thumbnail('',array("class" => "w-100 h-100")); ?> 
	
	</section>
	
	<section 
		class = 'col-11 col-md-5 mx-auto mt-3 text-left p-3' 
		id 	  = "apply-color"
		style = "background-color:<?php echo get_theme_mod("header-background-color"); ?>;color:<?php echo get_theme_mod("header-color"); ?>;">
		
		<!-- Picture Title. -->
		<p class = 'font-weight-bold display-4 text-center'><?php the_title(); ?></p>
		
		<!-- Picture Author. -->
		<b class = "text-light h1 d-inline font-weight-bold">Author : </b> <a href = '<?php echo get_the_author_meta('url',$post->post_author); ?>' class = "h1 d-inline"><?php echo get_the_author_meta('display_name',$post->post_author); ?></a><br />
		
		<!-- Picture Date. -->
		<b class = "text-light h1 d-inline font-weight-bold">Date : </b> <a href = '<?php echo get_home_url() . '/' . get_the_date('Y'); ?>' class = 'h1 d-inline'><?php echo get_the_date('Y/M/d'); ?></a><br />

		<!-- Picture Location(s) -->
		<b class = 'text-light h1 d-inline font-weight-bold'><i class = "h1 dashicons dashicons-location mr-4"></i>: </b><p class = "h1 d-inline"><?php echo get_the_term_list(get_the_ID(),'location',""," , "); ?></p><br />

		<!-- Picture Album(s) -->
		<b class = "text-light h1 d-inline font-weight-bold"><i class = 'h1 dashicons dashicons-book mr-4'></i>: </b><p class = "h1 d-inline"><?php echo get_the_term_list(get_the_ID(),'albums',""," , "); ?></p><hr />

		<p class = 'text-light text-center h2'><?php echo get_the_content(); ?></p>

	</section>
	
	<?php get_template_part("templates/single_pagination"); ?>
	
	<?php if( comments_open(get_the_ID()) ): ?>
	<!-- Comments Section -->
	<section id = 'comments'
		class = 'col-11 mx-auto p-3 mt-3' 
		style = 'background-color:<?php echo get_theme_mod('header-background-color'); ?>;color:<?php echo get_theme_mod('header-color'); ?>;'>
	
		<?php if( get_comments_number(get_the_ID()) == 0 ): ?>
		
			<p class = 'text-center h3 d-inline'>Their's No Comments For This Picture</p>
		
		<?php else: /*
		
				//Get The Comments.
				$picture_comments = get_comments(get_the_ID());
				
				//Loop Inside It.
				foreach($picture_comments as $comment) {
					
					//Check If It's For This Picture.
					if($comment->comment_post_ID == get_the_ID()) {
						
						//The Comment Body.
						echo "<div class = 'container row border-top py-3'>";
						
							//Indentity Section.
							echo "<section class = 'col-4 mx-auto'>";
							
								//Print The Avatar Picture.
								echo get_avatar($comment->comment_author_email,96,'',$comment->comment_author . "'s Photo");
							
								//Print Comment Author's Name.
								echo "<p class = 'h3 p-1'>" . $comment->comment_author . "</p>";
						
								//Print Comment Date.
								echo "<p class = 'h5 p-1'>" . date("Y/M/d",strtotime($comment->comment_date)) . "</p>";
						
							//End Of Identity Section.
							echo "</section>";
							
							//Content Section.
							echo "<section class = 'col-8 mx-auto'>";
							
								echo '<p class = "text-center h2">' . $comment->comment_content . '</p>';
							
							echo "</section>";
					
						//End Comment Body.
						echo "</div>";
				
					}
				
				} */
				
				comments_template();
			
			endif;
			/*
			//Check If The Comments Are Allowed.
			if(comments_open()) {
				
				$comment_form_args = array(

					//Submit Button Style.
					'class_submit' 		=> "btn btn-light",
					"class_container" 	=> "text-light",
					"id_form" 			=> "apply-color",
					"comment_field"		=> "<textarea name = 'comment' id = 'comment' required='required' class = 'form-control col-12 col-lg-4 my-2' rows = '3' placeholder = 'Comment Here'></textarea>"

				);

				//The Comment Form.
				comment_form($comment_form_args);
				
			}*/
			
			?>
	
		</section>
	
	<?php endif; ?>

</div><br />

<?php get_footer(); ?>