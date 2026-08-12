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
define( 'AUTH_KEY',         'ixh*pO!_xT5HavIQOW>;?N+dus(3q6Bth_h!i1wb*DmuH#hLbHq]wsuWa|z~xipM' );
define( 'SECURE_AUTH_KEY',  '@QX;!lhi3RyUX;d>C[!$qRT8H ##6ll[*#{DQXTT3PzC1lmBnT ~0GXl*-jr01R~' );
define( 'LOGGED_IN_KEY',    'Z>WfhGu<e}DPI$Z|9![F;bIUY2OXFR75ISbc#a2S1wtM@T|>t=hJ?8No=o^80Dof' );
define( 'NONCE_KEY',        'KXM(Pd7!2BxNg!FCJRL%RH:=OPR..s>IkW7K&RKJ f 30ii}:$v;|_c!Z^q$9&I:' );
define( 'AUTH_SALT',        'l:f>~CD!>L$FVAf0J$_Kb3t%|8Um.[t`=gE53us(s@VY$G81n-,x[h*z]gQV)L(/' );
define( 'SECURE_AUTH_SALT', 'n#NEBgUJ e~D)&ruL6W+;9F9/6X!EI8]iVT+I]@o~$V]ogJq#?$+oz4y;e>((0G1' );
define( 'LOGGED_IN_SALT',   'E#V~Q(#O|-r{gbB10[4k~fNax1|}d3^jw*T-h/u]NjuGwue</1H/EbnLMu(Ssixt' );
define( 'NONCE_SALT',       '86`_<=H)SL)$f 8f)F[Ik&gj#e+*1CKY)nw}UmsQw94Neh|za#!z>KIYPDYTjM?F' );

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
