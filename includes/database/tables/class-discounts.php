<?php
/**
 * Discounts Table.
 *
 * @package     EDD
 * @subpackage  Database\Tables
 * @copyright   Copyright (c) 2018, Easy Digital Downloads, LLC
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       3.0.0
 */
namespace EDD\Database\Tables;

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

if ( class_exists( '\\EDD\\Database\\Tables\\Base' ) ) :
/**
 * Setup the global "edd_discounts" database table
 *
 * @since 3.0
 */
final class Discounts extends Base {

	/**
	 * Table name
	 *
	 * @access protected
	 * @since 3.0
	 * @var string
	 */
	protected $name = 'edd_discounts';

	/**
	 * Database version
	 *
	 * @access protected
	 * @since 3.0
	 * @var int
	 */
	protected $version = 201802280001;

	/**
	 * Setup the database schema
	 *
	 * @access protected
	 * @since 3.0
	 * @return void
	 */
	protected function set_schema() {
		$this->schema = "id bigint(20) unsigned NOT NULL auto_increment,
			parent bigint(20) unsigned NOT NULL default '0',
			name varchar(200) NOT NULL default '',
			code varchar(50) NOT NULL default '',
			status varchar(20) NOT NULL default '',
			type varchar(20) NOT NULL default '',
			scope varchar(20) NOT NULL default 'all',
			amount decimal(18,9) NOT NULL default '0',
			description longtext NOT NULL default '',
			max_uses bigint(20) unsigned NOT NULL default '0',
			use_count bigint(20) unsigned NOT NULL default '0',
			once_per_customer int(1) NOT NULL default '0',
			min_cart_price decimal(18,9) NOT NULL default '0',
			product_condition varchar(20) NOT NULL DEFAULT 'all',
			date_created datetime NOT NULL default '0000-00-00 00:00:00',
			date_modified datetime NOT NULL default '0000-00-00 00:00:00',
			start_date datetime NOT NULL default '0000-00-00 00:00:00',
			end_date datetime NOT NULL default '0000-00-00 00:00:00',
			PRIMARY KEY (id),
			KEY code_status_type_scope (code(50),status(20),type(20),scope(20)),
			KEY date_created (date_created),
			KEY date_start_end (start_date,end_date)";
	}

	/**
	 * Handle schema changes
	 *
	 * @access protected
	 * @since 3.0
	 * @return void
	 */
	protected function upgrade() {

	}
}
endif;