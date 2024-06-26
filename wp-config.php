<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'midas_db' );

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
define( 'AUTH_KEY',         'Q2:LY6V2UhQkzPq(@!Ut$H%SvD<=A-]zjkj/S>[kP91s:wuQ>5vLDw@679A(4`[i' );
define( 'SECURE_AUTH_KEY',  '=u[>UZj6!fwa5mEJX.uQDa_</lggDP6k4]^}Ohs~ZB}2+CWs,3nBJToRN4~ Y&F4' );
define( 'LOGGED_IN_KEY',    '5SnLo[*H1w{u*h,D)6>a0LYY{GNGM!v#smCUFY,@9_1mK&nin8&yu3u_#ZWDJc8u' );
define( 'NONCE_KEY',        '@[El{gWp=y/*rjj755E^m(,xM?|W<;/~_^u$rH_?OgqIvMP3k)nt&XBx,eX?[=L3' );
define( 'AUTH_SALT',        '^ZwJ)urt,Gx*ky+>>ixhE!/bB:5s~VRD|C9QKGJW{L2Sf|kiv3@b. dwShU`?9-H' );
define( 'SECURE_AUTH_SALT', 'k7@!)^PGhHz}C&W9<}~qJ0~edSl+mS+[5zAPTHj-Ocr/Tv;wJD>:H<i3abLln6Ex' );
define( 'LOGGED_IN_SALT',   '{(K6|,}x|*]%Q7tH.33LjgsrZEi:Hm&()l&{W%lUY*G/lMe*Dza720E))lD.M]le' );
define( 'NONCE_SALT',       'Jy.{5++Q]Dv#gG,mLmp$;dw.X39nqbFu4<kOd/@Bt*Hu#N7J[PnngWfa+>doe(.o' );

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
