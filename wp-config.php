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
define('DB_NAME', 'capooti_spatiale');

/** MySQL database username */
define('DB_USER', 'capooti_spatiale');

/** MySQL database password */
define('DB_PASSWORD', 'WDkwjY54');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY', 'hTsfauCiy2Wfq2Q2kXWpUm15i7jzN8XCaBpm0cKlaBO8od9uZyS6xFoqprOhzT2y');
define('SECURE_AUTH_KEY', 'UHGhM0na7A1TPuM4eHHUo1kotkZMJEn2gNAaLc3BOBsrLcBYKnMsm3Hehn94B2MV');
define('LOGGED_IN_KEY', 'fN0DIRl48c32iSUtg06UqGkNAIC63BQ93SHRQPrXZhqj2SU2aAweJ9hsLgn1EJ3u');
define('NONCE_KEY', 'fFbCmoWzREtZYNEmDSf1jXqjjoYBsRLN1GNuRfgHakZvtgcVeBZRxbfnWNIyRLyB');
define('AUTH_SALT', 'gkR0J9cGkVy11bdtdeWp4Bj1pjuXl8GTi036z3ukdWuim6Z0Dfszcd1ikAL7eHxv');
define('SECURE_AUTH_SALT', 'YB9X2hDYYUeHT9rJzP3zRWLXBxy8D8sET8laT12xfIjowLU0vKVINd8rYx82aCBP');
define('LOGGED_IN_SALT', 'oF2g3TB4U5NSXgSOQaerCoeSzdOD5mcH0jKEXs504GbBWqGVd5tkpZKYqClOtrhE');
define('NONCE_SALT', 'u6oDtobacAIy2abTg1E1ZsZh8YL2kWcpV23zrOVtNdtoSsqfqOWlKzd4EHBqnKWW');

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

// Disable display of errors and warnings 
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
