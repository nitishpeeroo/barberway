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
define('DB_NAME', 'barberway');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Mechassault93');

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
define('AUTH_KEY',         'MIH#|.nq2^ro2`:Wz/0!97A7)..*jjkdr<[9JrRBXliqQt0@>}Zzd/?{#iIk%mW>');
define('SECURE_AUTH_KEY',  'hSbZ,)SK&p14B,-O>{JlV{}P;lWQGGf2Q@Q`0eaiDti3=H]Uo`vwSj(pL||<85? ');
define('LOGGED_IN_KEY',    'g4$KKvi0SJ;h?WA:V7qXw`TCboT%gU7aJnR&-MgdSD?;R9eZvtGuyC1n|N8t-;aO');
define('NONCE_KEY',        ')hR1uG2u)|n}Yi1~j[OD[HvVwiDcu-VAR@%1KzM@=*tFu`sv1C9q1g:ochX9?.2Q');
define('AUTH_SALT',        ',ij[ha17(d0r(HUE:^-V,Lr!#DDxg0(#REt90AF&dpq2w=);e2Q{AOj>/jOx]*~0');
define('SECURE_AUTH_SALT', 'ImhpX.O!M1H9HeV[Nq2$^j{n>}$,gRrI}pe ]9pnv]rQu*3`]%_lk_vv%F&XtuS}');
define('LOGGED_IN_SALT',   '|4Qu`6v5,r?K@*JGT{?l?Ui4C)Jg+1q}sA0,#cx<En%y_7~hV:5,vWx|Vq*LsME2');
define('NONCE_SALT',       'QgQTLV{NuUC%kH89:D!dgRmYW:z0}*bfo][r(XgTaE_N5fc>{@h>+M6di/e7k.`r');
define('FS_METHOD','direct');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'barber_';

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
