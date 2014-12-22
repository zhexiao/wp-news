<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp-news');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'xiaozhe');

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
define('AUTH_KEY',         '/W_2yz~mc)>^cc76^IFtWkZ+9{rF_S{Bk?!PLhB|0vo|?n]X} vU}ax2(B:el4_i');
define('SECURE_AUTH_KEY',  'q9XaK28x0AP)b?@*fe7Mf,u?G>O=iG?B@&2j2s%!P2Ki{-L[(.;KDUw0gy9Ct%uj');
define('LOGGED_IN_KEY',    '&(*/~u; ?>x2bg5}+D6tYmV9 -84~SqKzipMV<]x+L|3F{-ca7]E;K!):e%(=[X6');
define('NONCE_KEY',        ']>9yA3KNx<o7qV,u}4C^xl_? {@Vqi7eVAEq-w}#qq;r~Q^{82jkNS. gt*A]r(T');
define('AUTH_SALT',        '6U)>;ZJWnjJ&H{F2-<B8|;3$(GB1LbmP0,^)m1WlKBq`X8POp6]:nZ<66E@U:J<n');
define('SECURE_AUTH_SALT', '_c|)Ai+Zm=X]$;-scoLk(8ZV!S=#1g#*um:BOIRZu*q_Ok#*R;@vmj$|ZSg>-rXa');
define('LOGGED_IN_SALT',   '0g+vR[M&PFlf7;OqzHE]hr1MyPtbN(YaFl,|O|_4MSu6NtQ=9<-@_3EP:%w0[OeM');
define('NONCE_SALT',       'Q0gyA]dg1^2e$|!(Mn|(:4zJ;IZnJ.6`YU9sn;N6|BJw9z|3JJ_I^tdPJ#y06H)*');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
