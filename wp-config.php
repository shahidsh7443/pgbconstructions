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
define('DB_NAME', 'pgbconstructions');

/** MySQL database username */
define('DB_USER', 'razorbee');

/** MySQL database password */
define('DB_PASSWORD', 'razorbee123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '}QjU,&0BU~>0~/>0z]EoYncr@uetmz6)~P6qnY|at}ol+1!i B$UKH?)TD7*5K*~');
define('SECURE_AUTH_KEY',  'AUl[:7->i1~uS Yr4R3vncnofRE5oqtb1;xwdH=6L]U^:[4-m]>NGZ8R73^g}iG<');
define('LOGGED_IN_KEY',    'J+|;@GCL59!l,4m:i%NzWkFpS):92`e{610FOYcWv86kZz,Zt_deYjk3kof3A}[B');
define('NONCE_KEY',        'KdD!i_DX:Z%U#<xeJKj-*jvX~-3n jNcyKRI~]tmO+8E0a B>~j5pw65Fc$]3XO8');
define('AUTH_SALT',        '!,D 5E2b4Uz}_O48%ejy&nL>YF~Ux_P7,0[SY)Gf|ty IHB?-T,Y)Lbf,k.r8dI}');
define('SECURE_AUTH_SALT', '5X7]%c6l+UsSe-s.=E,Yb)4F?Rv`xKz4Ma5?n>|eP4lPHV5=I-^.gAgxIgaujBeT');
define('LOGGED_IN_SALT',   '=Nx-ZypMs!)D];cGE,~z*cq{^O?j,*GQp*[Vp.S6</HC:`C,SU!Ys:ue*wr,Lj]<');
define('NONCE_SALT',       '|L!jZ5)/uazM3y*~4Zx(mFaRvY6:K<F-gJXdN8h<kx.b=XE=yC<JW0{L8xl-/34L');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
