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

## Смена префикса у таблиц

Если после изменения префикса у таблиц не удаётся залогиниться в админку поможет следующее решение:
```sql
UPDATE `{%TABLE_PREFIX%}usermeta` SET `meta_key` = replace(`meta_key`, '{%OLD_TABLE_PREFIX%}', '{%NEW_TABLE_PREFIX%}');
UPDATE `{%TABLE_PREFIX%}options` SET `option_name` = replace(`option_name`, '{%OLD_TABLE_PREFIX%}', '{%NEW_TABLE_PREFIX%}');
```

## Смена домена на сайте

* Добавить в `wp-config.php` следующие строки:
```php
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
```
* Установить плагин [Automatic Domain Changer](https://wordpress.org/plugins/automatic-domain-changer/) и при помощи него изменить домен в БД

* Удалить строки, добавленные в пункте #1
