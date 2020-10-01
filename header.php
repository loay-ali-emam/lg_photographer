<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title>Title Here</title>
		<meta charset = '<?php bloginfo('charset'); ?>' />
		<meta name = 'viewport' content = 'width=device-width,initial-scale=1.0' />
		<?php wp_head(); ?>
	</head>
	<body>
		<header id = 'uppernav'>

			<p id = 'site-id' onclick = 'window.location.href = "<?php echo bloginfo('url'); ?>"'>
			
			<?php 
			
			$logo = get_theme_mod("header-logo");
			
			if(get_theme_mod("header-logo-display")): ?>
			
				<img src = '<?php echo wp_get_attachment_image_src($logo)[0]; ?>' id = 'site-logo' alt = 'Site Logo'/>
			
			<?php endif; ?>
			
			<span id = 'site-name'>Somebody</span>
			
			
			</p>
	
			<button id = 'menu-toggle' onclick = "menu_toggle('#uppermenu',this)"><i class = "dashicons dashicons-menu-alt3"></i></button>
		
			<ul id = 'uppermenu' style = 'left:100%;'>
			
				<?php
				
					//Primary Menu Here.
					wp_nav_menu(array(
					
						"menu" => "Primary",
						"menu_class" => "menu"
					
					));
					
					//Social Media Links Here.
					wp_nav_menu(array(
					
						"menu" => "Social Media",
						"menu_class" => "menu",
						"menu_id" => "social-links",
						"container_id" => "down"
					
					));
				
				?>
			
			</ul>
		
		</header>