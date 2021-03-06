<?php get_header(); ?>

<h1 id = 'sign'><i class = 'dashicons dashicons-calendar-alt'></i> Date</h1>
<h2 id = 'sign'><?php echo get_the_date('y / M / d'); ?></h2>

<h3 id = 'sign'>Pictures</h3>

<section id = 'gallery-grid'>

<?php

	//Start a Wp Query.
	$search_q = new WP_Query(array(
	
		"year" => get_the_date('Y'),
		"monthnum" => get_the_date('n'),
		"day" => get_the_date('j'),
		"post_type" => "picture"
	
	));
	
	//Start The Loop.
	if($search_q->have_posts()):
		while($search_q->have_posts()):
			$search_q->the_post(); ?>
			
<a 
	href = '<?php the_permalink(); ?>'
	id = 'picture' 
	style = 'position:relative'>

	<?php the_post_thumbnail(); ?>

	<div class = "layout">
	
		<?php the_title(); ?>
	
	</div>

</a>
			
	<?php endwhile;else: ?>

	<p style = 'margin:auto;'>No Pictures Founded</p>

	<?php endif; ?>

</section>

<h3 id = 'sign' style = 'margin:20px 0;'>Posts</h3>

<section style = 'text-align:center;'>

<?php

	//Start a Wp Query.
	$search_q = new WP_Query(array(
	
		"year" => get_the_date('Y'),
		"monthnum" => get_the_date('n'),
		"day" => get_the_date('j'),
		"post_type" => "post"
	
	));
	
	//Start The Loop.
	if($search_q->have_posts()):
		while($search_q->have_posts()):
			$search_q->the_post(); ?>
			
<div
	id = 'picture' 
	style = 'position:relative;
	text-align:center;'>

	<?php the_post_thumbnail(); ?>

	<h2><?php echo get_the_title(); ?></h2>

	<?php the_excerpt(); ?>

</div><hr />
			
	<?php endwhile;else: ?>

	<p style = 'margin:20px auto;'>No Posts Founded</p>

	<?php endif; ?>

</section>

<?php get_footer(); ?>