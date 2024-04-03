<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'handeny' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'VoFC:QLxPCGqE/sw~C`C:$E>s5Eym}pJ`JkfHLX+NNxo{t|!>s|Vh<ZDse<waWKh' );
define( 'SECURE_AUTH_KEY',  'Z+xvRQJA/!QM>foi[ 1?[6d36gtqQNSwhP!si4;$*I+w|sN%8<;Qd<-bt_@pZeTO' );
define( 'LOGGED_IN_KEY',    '-+4A/Glry#E]/)AFMY6tuj*8o9bB!GS%-wMAuxVf7[h|w0Emq&xMr0JY1[5>@-m9' );
define( 'NONCE_KEY',        '(]Zbu}9u:CLb/psm4An5%JfIx^OI8Y]8[lK,=!<pMBORQvSq9HZBle#zY8L@=O^S' );
define( 'AUTH_SALT',        '@C(_AcZgU.W{ASO7Y]x_%SM*k)=W*{#S!tap-z>I&+RQ RGq!: Y,GV}~CggMwvr' );
define( 'SECURE_AUTH_SALT', '_[+}=HL? YB,q[0V5|rL7KudF`FlTMCQQh7xUW|VK4WRUYQA3X_);g 1SQzXd-^r' );
define( 'LOGGED_IN_SALT',   'JFJf;INeO4jkphy;,HdmiBiMC/0wpbWO 8w!&:OmxX`@fI(:>>rsL}88 ujrqm}-' );
define( 'NONCE_SALT',       'G:DMgpHK>j,kZ51lD [!B)QzhU)-,{z2(xHXHFBIzh@Kg6ISHTwg;xSLfa;H=t>a' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
