function post_word_count() {


	global $wpdb;

	if(isset($_REQUEST)) {

		$is_email = $_REQUEST['email']; // checks for the request sent

// var_dump($is_email);


			$wpdb->insert( 
		    'wp_ajax_demo', // tabvle you want to add it to
		    array( 
		        'email' => $is_email, // inserts email
		    ), 
		    array( 
		        '%s',  // says what class it is ie string
		    ) 
		);


	}

}





add_action( 'wp_ajax_post_word_count', 'post_word_count' );
add_action( 'wp_ajax_nopriv_post_word_count', 'post_word_count' );
