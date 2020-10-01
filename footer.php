		<footer class = 'lower-nav'>
		
			<section id = 'footer-widgets'>
			
				<?php 

					for($i = 1;$i <= 3;$i++):
						if(is_active_sidebar( "footer-" . $i )): ?>
						
							<div><?php dynamic_sidebar("footer-" . $i); ?></div>
						
						<?php 
						
						endif;
					
					endfor;

				?>
			
			</section>
			
			<section>
			
				All Rights Reserved <?php echo Date("Y"); ?>
			
			</section>
		
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>