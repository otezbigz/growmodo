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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'estateinDB' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
// define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST', getenv('DB_HOST') ?: '127.0.0.1' );

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
define( 'AUTH_KEY',         ';GZPT{JkvF6QWG84_1a)QphPSV;VT>ySguhYQb5t3nnFK;,J.zEnK>|q[kYPaTxM' );
define( 'SECURE_AUTH_KEY',  'JXrvHc_.GS6@uRIHC)@5ni#+^HM505uc(Yl){:7mwb]KF.5yl/=1Qhcej8o[b*Vi' );
define( 'LOGGED_IN_KEY',    'x4y&Jo.,0e3^]:[m;}sxf#q@&,*@.+ES4]Yx#sS?2Er^%^$Qw?~Z)F{vwbxRkm:P' );
define( 'NONCE_KEY',        '`LN3FYmQFUocP&q9l~4/ixY-tUhb}i@Q-Gl$0i$9=k|?,`Bnri!98MOEK;:#0]HB' );
define( 'AUTH_SALT',        'w9udfI.wukbIp3D%6ibuAUVUuPrb=-vB20@D7k=:sgIL096WsDRw%H&mz#a04e.$' );
define( 'SECURE_AUTH_SALT', '(MPAgd`q,8.E53O{JD1GL7I;#0!/zQ78:3PYvK~dD 9<6:9%TbH<V(g&EB 5i~4&' );
define( 'LOGGED_IN_SALT',   '~o/IA9G,h)5rHrhj:ZSM9OcpEg^iAyVp}^{r{Ok^$9_tCmo$yE=#ezv0:e}R=~Sh' );
define( 'NONCE_SALT',       '`od7a9l|ld09d_IUIxQoq9(&bb~A=xZ(#2C42NkkQ1 tU [saf+Yo+wH+VZx>o(~' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
