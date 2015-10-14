<?php

function auth_process_plain_password( $p_password, $p_salt = null, $p_method = null ) {
	$t_login_method = 'MD5';
	// $t_login_method = config_get( 'login_method' );
	if( $p_method !== null ) {
		$t_login_method = $p_method;
	}

	switch( $t_login_method ) {
		case CRYPT:

			# a null salt is the same as no salt, which causes a salt to be generated
			# otherwise, use the salt given
			$t_processed_password = crypt( $p_password, $p_salt );
			break;
		case 'MD5':
			$t_processed_password = md5( $p_password );
			break;
		case BASIC_AUTH:
		case PLAIN:
		default:
			$t_processed_password = $p_password;
			break;
	}

	# cut this off to DB_FIELD_SIZE_PASSWORD characters which the largest possible string in the database
	return utf8_substr( $t_processed_password, 0, DB_FIELD_SIZE_PASSWORD );
}

/* function auth_process_plain_password( $p_password, $p_salt = null, $p_method = null ) {
	$t_login_method = 'MD5';
	// $t_login_method = config_get( 'login_method' );
	if( $p_method !== null ) {
		$t_login_method = $p_method;
	}

	switch( $t_login_method ) {
		case CRYPT:

			# a null salt is the same as no salt, which causes a salt to be generated
			# otherwise, use the salt given
			$t_processed_password = crypt( $p_password, $p_salt );
			break;
		case MD5:
			$t_processed_password = md5( $p_password );
			break;
		case BASIC_AUTH:
		case PLAIN:
		default:
			$t_processed_password = $p_password;
			break;
	}

	# cut this off to DB_FIELD_SIZE_PASSWORD characters which the largest possible string in the database
	return utf8_substr( $t_processed_password, 0, DB_FIELD_SIZE_PASSWORD );
} */
