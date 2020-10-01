<!-- Header File -->
<?php get_header(); ?>

<?php 	
	$title = "Category's Page";
	$sub_title = single_cat_title('',false);
	$desc = category_description();
?>

<h1 id = "sign"><?php echo $title; ?></h1>
<h1 id = 'sign'><?php echo $sub_title; ?></h1>

<h2 id = 'sign'><?php echo __('Description'); ?></h2>
<div style = 'text-align:center;font-size:20px;'><?php echo $desc; ?></div>
<hr />

<div>

	<?php get_template_part("templates/posts"); ?>

</div>

<div id = 'single-pagination'>

	<?php get_template_part("templates/multi_pagination"); ?>

</div>

<!-- Footer File -->
<?php get_footer(); ?>