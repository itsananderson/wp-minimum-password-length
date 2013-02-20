<?php 
/*
 * Plugin Name: Minimum Password Length
 * Description: Enforce a minimum password length.
 * Plugin URI: http://www.itsananderson.com/plugins/minimum-password-length
 * Plugin Author: Will Anderson
 * Author URI: http://www.itsananderson.com/
 * Version: 1.0
 */

class WP_Minimum_Password_Length {

	public static function start() {
		add_action( 'user_profile_update_errors', array( __CLASS__, 'minimum_password_limit' ) );
	}

	public static function minimum_password_limit( &$errors ) {
		// Edit this value to change the minimum password length.
		// Set value to zero or disable plugin to remove length requirement.
		$min_length = 7;
		if ( !empty( $_POST['pass1'] ) && $_POST['pass1'] === $_POST['pass2'] && strlen( $_POST['pass1'] ) < $min_length ) {
			$errors->add( 'min_pass_length', sprintf( __( '<strong>ERROR</strong>: Password must be at least %d characters long.' ), $min_length ), array( 'form-field' => 'pass1' ) );
		}
	}

}

WP_Minimum_Password_Length::start();