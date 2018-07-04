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
define('DB_NAME', 'wp598');

/** MySQL database username */
define('DB_USER', 'wp598');

/** MySQL database password */
define('DB_PASSWORD', '68SQ5TpA.[');

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
define('AUTH_KEY',         'rvbtvkaropng6uat9ygsc5nodfxqu5pql4zsdqxpc4kdni6qfqly7utbeobbhsci');
define('SECURE_AUTH_KEY',  'arf9rp2nek1loeqzcv2buajklrbwx5oqoydqfjmkl2fp3f6xxuvxvtn8lolfgd2z');
define('LOGGED_IN_KEY',    'qnbepvwdbiirp35ch7mquocbyjkdvik44ounywack3gj8cvgwdcyrlovl3lrmhot');
define('NONCE_KEY',        'hlex6ui3jkkv6xjehgrjqc8zaanypvzsidumblnwgymrzcekctildzul1kb9kaxd');
define('AUTH_SALT',        'jlmefdzd8qgjwl1ulb3bpdu0q3at7nntjbmrrp4xuad24x4ddkqarjl5ig1jlkcw');
define('SECURE_AUTH_SALT', 'dvsq3gwakfnggrtgzipao1s170wn3sxcgjzhkz9atfmnwrtjvva4rndyxf8aktnw');
define('LOGGED_IN_SALT',   'rrrig5xadiuhih6evpfujl1vz7erg5k72j2j69u7es7etu5ushh4ii7vt0ymdu8r');
define('NONCE_SALT',       'fdlpvkweckykxvrspfyek5naienhburax9okt3besrc4cfoicj0cgmylcxuxpdcu');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp2a_';

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

// enable debug
define('WP_DEBUG', true);

// log debug info
define('WP_DEBUG_LOG', true);

// display debug info
define('WP_DEBUG_DISPLAY', false);

// save queries
define('SAVEQUERIES', false);



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
