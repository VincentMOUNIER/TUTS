<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N'y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'E[?DHomrqYH[38=Uy{B5-i!SR6Ld}wHtX)n&I]@bE9Q@TyC`~%P UGm[RI8;3FpU');
define('SECURE_AUTH_KEY',  'z9@u:hm?Fczw=F%M-K7hv5Fm!p{BZs`Rq#kX9Q_E(*];$E13_c^x j=0/2&@z011');
define('LOGGED_IN_KEY',    '`>6+%6&IOS&qK>M{vgWIH[r{2!9Ty}g9scde.G?IIa K?2GT4,4rj0F;K2mAQsM;');
define('NONCE_KEY',        '!-93E6hJ ^B98 |Ht2[fo3FxMjp-pta~sIWKjDqn!8qwT~J&6@SD37qV<r/;GX*p');
define('AUTH_SALT',        'i?mJmJ^7U-T!p6}f&uJ59DzCjt`23T<?EDXfU>iU*dL:e-k)@hxHn}#lw!`K.7jR');
define('SECURE_AUTH_SALT', 'k`fvZ*|gUOfskYK .l*/Mvcl0XZJ!`b*7c$&)W!7T9M7guQq:6qg[0SozxF)>Ixo');
define('LOGGED_IN_SALT',   'Wv4m(rr(;RzA;G3Fv7/qtS&U.F<$7]j_Qb9+]ZF+8W_:k#zv@Q.&cE&hw#KB4TVT');
define('NONCE_SALT',       'PB*F+~BSdXq-vk(knPM6DdM~pa-gl6F7_kmv~ Cjqk5qNZ[a~C:qQmHl0~dS[kCV');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d'information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress 
 */
define('WP_DEBUG', false);

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');