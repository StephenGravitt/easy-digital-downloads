<?php
/**
 * Contextual Help
 *
 * @package     EDD
 * @subpackage  Admin/Settings
 * @copyright   Copyright (c) 2018, Easy Digital Downloads, LLC
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.4
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Settings contextual help.
 *
 * @access      private
 * @since       1.4
 * @return      void
 */
function edd_settings_contextual_help() {
	$screen = get_current_screen();

	if ( 'download_page_edd-settings' !== $screen->id ) {
		return;
	}

	$screen->set_help_sidebar(
		'<p><strong>' . __( 'For more information:', 'easy-digital-downloads' ) . '</strong></p>' .
		'<p>' . sprintf( __( 'Visit the <a href="%s">documentation</a> on the Easy Digital Downloads website.', 'easy-digital-downloads' ), esc_url( 'http://docs.easydigitaldownloads.com/' ) ) . '</p>' .
		'<p>' . sprintf(
			__( 'Need more from your Easy Digital Downloads store? <a href="%s">Upgrade Now!</a>.', 'easy-digital-downloads' ),
			esc_url( 'https://easydigitaldownloads.com/pricing/?utm_source=plugin-settings-page&utm_medium=contextual-help-sidebar&utm_term=pricing&utm_campaign=ContextualHelp' )
		) . '</p>'
	);

	$screen->add_help_tab( array(
		'id'      => 'edd-settings-general',
		'title'   => __( 'General', 'easy-digital-downloads' ),
		'content' => '<p>' . __( 'This screen provides the most basic settings for configuring your store. You can set the currency, page templates, and general store settings.', 'easy-digital-downloads' ) . '</p>',
	) );

	$screen->add_help_tab( array(
		'id'      => 'edd-settings-payment-gateways',
		'title'   => __( 'Payments', 'easy-digital-downloads' ),
		'content' =>
			'<p>' . __( 'This screen provides ways to enable Test Mode, toggle payment gateways on or off, manage accounting settings, and configure gateway-specific settings. Any extra payment gateway extensions you have installed will appear on this page, and can be configured to suit your needs.', 'easy-digital-downloads' ) . '</p>' .
			'<p>' . __( '<strong>Test Payment</strong> - This included gateway is great for testing your store, as it requires no payment, and leads straight to product downloads. However, please remember to turn it off once your site is live!', 'easy-digital-downloads' ) . '</p>' .
			'<p>' . __( '<strong>PayPal</strong> - A PayPal payment gateway is included as standard with Easy Digital Downloads. To test the PayPal gateway, you need a Sandbox account for PayPal and the site must be placed in Test Mode from the Payments > Gateways tab. Please remember to enter your PayPal account email address in order for payments to get processed.', 'easy-digital-downloads' ) . '</p>' .
			'<p>' . __( '<strong>Stripe</strong> - The Stripe payment gateway is also included with Easy Digital Downloads. To test the Stripe gateway, you must "Connect with Stripe" and the site must be placed in Test Mode from the Payments > Gateways tab.', 'easy-digital-downloads' ) . '</p>',
	) );

	$screen->add_help_tab( array(
		'id'	    => 'edd-settings-emails',
		'title'	    => __( 'Emails', 'easy-digital-downloads' ),
		'content'	=>
			'<p>' . __( "This screen allows you to customize how emails act throughout your store. You can choose a premade template, set the sender's name, email address, and subject.", 'easy-digital-downloads' ) . '</p>' .
			'<p>' . __( 'A set of email tag markers has also been provided to allow the creation of personalized emails. A tag consists of a keyword surrounded by curly braces: <code>{tag}</code>.', 'easy-digital-downloads' ) . '</p>'
	) );

	$screen->add_help_tab( array(
		'id'      => 'edd-settings-marketing',
		'title'   => __( 'Marketing', 'easy-digital-downloads' ),
		'content' =>
			'<p>' . __( 'Marketing settings will help you connect with your customers.', 'easy-digital-downloads' ) . '</p>' .
			'<p>' . __( 'Marketing specific extensions will add their settings here as well.', 'easy-digital-downloads' ) . '</p>',
	) );

	$screen->add_help_tab( array(
		'id'	    => 'edd-settings-styles',
		'title'	    => __( 'Styles', 'easy-digital-downloads' ),
		'content'	=> '<p>' . __( "This screen allows customization of your store's styles. For complete control, you can completely disable all styles generated by the plugin.", 'easy-digital-downloads' ) . '</p>'
	) );

	$screen->add_help_tab( array(
		'id'	    => 'edd-settings-taxes',
		'title'	    => __( 'Taxes', 'easy-digital-downloads' ),
		'content'	=>
			'<p>' . __( 'This screen allows you to configure the tax rules for your store.', 'easy-digital-downloads' ) . '</p>' .
			'<p>' . __( 'If you do not wish to charge any tax on purchase, simply leave the Enable Taxes option unchecked.', 'easy-digital-downloads' ) . '</p>' .
			'<p>' . __( '<strong>Default Tax Rate</strong>: The default tax rate is the tax rate charged to customers located in your base country / state or province.', 'easy-digital-downloads' ) . '</p>' .
			'<p>' . __( '<strong>Base Country</strong>: This determines the country that is loaded by default on the checkout screen for customers that do not have an address stored in their account.', 'easy-digital-downloads' ) . '</p>' .
			'<p>' . __( '<strong>Base State / Province</strong>: This determines the region that is loaded by default on the checkout screen for customers that do not have an address stored in their account.', 'easy-digital-downloads' ) . '</p>' .
			'<p>' . __( '<strong>Prices Entered with Tax</strong>: if enabled, this means that the price entered on the product edit screens is the total amount the customer will pay after taxes. For example, if enabled and the price of a product is $20, the customer will pay 20$ at checkout. The exact amount charged in tax will be calculated automatically.', 'easy-digital-downloads' ) . '</p>' .
			'<p>' . __( '<strong>Display Tax Rate on Prices</strong>: when enabled, the amount the customer is expected to pay in tax will be displayed below purchase buttons.', 'easy-digital-downloads' ) . '</p>' .
			'<p>' . __( '<strong>Display During Checkout</strong>: This determines whether prices are shown with taxes or without taxes on checkout. If set to Including Tax, a $10 product with a 10% tax will be shown as $11.', 'easy-digital-downloads' ) . '</p>' .
			'<p>' . __( '<strong>Calculate Tax After Discounts</strong>: If enabled, this option will make it so that tax is calculated on the after-discount amount. If a purchase of $20 is made and a 20% discount is applied, tax will be calculated off of $16 instead of $20.', 'easy-digital-downloads' ) . '</p>' .
			'<p>' . __( '<strong>Additional Tax Rates</strong>: This section lets you add tax rates for specific countries and/or states/provinces in those countries.', 'easy-digital-downloads' ) . '</p>'
	) );

	$screen->add_help_tab( array(
		'id'		=> 'edd-settings-privacy',
		'title'		=> __( 'Privacy', 'easy-digital-downloads' ),
		'content'	=>
			'<p>' . __( 'This screen provides access to customer privacy policies, terms & agreements, and how to display them on the front of your site.', 'easy-digital-downloads' ) . '</p>' .
			'<p>' . __( 'You may also override what happens to order records when a customer exercises their right to be forgotten from your site.',        'easy-digital-downloads' ) . '</p>'
	) );

	$screen->add_help_tab( array(
		'id'		=> 'edd-settings-extensions',
		'title'		=> __( 'Extensions', 'easy-digital-downloads' ),
		'content'	=> '<p>' . __( 'This screen provides access to settings added by most Easy Digital Downloads extensions.', 'easy-digital-downloads' ) . '</p>'
	) );

	$screen->add_help_tab( array(
		'id'      => 'edd-settings-misc',
		'title'   => __( 'Miscellaneous', 'easy-digital-downloads' ),
		'content' =>
			'<p>' . __( 'This screen provides other miscellaneous options such as configuring your store buttons, file download functionality, and terms of service.', 'easy-digital-downloads' ) . '</p>',
	) );

	do_action( 'edd_settings_contextual_help', $screen );
}
add_action( 'load-download_page_edd-settings', 'edd_settings_contextual_help' );
