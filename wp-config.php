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
define( 'DB_NAME', 'loefer' );

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
define( 'AUTH_KEY',         'a{EK^TeS0!8>b9iP1PUY#;;FidJdDS&aq,#ixMz_WQnQkn+?l.Qa=i3iuTt/(T|w' );
define( 'SECURE_AUTH_KEY',  '+H=E|<9uYv/Da$V1E,u592b%3N:>;%RqJt>vlg4lde*J|Zb;HsGjxo5|[J#h6@Bo' );
define( 'LOGGED_IN_KEY',    'yyu#ke3dGm;6Q{$v/5z5~oj=qiCcpsygb[&Ef*7BcbS<9o]0CmbIl#SLlvvq81(Z' );
define( 'NONCE_KEY',        'T|8@v*n]H7;,5q=>d@ws^_%Tzxud$r<ju;<i;yr|Xg-#a{3[4JaC2;jz)~xEke#5' );
define( 'AUTH_SALT',        'L^$;kVA7uc63~X3 %J-a5GkGiNhq_jph<3YTI>l9|IeV7]=$,(9B8. LZ>u+]9Rj' );
define( 'SECURE_AUTH_SALT', 'n<TcQf2W#_<3&m7f]<QYN|kBx6v%^ypD+dM @SRIb{*=~2([BJ)N[Ya_oO6W<6+M' );
define( 'LOGGED_IN_SALT',   '+ixFt;VI>@|bSZ6*~mP?taB:efq%C=@nt]h+lY/*O`O/L]U:%k5q|KbJt!R[NFym' );
define( 'NONCE_SALT',       'pdN,[uAc]Yq[X#%8P4><2B#KXG/)G5i)Ij^2K`efWv4.HY_@LdCOa;I]zO39TALR' );

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
