<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'blogDigital');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'root');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '^KBDu_hwUnK#QK/=!LN1>gic-gV96vgm6].m,My@1s5^eSwn!T+Oz1q~E2_FVc!Z');
define('SECURE_AUTH_KEY', 'e?tW/Q#cKh^=H.[i7q]H8hbg4!jo5SZ~Bprn72BT04Astyy1&rGZ%/K:l8ch5Y~&');
define('LOGGED_IN_KEY', '9eP<RYq&=g5+`::RIZfz?CNlOu~Q7^[c=)i$]2I*c4o]TE}bazzV[2-4?mci~X4M');
define('NONCE_KEY', 'La 5]c=]O(&:$s-o b1%Cfo-qj>BeA9R2^EHS{dF)^/Aqln>=0IC<1!IGU2AQ).{');
define('AUTH_SALT', 'j>+8_+WxM]C+M)B1R5;=.ZMu:CKv8^?]&:{kD]B$!%IXAKhW *C=]S4-Z(wke7#^');
define('SECURE_AUTH_SALT', 'um,H>TPu9k+(~d7u^ASB%-db<{[B147uYE1l>#g&2TE{atan|3^_?f0$>jC[)}YV');
define('LOGGED_IN_SALT', 'YSx,8.:Zc_~RLUl# 2PUbXy]B@|T90,ow>,JLPs]PkPv/ZB0gSiFRC{%5+XJC:6?');
define('NONCE_SALT', 'EQPazC*mvXV~[N0x:%z>)NjAW91q(:qh`?,O :Qr9IejIeFgB.[Il..n,;aS&*(Z');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
