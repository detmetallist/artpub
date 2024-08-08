<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'artpub');

/** Имя пользователя MySQL */
define('DB_USER', 'artpub_usr');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'xE2w903R6BOwW3SE');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'n+XT(3/(3NA4rB$r.w3q}t/S$<3E+/o%Xluv9SH{a.2ckqZ#+8Lu@OTdmg0Mu;Q)');
define('SECURE_AUTH_KEY',  'W=P7zQ}|*L#i#G:Mo7-<7N`p-i}[te}hWL}K{W.2h=eY:arpvRory~$_8Sk*;+_`');
define('LOGGED_IN_KEY',    '=0b{TyH@&dkc)g&yX`R-pPvaLi4H4J`{JFA()_P00<=1o#}u!*!Y?0u7w?Z}1U_q');
define('NONCE_KEY',        '6*p6{<pcZ`M[^4)C9d~QaH>LGh>([XRb*M*;B]86!=XKc!|@ $-jR4V7D9hD?>T$');
define('AUTH_SALT',        '7w&mmY-s?DT=abQXnM_&nP#wS,kUmK/vhLZ3GW4/X#rh w3fyOJ54[3%+?o:9`F|');
define('SECURE_AUTH_SALT', 'T_H))nB{<?]4LhJkNg%Ui6ERhE}D}&9ie1;Kj[%OMfp^~%l4nojYh}ej:O8 TUTc');
define('LOGGED_IN_SALT',   'MCnJQ_bL/dh|~k=`c;t~xL]#Wyl>UxX!H,36oZ uQ]SVqd~:-V~hUYoOZPU.RZI8');
define('NONCE_SALT',       '7M*+^*3Ed2Nh*M`(]nV$XJ>P@bRp=n$]RWj}L:(%;{L7aDJCI}Q&=Mju;J~7rmXv');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
