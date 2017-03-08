# Решение проблем

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
Если доступ к файлам сайта происходит по SFTP-протоколу, то следует также установить плагин [SSH SFTP Updater Support](https://wordpress.org/plugins/ssh-sftp-updater-support/)

## Смена префикса у таблиц

Если после изменения префикса у таблиц не удаётся залогиниться в админку поможет следующее решение:
```sql
UPDATE `{%TABLE_PREFIX%}usermeta` SET `meta_key` = replace(`meta_key`, '{%OLD_TABLE_PREFIX%}', '{%NEW_TABLE_PREFIX%}');
UPDATE `{%TABLE_PREFIX%}options` SET `option_name` = replace(`option_name`, '{%OLD_TABLE_PREFIX%}', '{%NEW_TABLE_PREFIX%}');
```

## Смена домена на сайте

* В случае переноса сайта на другой сервер следует **сперва перенести файлы**
* Добавить в `wp-config.php` следующие строки:
```php
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
```
* Установить плагин [Automatic Domain Changer](https://wordpress.org/plugins/automatic-domain-changer/) и при помощи него изменить домен в БД

* Удалить строки, добавленные в пункте #1

## Конвертация БД utf8mb4/utf8mb4_unicode_ci → utf8/utf8_general_ci
Для быстрой смены кодировки БД в случае переноса на сервер, не поддерживающий utf8mb4, следует воспользоваться готовым скриптом, предварительно положив его в корень сайта, открыв в браузере и указав доступы к нужной БД: https://github.com/ideus-team/wordpress/blob/master/other/db-convert.php
