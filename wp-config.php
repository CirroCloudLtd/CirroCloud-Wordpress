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
define( 'DB_NAME', 'ccs' );

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
define( 'AUTH_KEY',         ':6c[kZ(k7S-~F47OC1q~e79XBFRLF>%YI}WXN&-YGKSKqp+eD,,TGc9lK>n$79.^' );
define( 'SECURE_AUTH_KEY',  '&GNeR;u2X0r-cfb<&bI9`:<]^Cj!G4{W(]2w0~F<#Nx%]l1h 29dEw&)K&RQwy]$' );
define( 'LOGGED_IN_KEY',    '|[EFwKa}i|xC^L%tgJ$}<|_g5_G2_LhoWeI)RITK(sojY$(x[i0P{I1F.b!2_I=g' );
define( 'NONCE_KEY',        'W?wPsk,tsDYA?Gh`P{+1BE<CEL^t6a>AfSl^6yh?eK;l~Bj^7</z8^f(NK+0[hL9' );
define( 'AUTH_SALT',        '{.a.UGh([}IH$|#SrJ&7lPb _dJ^(=Cer;j59XrH.KuhGqkoavCR-y9+OVWEZ8Ew' );
define( 'SECURE_AUTH_SALT', '@m Ia*~z&.[ouKf5~ xe&tS5P>Uw#:Os[<VtD,kDBT $y*_T%n[id:.k#tMY#1,f' );
define( 'LOGGED_IN_SALT',   '(Ud+ht&4iw:JG~dFF+3^]h8NTJ;pKCDMx)Ee;/_])*eY}8.`F#AP4 lGC29#VU1>' );
define( 'NONCE_SALT',       'Z#u!%]B~x.,m9!fVH/u=rrxmtM]w@oAYgN^f~^>/E%<sNZOR=,!HQ@>/mT5ev#jW' );

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
