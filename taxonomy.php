<?php get_header(); ?>

<?php $tax = get_term_by('slug',get_query_var('term'),get_query_var('taxonomy')); ?>

<?php 

	//Default Is None.
	$logo = '';
	
	//Check If It's an Album
	if($tax->taxonomy == "albums") {
		
		$logo = '<i class = "dashicons dashicons-images-alt"></i> ';
		
	}else { /* a Location. */
		
		$logo = "<i class = 'dashicons dashicons-location'></i> ";
		
	}

?>

<h1 id = 'sign'><?php echo $logo . ucfirst($tax->taxonomy); ?></h1>
<h2 id = 'sign'><?php echo ucfirst($tax->name); ?></h2>

<section id = 'gallery-grid'>

	<?php
		
		//The Current Page We Are In.
		$cur_page = empty($_GET['page']) ? 1:absint($_GET['page']);
		
		$a_query = new WP_Query(array(
			
			"tax_query" => array(array(
				
				'taxonomy' => $tax->taxonomy,
				"field" => $tax->slug,
				"terms" => $tax->term_taxonomy_id
				
			)),
			
			"post_type" => "picture",
			"paged" => $cur_page,
			'posts_per_page' => 2
			
		));
		
		//Maximum Page Count.
		$max_pages = $a_query->max_num_pages;
		
		//Start Loop.
		if( $a_query->have_posts() ):
		
			while( $a_query->have_posts() ): 
			
				$a_query->the_post(); ?>
			
				<a href = '<?php echo get_the_permalink(); ?>' id = 'picture' style = 'position:relative'>
				
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
	
	<?php
	
	wp_reset_postdata();

	else: 

		echo "<h3 style = 'margin:auto;'>No Pictures</h3>";

	endif; ?>
	
<?php get_footer(); ?>