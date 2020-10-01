<!-- Header File -->
<?php get_header(); ?>

	<!-- Start The Loop. -->
	<?php if(have_posts()): while(have_posts()): ?>

		<?php the_post(); ?>

		<?php the_title('<p id = "title">','</p>'); ?>
		<?php the_content('More...');?>

	<?php endwhile;endif; ?>

<!-- Footer File -->
<?php get_footer(); ?>