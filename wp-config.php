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
define('DB_NAME', 'toljy');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'root');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'V#4*g&m(csfK 0AoPlQBw[$6Z^&gqGl<K/$9:=yxhm?M.|k^Lj5]/R^mTq(Y-1x_'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', '/iaX0#@+^8_);qmLa5%R67OI5`RTth~KB{!#Wc`O@R$gV}L^<7WUryB=2H~Vy66R'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'OF[%hi{v{~eC3IZ^phwIn]iymq;4OjkR!.9wF3G1ZdfL8:`$YV9N[lW|HzdFfJ8T'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', 'pU#r{0J#m(xW trp2OhSlek=#N%a/L&1tF.P^/)M:!sP8$YMu]k1-Uki@HmZ %mh'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'R2_&=z~ntFRPEFA8Ze.x#Lh,M([[tK}NYMyi?Ol/a[5foC|_`tMTvA7mHyw:njFH'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', '2,>u:!s7lt23cPZ`s!M*(orELVFr%~aq{E#yVz;WGwW5Hhqow,;%Uw%oX?,^H$BE'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', 'z*Q{7KJoh324POyt)irU0?WTQJTt,Fd.Zs,&3I]+4yI(@bnmDy$|4=n<JN:NdF8&'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', '`$R6M8WqJsnpYMT`>,-r11{:h3-zS_PHRneivaS29Vhb[g|9+fq [1e#4TQ[W!ig'); // Cambia esto por tu frase aleatoria.
/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define ('WPLANG', 'es_ES');

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
?>
