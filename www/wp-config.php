<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'vh37047_pn');

/** Имя пользователя MySQL */
define('DB_USER', 'vh37047_pn');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'XWCg6JjY');

/** Имя сервера MySQL */
define('DB_HOST', 'db01.hostline.ru');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/** Ревизии постов */
define('WP_POST_REVISIONS', false);

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'DtXss|0/Q-_I1&|TgAk-+=jbaiV|6?diG9/:i+OVh;^IE^N/.Zs*I@8bkDiJlpzH');
define('SECURE_AUTH_KEY',  '_@;9nbO41]AF+qODrp.|Phq,5!K2~>3fV^eh*1nK]]d*5u=;rJ0.AHgE@eA7L9kA');
define('LOGGED_IN_KEY',    '?3%8+4%b-9n!g%; fm*VV~}t/qhRZ2|GqkD6y=zo(n}I_.;nzD8}5YVE..1^$@UR');
define('NONCE_KEY',        'E{&I=t65R6Rrw#sbYa$wR| +b7(c,D=qjr ;jksbVz/#k|JM%_1:Bcy0|H-)-4F7');
define('AUTH_SALT',        'ZJnuZYMUOLV|t j|8H||M=GvYTOp+F~k|T,;gcx-+dWothFL8Tr(]Ep9-0mM|Gh6');
define('SECURE_AUTH_SALT', '/Bll9eVN_g-u~liAd=BnHPh;>x{*7W[O-&y$A8XLCH7@oMUfJqHR9D45*8VNYHpg');
define('LOGGED_IN_SALT',   'p`8~P7P(dMyqoXd$g|Tki73@~/fMNJT=1G:v]5mGMn0/4%M?:`Ua?&h{==xgo(!o');
define('NONCE_SALT',       'KBrB ;IV{P]+sUDT;HotA/^,/Btk#o.R?yv+)|f!{=hyVCSR-sw:bN >e|+/+^@-');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
