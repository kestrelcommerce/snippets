<?php // Only copy this line if needed!

/**
 * CheckoutWC - Remove the address line 2 field
 *
 * Removes address line 2 ("Apartment, suite, unit, etc.") from the billing and
 * shipping addresses. It does the same thing as setting WooCommerce's own
 * Address line 2 field option to Hidden, so the field also disappears from the
 * address forms in My Account.
 *
 * On CheckoutWC 11.4.0 or later you don't need code for this: go to
 * CheckoutWC > Checkout Editor > Addresses, set Address 2 Field to Hidden and
 * click Save Changes. Use this snippet on older versions, or when you want the
 * field removed regardless of that setting.
 *
 * Written against CheckoutWC 11.4.0. Requires PHP 7.4 or later.
 *
 * @see https://www.checkoutwc.com/documentation/how-to-remove-address-line-2/
 */
add_filter( 'woocommerce_default_address_fields', function ( $fields ) {
	unset( $fields['address_2'] );

	return $fields;
} );
