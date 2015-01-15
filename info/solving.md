# Решение проблем

## Обновление WP и плагинов из админки

Проблему с обновлением WP и плагинов в случае, если он требует указывать вручную FTP-доступы, можно решить, прописав их в `wp-config.php` в следующем виде:

```php
define( 'FS_METHOD', 'ftpext' );
define( 'FTP_BASE', '/path/to/wordpress/' );
define( 'FTP_USER', 'username' );
define( 'FTP_PASS', 'password' );
define( 'FTP_HOST', 'ftp.example.org' );
define( 'FTP_SSL', false );
```
