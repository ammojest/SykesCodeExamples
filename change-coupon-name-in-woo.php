/**********************************************************************************************************
											Change Coupon text
 **********************************************************************************************************/

//This changes the text on the basket page
add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_cart', 10, 3 );
add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_cart', 10, 3 );
add_filter('woocommerce_coupon_error', 'rename_coupon_label', 10, 3);
add_filter('woocommerce_coupon_message', 'rename_coupon_label', 10, 3);
add_filter('woocommerce_cart_totals_coupon_label', 'rename_coupon_label',10, 1);
add_filter( 'woocommerce_checkout_coupon_message', 'woocommerce_rename_coupon_message_on_checkout' );


function woocommerce_rename_coupon_field_on_cart( $translated_text, $text, $text_domain ) {
	// bail if not modifying frontend woocommerce text
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}
	if ( 'Coupon:' === $text ) {
		$translated_text = 'Offer Code:';
	}

	if ('Coupon has been removed.' === $text){
		$translated_text = 'Offer code has been removed.';
	}

	if ( 'Apply coupon' === $text ) {
		$translated_text = 'Apply Coupon or Gift Card';
	}

	if ( 'Coupon code' === $text ) {
		$translated_text = 'Offer Code';
	
	} 

	return $translated_text;
}


// This changes the text at the check out 
add_filter( 'woocommerce_checkout_coupon_message', 'ammojest_coupon_code_text_rename');
 
function ammojest_coupon_code_text_rename() {
return '<i class="fa fa-ticket" aria-hidden="true"></i> Have a Coupon or a Gift Card? <a href="#" class="showcoupon">Click here to enter your code</a>';
}
