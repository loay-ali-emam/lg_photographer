<?php

/* Include Main Scripts. */
function lg_include_scripts () {
	
	//Register Bootstrap.
	wp_enqueue_style("bootstrap",get_template_directory_uri() . "/css/bootstrap.min.css");
	wp_enqueue_style("bootstrap-grid",get_template_directory_uri() . "/css/bootstrap-grid.min.css");
	wp_enqueue_script('bootstrap-js',get_template_directory_uri() . "/js/bootstrap.min.js",array('jquery'),false,true);
	
    //Include The Main StyleSheet.
    wp_enqueue_style("style",get_stylesheet_uri());
	
	//Include Main Javascript File.
	wp_enqueue_script("options",get_template_directory_uri() . "/js/main.js",array(),false,true);
	
	//Include Dashicons.
	wp_enqueue_style("dashicons");
	
}

/* Theme Menus. */
function register_menus () {
	
	register_nav_menus(array(
	
		"Primary" => "Main Menu In The Website",
		"Social Media" => "Social Media Menu" 
	
	));
	
}

/* Theme Supports. */
function lg_photographer_supports () {
	
	//Thumbnail For Pictures.
	add_theme_support("post-thumbnails");
	add_post_type_support("picture","thumbnail");

	//Author Feature In Each Picture,Album,Location.
	add_post_type_support("picture","author");
	
	add_theme_support("custom-background");
	
}

/* Register Widget Areas In The Page. */

/* Include Themes Widgets. */
function lg_get_widgets () {
	
	//Gallery Grid Widget.
	include get_template_directory() . "/widgets/gallery.php";
	
	//Social Media Links.
	include get_template_directory() . "/widgets/social.php";

}

/* Custom Excerpt Func. */
function lg_photographer_excerpt ($more) {
	
	return __('<a href = "' . get_the_permalink() . '">More...</a>');
	
}

add_filter('excerpt_more','lg_photographer_excerpt');

/* Counting User Properties. */
function lg_photographer_user_meta ($id) {
	
	//Start a WP_query.
	$user_meta = new WP_Query(array(
	
		"author" => $id,
		"post_type" => "picture"
	
	));
	
	//Prepare The Counters.
	$location_visited = array();
	$pictures_activities = 0;
	
	//Start The Loop.
	if($user_meta->have_posts()) {
		
		while($user_meta->have_posts()) {
			
			$user_meta->the_post();
			
			array_push($location_visited,get_the_terms(get_the_ID(),'location')[0]->name);
		
			$pictures_activities += (int)get_comments_number(get_the_ID());
		
		}
		
	}
	
	//Reset The Post Meta.
	wp_reset_postdata();

	//Unique The Locations Array.
	$location_visited = array_unique($location_visited);
	
	//Return an Array
	/*
	
		[0] => $location_visited
		[1] => $pictures_activites
	
	*/
	
	return array(count($location_visited),$pictures_activities);
	
}

/* Register Picture Type. */
function lg_photographer_regsiter_post_type () {
	
	register_post_type('picture',array(
	
		"label" 		=> __("Pictures"),
		"public" 		=> true,
		"menu_icon" 	=> 'dashicons-format-image',
		"description" 	=> __("Add , Edit or Delete Pictures."),
		"supports"		=> array("comments",'editor','title'),
		"labels" 		=> array(
		
			"name" 				=> __("Pictures"),
			"singular_name" 	=> __("Picture"),
			"add_new_item" 		=> __('Add New Picture'),
			"edit_item" 		=> __("Edit Picture"),
			"new_item" 			=> __('New Picture'),
			"view_item" 		=> __("View Picture Post"),
			"view_items" 		=> __("View Pictures"),
			"search_items"  	=> __("Search Pictures"),
			"not_found"			=> __("No Pictures Found"),
			"not_found_in_trash" => __("No Pictures Found"),
			"all_items" 		=> __("All Pictures"),
			"archives" 			=> __("Picture Archives"),
			"attributes"		=> __("Picture Attributes"),
			"insert_into_item"  => __("Insert Into The Picture"),
			"featured_image" 	=> __("The Picture"),
			"set_featured_image"=> __("Set The Picture"),
			"remove_featured_image" => __("Remove The Picture"),
			"use_featured_image"=> __("Use The Picture")
		
		)
	
	));
	
	//Register Album Taxonomy.
	register_taxonomy("albums",'picture',array(
	
		"label" 		=> __('Albums'),
		"description"	=> __("Add,Remove,Edit or Delete Albums"),
		"public" 		=> true,
		"update_count_callback"		=> true,
		"labels" 		=> array(
		
			"name" 			=> __("Albums"),
			"singular_name" => __("Album"),
			"add_new_item" 	=> __("Add New Album"),
			"edit_item" 	=> __('Edit Album'),
			"new_item"		=> __('New Album'),
			"search_items" 	=> __("Search Album"),
			"popular_items" => __("Popular Albums"),
			"all_items" 	=> __("All Albums"),
			"parent_item"	=> __("Parent Album"),
			"view_item"		=> __("View Album"),
			"update_item"	=> __("Update Album"),
			"new_item_name"	=> __("New Album Name"),
			"separate_items_with_commas" 	=> __("Seperate Albums With Comma"),
			"add_or_remove_items" 			=> __("Add or Remove Albums"),
			"not_found"		=> __("No Albums Found"),
			"no_terms" 		=> __("No Albums")
		
		)
	
	));
	
	//Register Location Taxonomy.
	register_taxonomy("location","picture",array(
	
		"label" 		=> __('Locations'),
		"description"	=> __("Add,Remove,Edit or Delete Locations"),
		"public" 		=> true,
		"query_var"		=> true,
		"labels" 		=> array(
		
			"name" 			=> __("Locations"),
			"singular_name" => __("Location"),
			"add_new_item" 	=> __("Add New Location"),
			"edit_item" 	=> __('Edit Location'),
			"new_item"		=> __('New Location'),
			"search_items" 	=> __("Search Locations"),
			"popular_items" => __("Popular Locations"),
			"all_items" 	=> __("All Locations"),
			"parent_item"	=> __("Parent Location"),
			"view_item"		=> __("View Location"),
			"update_item"	=> __("Update Location"),
			"new_item_name"	=> __("New Location Name"),
			"separate_items_with_commas" 	=> __("Seperate Locations With Comma"),
			"add_or_remove_items" 			=> __("Add or Remove Locations"),
			"not_found"		=> __("No Locations Found"),
			"no_terms" 		=> __("No Loctions")
		
		)	
	
	));
	
}

//Header Customize Hook.
function lg_photographer_header_customize ($wp_customize) {
	
	//Header Section.
	$wp_customize->add_section("header-section",array(
	
		"title" => __("Header")
	
	));
	
	//Main Color.
	$wp_customize->add_setting("header-color",array("default" => "#fff"));
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,"header-color",array(
	
		"section" => "header-section",
		"label" => __("Color :")
	
	)));
	
	//Main Background Color.
	$wp_customize->add_setting("header-background-color");
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,"header-background-color",array(
	
		"section" => "header-section",
		"label" => __("Background Color :")
	
	)));
	
	//Main Background Image.
	$wp_customize->add_setting("header-background-image");
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,"header-background-image",array(
	
		"section" => "header-section",
		"label" => __("Background Image :")
	
	)));
	
	//Header Background Opacity.
	$wp_customize->add_setting("header-background-opacity");
	
	$wp_customize->add_control("header-background-opacity",array(
	
		"type" => "range",
		"label" => __("Background Ground Opacity :"),
		"section" => "header-section",
		"input_attrs" => array(
		
			"min" => 0,
			"max" => 255,
			"step" => 5
		
		)
	
	));
	
	//Display Logo Checkbox.
	$wp_customize->add_setting("header-logo-display",array( "default" => true ));
	
	$wp_customize->add_control("header-logo-display",array(
	
		"section" => "header-section",
		"label" => __("Display Logo"),
		"type" => "checkbox"
	
	));
	
	//Logo Image.
	$wp_customize->add_setting("header-logo");
	
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,"header-logo",array(
	
		"section" => "header-section",
		"label" => __("Header Logo :")
	
	)));
	
}

//Footer Customize Hook.
function lg_photographer_footer_customize ($wp_customize) {
	
	//Make The Footer Section.
	$wp_customize->add_section("footer-section",array(
	
		"title" => __("Footer")
	
	));
	
	//First Color Setting.
	$wp_customize->add_setting("footer-color-1",array(
	
		"default" => "#fff"
	
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,"footer-color-1",array(
	
		"section" => "footer-section",
		"label" => __("Color 1 :")
	
	)));
	
	//First Background Color.
	$wp_customize->add_setting("footer-background-1");
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'footer-background-1',array(
	
		"section" => "footer-section",
		"mime-type" => "image/jpg",
		"label" => __("Background Image 1 :")
	
	)));
	
	//First Back Color.
	$wp_customize->add_setting("footer-background-color-1",array(
	
		"default" => "#222"
	
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,"footer-background-color-1",array(
	
		"label" => __("Background Color 1"),
		"section" => "footer-section"
	
	)));
	
	//Second Color.
	$wp_customize->add_setting("footer-color-2",array( 'default' => '#fff' ));
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,"footer-color-2",array(
	
		"label" => __("Color 2 :"),
		"section" => "footer-section"
	
	)));
	
	//Second Background Image.
	$wp_customize->add_setting("footer-background-2");
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,"footer-background-2",array(
	
		"label" => __("Background Image 2 :"),
		"section" => "footer-section",
		"mime-type" => "image/jpg"
	
	)));
	
	//Second Back Color.
	$wp_customize->add_setting("footer-background-color-2",array( "default" => "#000" ));
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,"footer-background-color-2",array(
	
		"label" => __("Background Color 2 :"),
		"section" => "footer-section"
	
	)));
	
}

/* Register Widgets In The Page. */
function lg_register_sidebars () {
	
	//Homepage Widgets (4 Widgets).
	for($i = 1;$i <= 4;$i++) {
		
		register_sidebar(array(
		
			"id" => 'home-' . $i,
			'name' => 'Home Widget ' . $i,
			"description" => __('Widget Number ' . $i . ' In Homepage')
		
		));
		
	}
	
	//Footer Widgets ( 3 Widgets ).
	for($i = 0;$i < 3;$i++) {
		
		register_sidebar(array(
		
			"id" => "footer-" . ($i + 1),
			"name" => 'Footer ' . ($i + 1),
			"description" => "Display Your Widget In The Slot Number " . ($i + 1) . " In The Footer."
		
		));
		
	}
	
}

/* Apply Styling In Top Of The Page. */
function apply_styling () {
	
	echo "<style>";
	
	/* Apply Color To Links. */
	echo "#apply-color a {";
	
		echo "color:" . get_theme_mod('header-color') . ";";
		echo "opacity:0.7;";
	
	echo "}";
	
	/* Lower Nav Styling. */
	echo ".lower-nav :first-child {";
	
		echo "color:" . get_theme_mod("footer-color-1",'#fff') . ";";
		echo "background-color:" . get_theme_mod("footer-background-color-1",'#444') . ";";
		echo "background-image:url('" . wp_get_attachment_image_src(get_theme_mod("footer-background-1")) . "');";
	
	echo "}";
	
	echo ".lower-nav :last-child {";
	
		echo "color:" . get_theme_mod("footer-color-2","#fff") . ";";
		echo "background-color:" . get_theme_mod("footer-background-color-2",'#000') . ";";
		echo "background-image:url('" . wp_get_attachment_image_src(get_theme_mod("footer-background-2")) . "');";

	echo "}";
	
	//Prepare UpperNav Background Color.
	$the_color = (string)get_theme_mod('header-background-color');
	
	$upper_background = array(

		"r" => hexdec($the_color[1] . $the_color[2]),
		"g" => hexdec($the_color[3] . $the_color[4]),
		"b" => hexdec($the_color[5] . $the_color[6])
	
	);
	
	/* Uppernav Styling. */
	echo "#uppernav {";
	
		echo "background-color:rgba(" . implode(',',$upper_background) . "," . (get_theme_mod('header-background-opacity',255) / 255) . ");";
		echo "color:" . get_theme_mod('header-color') . ";";
	
	echo "}";
	
	echo "#uppermenu {";
	
		echo "background-color:rgba(" . implode(',',$upper_background) . "," . (get_theme_mod('header-background-opacity',255) / 255) . ");";
		echo "color:" . get_theme_mod('header-color') . ";";
	
	echo "}";
	
	echo "#uppernav i , #uppernav li > a{";
	
		echo "color:" . get_theme_mod('header-color') . ";";
	
	echo "}";
	
	echo "#sign {";
	
		echo "color:" . get_theme_mod('header-color') . ";";
		echo "background-color:" . get_theme_mod('header-background-color') . ";";
	
	echo "}";
	
	echo "</style>";
	
}

/* Register Widgets. */
add_action("widgets_init","lg_get_widgets");

/* Register Sidebars ( widgets Places ) */
add_action("widgets_init","lg_register_sidebars");

/* Register Nav Menus. */
add_action("init","register_menus");

/* Register Picture Post Type. */
add_action("init",'lg_photographer_regsiter_post_type');

//Styling In The Wp_head.
add_action("wp_head","apply_styling");

//Include Theme Supports.
add_action("init","lg_photographer_supports");

//Register The Customize Functions.
add_action("customize_register","lg_photographer_header_customize");
add_action("customize_register","lg_photographer_footer_customize");

/* Include Main Scripts ( Css & Javascript ) */
add_action("wp_enqueue_scripts","lg_include_scripts");

?>
