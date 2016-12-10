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
define('DB_NAME', 'grejd_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');
// define('DB_PASSWORD', 'CyTwombly4612');

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
define('AUTH_KEY',         'iJ0N}%hR}*2tH2g~R9aiGnBq#R/*x;z@[s ,sb:mTdtVG&l#s)6nOMqY6^; EpLf');
define('SECURE_AUTH_KEY',  '(Zw#~O4/%SYt3kR5^nhIDdCZo~%q>Ht0Z6L,{SHsg[ulFz:41r4w7T9<xHWD*0OW');
define('LOGGED_IN_KEY',    '8jr{e1>T$A)gei4f%eS<H;g*!_%u0#~@oqTf{hBhq:&8N^-?cbE *O/4{|g0 sg>');
define('NONCE_KEY',        ':e:Q5g&P_E^}je7|:cyIDZ_6r^u@sKhzZA,P#IUH9{/6PlJY{w~{)E.QGi8I|#/}');
define('AUTH_SALT',        ';e`^~0TPuky3$YC+{K`=]l2sY/aOh(G0Ur.`,L*@Z&J~HP8? __A!YzM=Me.logS');
define('SECURE_AUTH_SALT', 'UR+A{,u6*c?Qt5WMrEmi_%`?Cql56[%1$1JL%(c*19Wu+N,QI6eQ&UF-&U/uMKQe');
define('LOGGED_IN_SALT',   '_Vy!I[0$d6xI t/q8c^42{wh_L@0.jW8uVTY#eg-kT1HfD@`;]V1DE@MjV23]]do');
define('NONCE_SALT',       'K_pD,_P|C-Pqf,$FA0~%E)QQKO^qp6G*Dn~7l5WAv6Uil@8.T g2-o22!W*wN {S');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'iu2_';

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
