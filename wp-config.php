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
/** The name of the database for WordPress */
define( 'DB_NAME', 'aabot' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '4m(w14dD3Q+^QleO^wZWfcU$_8(EB,h=q&9%8^v]oGj.1xgpzs*}@jH.9vxT9YNg' );
define( 'SECURE_AUTH_KEY',  'Z DiU[ZAc&vA>s@uB%uvC{_SSU9IT `l&V|9B(yOdsQ;7#+.@nBWJ@yyw0aOEJ}B' );
define( 'LOGGED_IN_KEY',    'WCdHpwLRmkR(~o #Y<)5WtmYZtmol$_l7`gBo#* {.04j*v-na;vou0nI!IElcho' );
define( 'NONCE_KEY',        '3w.p)12y-2QD(SsDE/u&Q+aBK!a|{}XXu.4l=lsHy<}lw:bDx@QZJn]fVka@mCC2' );
define( 'AUTH_SALT',        'u+6VOnQ}v<N89c9[E([rNW;:KY^pM^@K@[v2v4@TD?Y1yA~NJ5s]dIoqX}N3ga=<' );
define( 'SECURE_AUTH_SALT', '-J<!JQWbgt}X;KydQq<]$-_gxuw0Q^:g;Hreo YaSu8 `oG7A/nAX1z0_yD.#vQ{' );
define( 'LOGGED_IN_SALT',   'j}K28%|yEbC&11X|6rU|u9D]3L4#if3=CQ+@0]gD2[Hyad!.$@d&R>wEc)y{twt|' );
define( 'NONCE_SALT',       '@lKMDG:+E{Ox+POc!?8$^7SpeH-S3mwuqJTtzItA!;e(,2Gq<&<,6t?/P{OEPY{P' );

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
define( 'WP_DEBUG', true );

define( 'WP_SITEURL', 'http://localhost/aabot-wp' );
define( 'WP_HOME',    'http://localhost/aabot-wp' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
