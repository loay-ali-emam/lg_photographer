<?php get_header(); ?>

<section id = 'author-identify'>

	<!-- Author Profile Image. -->
	<img id = 'author-img' src = '<?php echo get_avatar_url(get_the_author_meta('ID')); ?>' alt = 'Profile Picture' />

	<!-- Author Profile Name. -->
	<p id = 'site-name'><?php echo ucwords(get_the_author_meta('display_name')); ?></p>
	<h4 class = 'text-center'><?php echo get_the_author_meta("email"); ?></h4><hr />

	<?php if(get_the_author_meta("user_description")): ?>

		<p style = 'font-size:22px;'><?php the_author_meta("user_description"); ?></p>

	<?php endif; ?>

</section>

<?php  
	
	//Get The Author Properties.
	$author_prop = lg_photographer_user_meta(get_the_author_meta("ID"));

?>

<section id = 'author-stats'>

	<label>
		<p id = 'stat-head'>Pictures</p>
		<p id = 'stat-val'><?php echo count_user_posts(get_the_author_meta("ID"),'picture'); ?></p>
	</label>
	
	<label>
		<p id = 'stat-head'>Locations Visited</p>
		<p id = 'stat-val'><?php echo $author_prop[0]; ?></p>
	</label>

	<label>
		<p id = 'stat-head'>Picture's Activities</p>
		<p id = 'stat-val'><?php echo $author_prop[1]; ?></p>
	</label>


</section>

<section id = "gallery-grid">

	<?php
	
		$cur_page = empty($_GET['page']) ? 1:absint($_GET['page']);
	
		$a_query = new WP_Query(array(
			
			"author" => get_the_author_meta("ID"),
			"post_type" => "picture",
			"posts_per_page" => 6,
			"paged" => $cur_page
			
		));
		
		$max_pages = $a_query->max_num_pages;
		
		if($cur_page < 1 or $cur_page > $max_pages) {
			
			$a_query = new WP_Query(array(
			
				"author" => get_the_author_meta("ID"),
				"post_type" => "picture",
				"posts_per_page" => 6,
				"paged" => 1
			
			));
			
			$cur_page = 1;
			
		}
		
		//Start Loop.
		if( $a_query->have_posts() ):
		
			while( $a_query->have_posts() ): 
			
				$a_query->the_post(); ?>
			
				<a href = '<?php echo get_the_permalink(); ?>' id = 'picture' style = 'position:relative;height:250px;'>
				
					<?php the_post_thumbnail(); ?>
			
					<div class = "layout">
					
						<?php the_title(); ?>
					
					</div>
					
				</a>
	
	<?php endwhile; ?>

	</section>

	<div id = 'single-pagination'>
		
		<!-- Moving Backward -->
		<?php if($cur_page > 1): ?>
		
		<p>
			<i class = 'dashicons dashicons-arrow-left-alt'></i> <a href = '<?php echo $_SERVER['REDIRECT_URL']; ?>?page=<?php echo $cur_page - 1; ?>'>Back</a>
		</p>
	
		<?php else: ?>
	
		<p style = 'background:#777;'>
			<i class = 'dashicons dashicons-arrow-left-alt'></i> <a>Back</a>
		</p>	
	
		<?php endif; ?>
	
		<!-- Moving Forward -->
		<?php if($cur_page < $max_pages): ?>
	
		<p>
			<a href = '<?php echo $_SERVER['REDIRECT_URL']; ?>?page=<?php echo $cur_page + 1; ?>'>Next</a> <i class = 'dashicons dashicons-arrow-right-alt'></i>
		</p>
	
		<?php else: ?>
		
		<p style = 'background:#777;'>
			<a>Next</a> <i class = "dashicons dashicons-arrow-right-alt"></i>
		</p>
	
		<?php endif; ?>
	
	</div>

	<?php wp_reset_postdata();
	
	else: 
	
		echo "<h3 style = 'margin:20px auto;'>No Pictures</h3>";

	endif; ?>

<?php get_footer(); ?>