<!-- Header File -->
<?php get_header(); ?>

<?php /* Homepage Widgets. */

	for($i = 1;$i <= 4;$i++):

		if( is_active_sidebar('home-' . $i) ) {
			
			dynamic_sidebar("home-" . $i);
			
		}
	
	endfor;

 ?>

<!-- Start The Loop. -->
<?php while(have_posts()): if(the_post()): ?>

<?php the_post(); ?>
<?php the_title(); the_content(); ?>

<?php 

	endif;endwhile; 
	wp_reset_postdata();

?>

<!-- Footer File -->
<?php get_footer(); ?>