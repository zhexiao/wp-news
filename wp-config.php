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
define('DB_NAME', 'wpnews');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'password');

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
define('AUTH_KEY',         '$7a?npB1JyENXzI[A :#k8++:iQ wq9^vUt^&xfnrC**9PNK.=B-VG-FMJeWLp[Y');
define('SECURE_AUTH_KEY',  'j_xaiwX#SIF()sbu2+HmnUO`!,VzAFGyRK!N^L[-p13@WOeCi?P3/9H*G#>4*IfV');
define('LOGGED_IN_KEY',    'sl|.5x1$=,83%r<n)(;+7fRB2x:YO9@iz!L;UmzMI<sYBO2;iU?3U9W GB2|XNKk');
define('NONCE_KEY',        'jFO0}}Y)[Y5Nq`-q_GB7bJ6!T/{R{;F7P:HRwpU)d!x!?kuBc@?-i$hsl +W3dr=');
define('AUTH_SALT',        '~oRaM:S-dH} @ZkObrxGKVENs[Bo4}1G-O|)<|(H?uvA<ue.FnSPxbF 5@}SqIlc');
define('SECURE_AUTH_SALT', 'gbSM,@9.7m,lz0%E/EIMHxhJ>k{9%E<S(79$I]m@l=Z75-m@w}pad1#KZ{Pfvr^c');
define('LOGGED_IN_SALT',   'm0kd.DN2,42=&<HZG,%qXBo1u=x>/j{HYOC@&mBMsf~$6Kq/i|-.[VbH9?$mtc+f');
define('NONCE_SALT',       '^C2u8MvTr}SAae;mKj#1=vy:x-}K@(nAi&v,*IKG+,[g#F_rVR[~XxA6]nhsMT^W');

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
