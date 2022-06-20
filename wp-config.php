<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wordpressVE' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

define('FS_METHOD','direct');
/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'a_P7X*({;P8aQL^Tts+tBS(E4,|bte1SBs*psdGw&&&%-~GRh-KJ !;_fy+3A4w.' );
define( 'SECURE_AUTH_KEY',  'UUNwj~?d/CXoo/wrm80tvk 9Ic2=1+z`@0du1AsFM(Fcvv-v>j7 j{7[stMj&:I*' );
define( 'LOGGED_IN_KEY',    '_<V)MTH/C1;P<#t*n<_y._](0]^+~M!pWsnV&>Y*BajiEN)JkoFn},i;$`_R`?5.' );
define( 'NONCE_KEY',        'D_B4-?8sXNtdz-]JIY<!,)a8[-3Ec,_T@wv};pml*V06brD=Ja3CUe*5KZTGZ|e~' );
define( 'AUTH_SALT',        '.t<edAnZ`:nIi+<^Wk5Pn Uh;S@G@MqPx$,]PBl10Qel^zZ;RkMJZC!d 8&)[xB^' );
define( 'SECURE_AUTH_SALT', 'q6xI8dO2}JUDaDFGnfp<kCgA0S6&(t{tNk|SLXTk`Sf_x(_%j}~Mtu11sgK|W=Rm' );
define( 'LOGGED_IN_SALT',   '+JE]-W)4h|M5Nnmdqf<jLO<Dpe-aZaX: }::_OmR%<s`_ch;gr$c76&`Sq$#H&TB' );
define( 'NONCE_SALT',       '0ZF!}7nLk8J8K]D{|xP*~Vr#nH*uaB2ciJk7bA2cPy`<xmMEUie^5d(VdkS,?s$,' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';

