<form 
	method 	= 'get' 
	id 		= 'searchform' 
	action 	= "<?php esc_url(home_url('/')); ?>">
	
	<input 
		type = 'text' 
		name = 's' 
		class = 'search-field' 
		value = '<?php echo get_search_query(); ?>'
		placeholder = 'Search...' />

	<button type = 'submit'><i class = 'dashicons dashicons-search'></i></button>

</form>