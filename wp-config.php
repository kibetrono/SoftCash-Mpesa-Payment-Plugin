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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'softcash' );

/** Database username */
define( 'DB_USER', 'kibet' );

/** Database password */
define( 'DB_PASSWORD', 'Kibetrono1996@' );

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
define( 'AUTH_KEY',         'j KUW>8:^Vy{<fNEs`(aWW}O>V8GcjHLhZo_0PF6.[8p1r~m9=]cg%G&={Hnlw7S' );
define( 'SECURE_AUTH_KEY',  '#~pOh0SD!!o$p{q1iVFl9I0EWZ(9Py6L@4[$TjQ/I2xkTndJ*5=1yO.=kYep3;Fm' );
define( 'LOGGED_IN_KEY',    'o?Ch^,,~^T$[DQ#IsR>D}ay,yRJbR/#5LB9hbk7QneEG5Ci{edU6Qswg`C{dXtKj' );
define( 'NONCE_KEY',        'Ski-i4J/#^T*v9FE-Bu%Y&|nWpp}<T(#X&k|RzDnA<ymul)|3OzlxW&mH`MmKGv,' );
define( 'AUTH_SALT',        ':>mKX#sT+Tso L943Cz4de>k4$$*hl$>g&Ht g=aFMtWS{z.dRzGRy3gx_uU.Ogq' );
define( 'SECURE_AUTH_SALT', '%B-z*ZC=>x5`E#zK#Sn?S`emE=0^?82*1Dwx nhh[?BE?fiTn{$+Ycfbmv`P=?!)' );
define( 'LOGGED_IN_SALT',   '1p~532/fj;a]`mlvt{U:<x*fAO_,NrW!p92~SUfe*+iEcws}IR5CNla-D:z(fO$=' );
define( 'NONCE_SALT',       '}[i!u.G~T[[+ak M4o3d:^lt9+uvp!Z)a_yY<BS=HO}xXyq5%D 5{l35w;S8.[BR' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
