<?php
// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	define( 'WP_LOCAL_DEV', true );
	include( dirname( __FILE__ ) . '/local-config.php' );
} else {
	define( 'WP_LOCAL_DEV', false );
	define( 'DB_NAME', 'ohjann' );
	define( 'DB_USER', 'ohjann' );
	define( 'DB_PASSWORD', 'bessie8char' );
	define( 'DB_HOST', 'ohjann.ck2ujq1oigry.eu-west-1.rds.amazonaws.com' ); // Probably 'localhost'
}

    /** Database Charset to use in creating database tables. */
    define('DB_CHARSET', 'utf8');

    /** The Database Collate type. Don't change this if in doubt. */
    define('DB_COLLATE', '');

    define('FTP_USER', 'ohjann');
    define('FTP_PASS','bessie1991');
    define('FTP_HOST','localhost');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'pZxmmXHMy]om00{)]j7_26r9v=?,b0ezK`!kz _N%:zzie$n{b+rO-oudQPn0=+q');
define('SECURE_AUTH_KEY',  ',bYHpUHpCUS30WckXoI}F2Hi7aR+I6eKi}(#0OS*/NzAs0p4^q(vp6wxK[~RjJn@');
define('LOGGED_IN_KEY',    'v`Jd`pN}(-qw%L~yS{XqUc!hIp[k]-#nfz$QCbgnP]30%1&]$ItQb8=.G.7o0<]2');
define('NONCE_KEY',        'qYs0b1+Aa.a#|v)7|z520mc/,>h=^?>;fmu!)C,l>Td_+c ZX/AbUmT[}#lviSxR');
define('AUTH_SALT',        'NRO7cPG9ix{tEp|1kY>&ER@TvkmAOg)~Wh&-[plsQm,6{yaJ1M4PE6yrd1<v/KqD');
define('SECURE_AUTH_SALT', 'vsup^Zua>N:S. H}^:-lFg*{2i&ZfqORcv65 6#<<0`VAhZQ|Ygk<5LKw&5Sb0jL');
define('LOGGED_IN_SALT',   'FCyTY=Oaz@GB^z:^%g3U5*8,GpzLS10%o-W~-31oVc<u2+.iyjF}aH>$Nt]iQ;Y-');
define('NONCE_SALT',       'Y%7Qg]S%fkq`;rsX%:Hs&ql)d+]b^qHM<T)gw{e~xS`@?$cvXG{#731?oCHh0:Xt');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

define('RELOCATE',true);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
