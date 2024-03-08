<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ')HUQ6B|+6&Ho0ajzNy!~^}-5Y{:L5sg>PvA?hHrCw;8`o`#]4&sZ{?Dg/;lz_:F/' );
define( 'SECURE_AUTH_KEY',  'B=cfNQ11b.,46s[wCxwcvilY//C[x(W^=d?50!&aEAT9-<8JSAF4)v.7fnIq<VLc' );
define( 'LOGGED_IN_KEY',    'C$CS#oV;4)a<nQjcLt0qIeZr.|l0$Sd?^4i8VX@Ih|6V(Q7p)Gx_@b=m:w6>dcl6' );
define( 'NONCE_KEY',        'i|S_>u@U`;Y540}qoBMA{ioh>o%3X>&sOz1J:!Bg`}{n7[Frh90j]Sb7`xp94<#r' );
define( 'AUTH_SALT',        'C]9i}UoJ3D-^%)Q>30]B>iA`C+EU)7`:GOBc>(XgFhL;bdgtm)jQ!W?guw]p3Vj.' );
define( 'SECURE_AUTH_SALT', 'R}QG!9m.7 7!Cuh/h#]E[4:]:P$-V44/6h[l_|mJt?2aQ<.1B(!EhS6sVnt#nbeF' );
define( 'LOGGED_IN_SALT',   ';hi/1`)uernU6(lD~$4]7_T9iwMJv9Y_tu8b2u/:JR`,mJb&2kTn&K2[78>cn68G' );
define( 'NONCE_SALT',       '})T4/!JwzGV/>_>L;)bF[uv/4wwFPkc9_nkBG;a)M#BtwDO A!ac8RO%&:57(vLJ' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
