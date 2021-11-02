<?php
/**
 * Recurring Payments
 *
 * Manages automatic installation/activation for Recurring Payments.
 *
 * @package     EDD
 * @subpackage  WP_SMTP
 * @copyright   Copyright (c) 2021, Easy Digital Downloads
 * @license     https://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       2.11.x
 */
namespace EDD\Admin\Settings;

class Recurring extends Extension {

	/**
	 * The product ID on the EDD site.
	 *
	 * @var integer
	 */
	protected $item_id = 28530;

	/**
	 * The pass level required to automatically download this extension.
	 */
	const PASS_LEVEL = \EDD\Admin\Pass_Manager::EXTENDED_PASS_ID;

	public function __construct() {
		add_filter( 'edd_settings_sections_gateways', array( $this, 'add_recurring_section' ) );
		add_filter( 'edd_settings_gateways', array( $this, 'setting' ) );
		add_action( 'edd_recurring_install', array( $this, 'settings_field' ) );

		parent::__construct();
	}

	/**
	 * Gets the configuration for Recurring.
	 *
	 * @return array
	 */
	protected function get_configuration() {
		return array(
			'pro_plugin'   => 'edd-recurring/edd-recurring.php',
			'settings_url' => add_query_arg(
				array(
					'post_type' => 'download',
					'page'      => 'edd-settings',
					'tab'       => 'gateways',
					'section'   => 'recurring',
				),
				admin_url( 'edit.php' )
			),
			'upgrade_url'  => 'https://easydigitaldownloads.com/pricing',
			'name'         => __( 'Recurring Payments', 'easy-digital-downloads' ),
		);
	}

	public function add_recurring_section( $sections ) {
		if ( $this->is_activated() ) {
			return $sections;
		}

		$sections['recurring'] = $this->config['name'];

		return $sections;
	}

	public function setting( $settings ) {
		if ( $this->is_activated() ) {
			return $settings;
		}
		$settings['recurring']['recurring'] = array(
			'id'   => 'recurring_install',
			'name' => __( 'Get Recurring Payments', 'easy-digital-downloads' ),
			'desc' => '',
			'type' => 'hook',
		);

		return $settings;
	}

	/**
	 * Whether EDD Recurring active or not.
	 *
	 * @since 2.11.x
	 *
	 * @return bool True if Recurring is active.
	 */
	protected function is_activated() {
		return class_exists( 'EDD_Recurring' ) && is_plugin_active( $this->config['pro_plugin'] );
	}
}

new Recurring();
