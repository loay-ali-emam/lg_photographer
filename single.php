<?php get_header(); ?>
<h2 id = 'sign'><?php echo get_the_title(); ?></h2>

<div style = 'padding:50px;font-size:20px;'><?php echo get_the_content(); ?></div>

<div style = 'background:#222;color:#fff;margin:20px;' class = 'p-4'>

	<h3><b>Author : </b><a class = 'd-inline' href = '<?php echo get_the_author_meta('url',$post->post_author); ?>'><?php echo get_the_author_meta('display_name',$post->post_author); ?></a></h3>
	<h3><b>Date : </b><a href = '<?php echo get_home_url() . '/' . get_the_date('Y'); ?>' class = 'd-inline'><?php echo get_the_date('Y / M / d'); ?></a></h3>
	<h3><b>Categories : </b><?php echo get_the_category_list(" , "); ?></h3>
	<h3><b>Tags : </b><?php echo get_the_tag_list(); ?></h3>

</div>

<?php get_template_part("templates/single_pagination"); ?>

<?php get_footer(); ?>