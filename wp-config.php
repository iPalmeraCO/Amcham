<?php
define('WP_DEBUG', true);
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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/var/www/html/Amcham/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'amcham' );

/** MySQL database username */
define( 'DB_USER', 'phpmyadmin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'jTBTaWD2yQ' );

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
define( 'AUTH_KEY',         'vJG$=^<N.zs;GzYXQ#t!/VR;=62DG/LdYw7+pMp2z)9_WvZ@y?5l3;M-<F+*u2}x' );
define( 'SECURE_AUTH_KEY',  'mAHlPP4=</68VAmXy>4D&O{AoL!axXgntY@*e 8)!qS=r6;  *nIO&W;e8n*n>cF' );
define( 'LOGGED_IN_KEY',    'hDF)E~t#X^b%@gayt WqXZ<Ru?+2_ax2[3~Ue@I2bykw%Iz0(3W8(`b(90ven/Aw' );
define( 'NONCE_KEY',        '_H1So13uQJP$E56:JPN*<7fzYb!x8Frk*k.WH{KlH+dvb/V3<<u{g3XF/SuFqS4~' );
define( 'AUTH_SALT',        '0Z}am$Q5]:9lGTJ^+n<yBA1?qQ[N`*xsShIHBgqKYZj88 m(nRQ+V=RpE=GF?Bwu' );
define( 'SECURE_AUTH_SALT', 'i4u&b7kL(WvbBABP=B6$Lwk@;,/g~L<{(EK}9b9}1|CQ=Z<$Ise[a5WjfUX%E&$g' );
define( 'LOGGED_IN_SALT',   '^I|CT!0:Pq[Q[iLLq-Kw+C..C]mg#_pXwWkF]U:loyoI98b*5CR|rvM)Qg#34VZl' );
define( 'NONCE_SALT',       'g9U6HO%F8w5sP}oU.2A>ztFj<xIDrq,3KFq8D`|tedN#Ix{J]vm0;hzn)/G}LjW!' );

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
