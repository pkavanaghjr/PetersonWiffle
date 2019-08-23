<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
if(!$_SERVER || ! $_SERVER['SERVER_NAME']){
    define('SERVER_NAME', 'https://esteem-pwa.local:8890');
}
else{
    define('SERVER_NAME', $_SERVER['SERVER_NAME']);
}

switch(SERVER_NAME):
	case 'wiffle.patkavanaghjr.com':
	default:
		define( 'WP_SITEURL', 'http://wiffle.patkavanaghjr.com/' );
		define( 'WP_HOME', 'http://wiffle.patkavanaghjr.com/' );

		define( 'DB_NAME', 'patkavan_wiffle' );

		/** MySQL database username */
		define( 'DB_USER', 'patkavan_wiffle' );

		/** MySQL database password */
		define( 'DB_PASSWORD', '(gLcuNUsA#w4' );

		/** MySQL hostname */
		define( 'DB_HOST', 'localhost' );
	break;

	case 'tourneys.local':
		define( 'WP_SITEURL', 'http://tourneys.local:8888' );
		define( 'WP_HOME', 'http://tourneys.local:8888' );

		/** The name of the database for WordPress */
		define( 'DB_NAME', 'pkj_tourney' );

		/** MySQL database username */
		define( 'DB_USER', 'root' );

		/** MySQL database password */
		define( 'DB_PASSWORD', 'root' );

		/** MySQL hostname */
		define( 'DB_HOST', 'localhost' );
	break;

endswitch;

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '+Z!S.e8_rTA2f(D:@/0o[{5N[fd-6pSH3|]*,@)2>/CqMgH_L^i?/;=`HxTB5}uf' );
define( 'SECURE_AUTH_KEY',  '<R#o.rDOkqk164NYaN?e+qd XI`}*91c_;@MwTEO-G&-n:U7z;izDn_18+$?9Z?v' );
define( 'LOGGED_IN_KEY',    '?l_^Mp@d]?MG!5?e0K@dlgH?O6(`$H%xCunsNOWMKTr2FX,c`vSBd<VH7~5tnxA:' );
define( 'NONCE_KEY',        '%DwRU+J=Wf<+mL><LJ&cr~b@~?ybc%-@tRy.j2k=7Zl^W8j~h1Ql1`+a*V0/tWPB' );
define( 'AUTH_SALT',        'wgIlIy|] )5@$lPFy$zm)Wl`=%|}3Sr4DQqDF|4gy5T%j[1ImPPJ_v*K)_.xW]|w' );
define( 'SECURE_AUTH_SALT', 'bVy=l}Z-(DgwP!lCDj:6C$*We~?kA7~#^:>{46I{NI=RsD0[|dZ&&aVI_G(%Y**U' );
define( 'LOGGED_IN_SALT',   'h9Bd|T18RxeRn%A`QL8PzWFRqv&Hs8d$0b^Px!;d=,O,PvrIs]_]Mle6}N-f*W5$' );
define( 'NONCE_SALT',       'ykI>z`G/;K76PeGDqgdlVFZEb%7yD.m[1&F3REiV3PyXK+.$:.*gNoUOV_m|Iq2>' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
