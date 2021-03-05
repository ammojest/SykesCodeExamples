// Get an instance of the WC_Order Object from the Order ID (if required)
$order = wc_get_order( $order_id );

// Get the Customer ID (User ID)
$customer_id = $order->get_customer_id(); // Or $order->get_user_id();

// Get the WP_User Object instance
$user = $order->get_user();

// Get the WP_User roles and capabilities
$user_roles = $user->roles;

// Get the Customer billing email
$billing_email  = $order->get_billing_email();

// Get the Customer billing phone
$billing_phone  = $order->get_billing_phone();

// Customer billing information details
$billing_first_name = $order->get_billing_first_name();
$billing_last_name  = $order->get_billing_last_name();
$billing_company    = $order->get_billing_company();
$billing_address_1  = $order->get_billing_address_1();
$billing_address_2  = $order->get_billing_address_2();
$billing_city       = $order->get_billing_city();
$billing_state      = $order->get_billing_state();
$billing_postcode   = $order->get_billing_postcode();
$billing_country    = $order->get_billing_country();

// Customer shipping information details
$shipping_first_name = $order->get_shipping_first_name();
$shipping_last_name  = $order->get_shipping_last_name();
$shipping_company    = $order->get_shipping_company();
$shipping_address_1  = $order->get_shipping_address_1();
$shipping_address_2  = $order->get_shipping_address_2();
$shipping_city       = $order->get_shipping_city();
$shipping_state      = $order->get_shipping_state();
$shipping_postcode   = $order->get_shipping_postcode();
$shipping_country    = $order->get_shipping_country();
