<?php
/**
 * Checkout.
 *
 * @since 6.2.0
 */

return apply_filters(
	'checkout_settings',
	array(
		'title'  => __( 'Checkout', 'wp-travel-engine' ),
		'order'  => 20,
		'id'     => 'checkout_settings',
		'fields' => array(
			array(
				'label'       => __( 'Show Travellers Information', 'wp-travel-engine' ),
				'description' => __( 'If checked, information of all the travellers will be compulsory. After checkout, information of each of the travellers will be asked to fill up.', 'wp-travel-engine' ),
				'field_type'  => 'SWITCH',
				'name'        => 'enable_travellers_info',
				'divider'     => true,
			),
			array(
				'label'       => __( 'Show Emergency Contact Details', 'wp-travel-engine' ),
				'description' => __( 'If unchecked, Emergency Contact Details of the travellers will be disabled from the Travellers Information Form.', 'wp-travel-engine' ),
				'field_type'  => 'SWITCH',
				'name'        => 'enable_emergency_contact',
				'divider'     => true,
			),
			array(
				'label'       => __( 'Booking Confirmation Message', 'wp-travel-engine' ),
				'description' => '',
				'field_type'  => 'TEXTAREA',
				'default'     => 'Thank you for booking the trip. Please check your email for confirmation. Below is your booking detail:',
				'name'        => 'booking_confirmation_msg',
				'divider'     => true,
			),
			array(
				'label'       => __( 'GDPR Message', 'wp-travel-engine' ),
				'description' => '',
				'field_type'  => 'TEXTAREA',
				'default'     => 'By contacting us, you agree to our ',
				'name'        => 'gdpr_msg',
			),
		),
	)
);
