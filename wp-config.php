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
define('DB_NAME', 'wpwoocom');

/** MySQL database username */
define('DB_USER', 'wpwoocom');

/** MySQL database password */
define('DB_PASSWORD', 'S7p@5g7-Zn');

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
define('AUTH_KEY',         'ecwqg3e5lv8pjem6xrubppcmdvpinqul6r2vwexluonhnnqugrqevhrdt9lull4p');
define('SECURE_AUTH_KEY',  'lknlfbzakspim04wq3gfspefjwsgblaftqaz5bc7nfyvpbybydvrs3eak7lpu8ar');
define('LOGGED_IN_KEY',    '6smvekfmj2dn7qt9rq4k6vw1jvud7y0otylcjmwpio8ogdvjxall6jcmg3wnfrbv');
define('NONCE_KEY',        'p7eaw6qdey86u7baoqtyy4ogpie9zg6tx2yddqwpplq8crngke6qthonnp99uev3');
define('AUTH_SALT',        'w9o8anse2xyiibsi57cmpov08p33gkgnuvmcepzpyjl5tqxuevaob1nwjdzkapdc');
define('SECURE_AUTH_SALT', 'exk49kmbeainzisqhtvld7ni3uiul4kefitxpefv0pnekbecxwayxoa8xdiwugyy');
define('LOGGED_IN_SALT',   'o1ls0iouw05uh8zxppxmtshvezsnucntus9j97motb1w7oeum0w2e7pwmaijbzec');
define('NONCE_SALT',       'krozxyvcfppvmaz7m9evxhfspglrhrtifuka1ljjnemthwnrls8ev1pjcxjb5jmp');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpwoocom_';

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
define('WP_DEBUG', false);

// log debug info
// define('WP_DEBUG_LOG', true);

// display debug info
// define('WP_DEBUG_DISPLAY', false);

// save queries
// define('SAVEQUERIES', false);



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
