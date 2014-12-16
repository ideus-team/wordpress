# Заготовки и лайфхаки для Wordpress

## functions

Тут будет описание

## info

В WordPress существуют специальные константы времени, созданные для удобства, чтобы не умножать постоянно секунды:
```
MINUTE_IN_SECONDS = 60
HOUR_IN_SECONDS   = 60  * MINUTE_IN_SECONDS
DAY_IN_SECONDS    = 24  * HOUR_IN_SECONDS
WEEK_IN_SECONDS   = 7   * DAY_IN_SECONDS
YEAR_IN_SECONDS   = 365 * DAY_IN_SECONDS
```

Проблему с обновлением WP и плагинов в случае, если он требует указывать вручную FTP-доступы, можно решить, прописав их в `wp-config.php` в следующем виде:

```
define( 'FS_METHOD', 'ftpext' );
define( 'FTP_BASE', '/path/to/wordpress/' );
define( 'FTP_USER', 'username' );
define( 'FTP_PASS', 'password' );
define( 'FTP_HOST', 'ftp.example.org' );
define( 'FTP_SSL', false );
```
