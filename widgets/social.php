<?php

class Social_Links extends WP_Widget {
	
	function __construct () {
		
		$widget_options = array(
		
			"description" => "Widget To Show Your Social Links From a List."
		
		);
		
		parent::__construct("Social_Links","Social Media Links",$widget_options);
		
	}

	function widget ($args,$instance) {
		
		echo empty($instance['title']) ? '':'<h2>' . $instance['title'] . '</h2>';
		
		wp_nav_menu(array(
		
			"menu" => $instance['menu'],
			"menu_class" => "menu",
			"menu_id" => "social-links"
		
		));
		
	}
	
	//Form To Fill.
	function form ($instance) {
		
		$title = empty($instance['title']) ? '':$instance['title'];
		$menu = empty($instance['menu']) ? '':$instance['menu'];
		
		//Get All Menus.
		$wp_menus = wp_get_nav_menus();
		
		//Title Input.
		echo "<label for = '" . $this->get_field_id('title') . "'>";
			echo "Title";
		echo "</label>";
		echo "<input 
			type = 'text' 
			id = '" . $this->get_field_id('title') . "'
			name = '" . $this->get_field_name('title') . "'
			value = '" . $title . "' />";
	
		//Menus Select.
		echo "<label for = '" . $this->get_field_id('menu') . "'>Menu</label>";
		echo "<select id = '" . $this->get_field_id('menu') . "' name = '" . $this->get_field_name('menu') . "'>";
		
			foreach($wp_menus as $row) {
				
				echo "<option value = '" . $row->name . "'>" . $row->name . "</option>";
				
			}
		
		echo "</select>";
	
	}
	
	function update ($new_ins,$old_ins) {
		
		$new_ins['title'] = sanitize_text_field($new_ins['title']);
		
		return $new_ins;
		
	}

}

register_widget("Social_Links");

?>