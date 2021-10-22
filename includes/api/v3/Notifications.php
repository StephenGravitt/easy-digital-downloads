<?php
/**
 * Notifications.php
 *
 * @package   easy-digital-downloads
 * @copyright Copyright (c) 2021, Easy Digital Downloads
 * @license   GPL2+
 */

namespace EDD\API\v3;

class Notifications extends Endpoint {

	/**
	 * Registers the endpoints.
	 */
	public function register() {
		register_rest_route(
			self::$namespace,
			'notifications/(?P<id>\d+)',
			array(
				'args' => array(
					'id' => array(
						'description'       => __( 'ID of the notification.', 'easy-digital-downloads' ),
						'type'              => 'integer',
						'required'          => true,
						'validate_callback' => function ( $param, $request, $key ) {
							$notification = EDD()->notifications->get( intval( $param ) );

							return ! empty( $notification );
						},
						'sanitize_callback' => function ( $param, $request, $key ) {
							return intval( $param );
						}
					)
				),
				array(
					'methods'             => \WP_REST_Server::DELETABLE,
					'callback'            => array( $this, 'dismissNotification' ),
					'permission_callback' => array( $this, 'canViewNotification' ),
				)
			)
		);
	}

	/**
	 * Whether the current user can view (and dismiss) notifications.
	 *
	 * @return bool
	 */
	public function canViewNotification() {
		return current_user_can( 'manage_shop_settings' );
	}

	/**
	 * Dismisses a single notification.
	 *
	 * @param \WP_REST_Request $request
	 *
	 * @return \WP_REST_Response
	 */
	public function dismissNotification( \WP_REST_Request $request ) {
		$result = EDD()->notifications->update(
			$request->get_param( 'id' ),
			array( 'dismissed' => 1 )
		);

		if ( ! $result ) {
			return new \WP_REST_Response( array(), 500 );
		}

		return new \WP_REST_Response( array(), 200 );
	}
}
