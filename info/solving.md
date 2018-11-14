# Решение проблем

* [Смена домена на сайте](#Смена-домена-на-сайте)
* [Обновление WP и плагинов из админки](#Обновление-wp-и-плагинов-из-админки)
* [Смена префикса у таблиц](#Смена-префикса-у-таблиц)
* [Решение проблемы с utf8mb4](#Решение-проблемы-с-utf8mb4)
* [Ошибка Missing Temporary Folder](#Ошибка-missing-temporary-folder)

## Смена домена на сайте

1. В случае переноса сайта на другой сервер следует **сперва перенести файлы**
2. Добавить в `wp-config.php` следующие строки:
```php
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] );
define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] );
```
3. Установить плагин [Automatic Domain Changer](https://wordpress.org/plugins/automatic-domain-changer/) и при помощи него изменить домен в БД (Tools > Domain Change), после чего сам плагин можно удалить
4. Удалить строки, добавленные в пункте #2

## Обновление WP и плагинов из админки

Проблему с обновлением WP и плагинов в случае, если он требует указывать вручную FTP-доступы, можно решить, прописав их в `wp-config.php` в следующем виде:

```php
define( 'FS_METHOD', 'ftpext' );
define( 'FTP_BASE', '/path/to/wordpress/' );
define( 'FTP_CONTENT_DIR', '/path/to/wordpress/wp-content/' );
define( 'FTP_PLUGIN_DIR ', '/path/to/wordpress/wp-content/plugins/' );
define( 'FTP_USER', 'username' );
define( 'FTP_PASS', 'password' );
define( 'FTP_HOST', 'ftp.example.org' );
define( 'FTP_SSL', false );
```
Если доступ к файлам сайта происходит по SFTP-протоколу, то следует также установить плагин [SSH SFTP Updater Support](https://wordpress.org/plugins/ssh-sftp-updater-support/) и заменить значение константы `FS_METHOD` на `ssh`.

## Смена префикса у таблиц

Если после изменения префикса у таблиц не удаётся залогиниться в админку поможет следующее решение:
```sql
UPDATE `{%TABLE_PREFIX%}usermeta` SET `meta_key` = replace(`meta_key`, '{%OLD_TABLE_PREFIX%}', '{%NEW_TABLE_PREFIX%}');
UPDATE `{%TABLE_PREFIX%}options` SET `option_name` = replace(`option_name`, '{%OLD_TABLE_PREFIX%}', '{%NEW_TABLE_PREFIX%}');
```

## Решение проблемы с utf8mb4
Для быстрой смены кодировки БД в случае переноса на сервер, не поддерживающий utf8mb4, следует воспользоваться готовым скриптом, предварительно положив его в корень сайта, открыв в браузере и указав доступы к нужной БД: https://github.com/ideus-team/wordpress/blob/master/other/db-convert.php

## Ошибка Missing Temporary Folder

Ошибка вызвана неверными настройками PHP на хостинге. Описанное выше решение является костылём и лучше всего обратиться к хостинг-провайдеру, чтобы он поправил это.

Для решения проблемы нужно создать папку `temp` в корне сайта и добавить в `wp-config.php` следующую строку:
```php
define( 'WP_TEMP_DIR', dirname(__FILE__) . '/temp/' );
```
