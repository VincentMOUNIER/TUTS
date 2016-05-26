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
define('DB_NAME', 'vincentmfstuts');

/** MySQL database username */
define('DB_USER', 'vincentmfstuts');

/** MySQL database password */
define('DB_PASSWORD', 'Tuts2016');

/** MySQL hostname */
define('DB_HOST', 'vincentmfstuts.mysql.db:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'HpfZgTffg4zaI+wF/QS60QOj3kNiMQphnNPVLdN9iXXJ8lggHxd1rzvaqtiE');
define('SECURE_AUTH_KEY',  'WwrYl1NdXuGizc+Db8ztCG8dRpzdxXPL+c8k7cGWWYudnoUJrBk5LmO9xMZ1');
define('LOGGED_IN_KEY',    'gO8ns0NdTuzFhgWuPfJHvTffXqctYsf/GtZVe21BlqjILa8KoXscXR7ldsxI');
define('NONCE_KEY',        'Wjd/8lhrgJ3HUeXqhHt4MStAfO46HYohr6PgcJGZsrA/aKMFIAKT4A1xrxXg');
define('AUTH_SALT',        'xrkAv7huZG2eUp+nIHbUx2IKdLDURs0N2FsbB0KrKlJit/F2mdAa2SknEiQN');
define('SECURE_AUTH_SALT', 'Cdkcyas18f/vLZk5zZjUkmblHY7x4l3YN79iU8NRo/JerRd0T81k3pB9azwb');
define('LOGGED_IN_SALT',   '8HGtjhbEWJnc/puIydM5H2pujS2MMxETY+FFPHEbTBAOayDlksCFPFp/1WR/');
define('NONCE_SALT',       'F5LeWRLfbavs73AR8IvRBQawcHp/roirEQ1k/gr97YD3YGv/8ufVHAccyEWv');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wor8403_';

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
