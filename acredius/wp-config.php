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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'acrediusDB' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'CtB%e!ujIBBxV>?Gb!62^Oq;O4@p];J[z*mtb)j#;HzLaKs1Q2^^F5^oRz4w3<6u' );
define( 'SECURE_AUTH_KEY',  'A@81INZ+BijEQA}axTR/7H]Lt5Zx~&c*U2qtir`!LD|GbGQV6F.6;!tYO3VPxY>A' );
define( 'LOGGED_IN_KEY',    '~bBWJNv4pG<8=p~k{^d%`i(|W;krohlq|B9GZHoeR|Uv=~t{hJ&p;h%X<dhpt4Fc' );
define( 'NONCE_KEY',        '3JOy6N5G%#RhAJjxY-cv(RA^yRK1NK&g+&i#z)k_B1cPKS56N4k/o^f0q>Tdo9k%' );
define( 'AUTH_SALT',        '#&?Wk}@IW6<)P4[E9*eWyz~!<ggB=%b; K(V&|F=^1MgzQ=cng`R[<EY2?m(oF+,' );
define( 'SECURE_AUTH_SALT', 'AiZ{[0B,?-GoF|7pBr:o:R}_[qy8LZ* @QSe=psO$7Di^ZD%J1j75-wV)z*M;!7f' );
define( 'LOGGED_IN_SALT',   'nmSxv=a^F{>Cg}=-<d<[~;.Ug-~&ebgp Y_wkZ@IW=Vy9-30-/0.|Xx1Ll#tXvk*' );
define( 'NONCE_SALT',       ',`<vH4@5lfnOBft7:&t}<~X+ih#5>V@,kM%P5lnU6:o~auf8*C0do+6)wBdvFC_d' );

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
