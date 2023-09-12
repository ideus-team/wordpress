# Вирішення проблем

* [Зміна домену сайта](#зміна-домену-сайта)
* [Смена домена в мультисайтовом WP](#зміна-домену-в-мультисайтовому-wp)
* [Оновлення WP та плагінів з адмінки](#оновлення-wp-та-плагінів-з-адмінки)
* [Заміна префікса таблиць](#заміна-префікса-таблиць)
* [Вирішення проблеми з utf8mb4](#вирішення-проблеми-з-utf8mb4)
* [Помилка Missing Temporary Folder](#помилка-missing-temporary-folder)

## Зміна домену сайта

1. У разі перенесення сайту на інший сервер слід **спочатку перенести файли**
2. Добавити в `wp-config.php` наступні рядки:
```php
define( 'WP_SITEURL', 'https://' . $_SERVER['HTTP_HOST'] );
define( 'WP_HOME', 'https://' . $_SERVER['HTTP_HOST'] );
```
3. Встановити плагін [Automatic Domain Changer](https://wordpress.org/plugins/automatic-domain-changer/) та за допомогою нього змінити домен у БД (Tools > Domain Change), після чого сам плагін можна видалити
4. У разі встановленого плагіна Contact Form 7 вручну в адмінці в налаштуваннях кожної форми змінити електронну пошту відправника, скоріш за все там буде прописано мило зі старого домену
5. Видалити або закоментувати рядки, додані у пункті #2

## Зміна домену в мультисайтовому WP

1. У разі перенесення сайту на інший сервер слід **спочатку перенести файли**
2. Добавити в `wp-config.php` наступні рядки:
```php
define( 'WP_SITEURL', 'https://' . $_SERVER['HTTP_HOST'] );
define( 'WP_HOME', 'https://' . $_SERVER['HTTP_HOST'] );
```
3. У файлі `wp-config.php` поправити константу `DOMAIN_CURRENT_SITE`, прописавши там новий домен
4. Змінити домен у наступних таблицях у БД:
    * wp_options (`siteurl` и `home`)
    * wp_site
    * wp_sitemeta (`siteurl`)
    * wp_blogs (все записи в колонке `domains`)
    * wp_#options (`siteurl` и `home` для каждого сайта)
5. Видалити рядки, додані у пункті #2

## Оновлення WP та плагінів з адмінки

Проблему з оновленням WP та плагінів у разі, якщо він вимагає вказувати вручну FTP-доступи, можна вирішити, прописавши їх у `wp-config.php` у наступному вигляді:

```php
define( 'FS_METHOD', 'ftpext' );
define( 'FTP_BASE', '/path/to/wordpress/' );
define( 'FTP_CONTENT_DIR', '/path/to/wordpress/wp-content/' );
define( 'FTP_PLUGIN_DIR', '/path/to/wordpress/wp-content/plugins/' );
define( 'FTP_HOST', 'ftp.example.org' );
define( 'FTP_USER', 'username' );
define( 'FTP_PASS', 'password' );
// define( 'FTP_PRIKEY', '/path/to/private_key.pem' );
define( 'FTP_SSL', false );
```
Якщо доступ до файлів сайту відбувається за SFTP-протоколом, слід також встановити плагін [SSH SFTP Updater Support](https://wordpress.org/plugins/ssh-sftp-updater-support/) та замінити значення константи `FS_METHOD` на `ssh2`.

## Заміна префікса таблиць

Якщо після зміни префікса таблиці не вдається залогінитись в адмінку допоможе наступне рішення:
```sql
UPDATE `{%TABLE_PREFIX%}usermeta` SET `meta_key` = replace(`meta_key`, '{%OLD_TABLE_PREFIX%}', '{%NEW_TABLE_PREFIX%}');
UPDATE `{%TABLE_PREFIX%}options` SET `option_name` = replace(`option_name`, '{%OLD_TABLE_PREFIX%}', '{%NEW_TABLE_PREFIX%}');
```

## Вирішення проблеми з utf8mb4
Для швидкої зміни кодування БД у разі перенесення на сервер, який не підтримує utf8mb4, слід скористатися готовим скриптом, попередньо поклавши його на корінь сайту, відкривши в браузері та вказавши доступи до потрібної БД: https://github.com/ideus-team/wordpress/blob/master/other/db-convert.php

## Помилка Missing Temporary Folder

Помилка викликана неправильними налаштуваннями PHP на хостингу. Описане нижче рішення є милицею і краще звернутися до хостинг-провайдера, щоб він поправив це.

Для вирішення проблеми потрібно створити папку `temp` в корені сайту та додати до `wp-config.php` наступний рядок:
```php
define( 'WP_TEMP_DIR', dirname(__FILE__) . '/temp/' );
```
