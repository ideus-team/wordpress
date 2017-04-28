# Полезная информация

* [Константы](#Константы)
* [Удаление ревизий](#Удаление-ревизий)
* [Contact Form 7](#contact-form-7)
* [Включение SSL](#Включение-ssl)

## Константы

В WordPress существуют специальные константы времени, созданные для удобства, чтобы не умножать постоянно секунды:
```
MINUTE_IN_SECONDS = 60
HOUR_IN_SECONDS   = 60  * MINUTE_IN_SECONDS
DAY_IN_SECONDS    = 24  * HOUR_IN_SECONDS
WEEK_IN_SECONDS   = 7   * DAY_IN_SECONDS
YEAR_IN_SECONDS   = 365 * DAY_IN_SECONDS
```

## Удаление ревизий

Удалить все ревизии из БД можно при помощи следующего запроса:
```sql
DELETE p,m,r FROM wp_posts p LEFT JOIN wp_postmeta m ON (p.ID = m.post_id) LEFT JOIN wp_term_relationships r ON (p.ID = r.object_id) WHERE p.post_type = 'revision';
```

## Contact Form 7

При установке этого плагина желательно добавить эту константу в `wp-config.php`
```php
/**
 * Когда значение константы false (по умолчанию true), Contact Form 7 не будет пропускать контент формы через фильтр autop.
 * Данный фильтр заменяет двойной перенос строки на HTML конструкцию <p>...</p>, а одинарный на <br>.
 */
define('WPCF7_AUTOP', false);
```
## Включение SSL

После покупки SSL-сертификата следует сделать следующее:

1. Установить плагин [Really Simple SSL](https://wordpress.org/plugins/really-simple-ssl/) и активировать в его настройках SSL
2. Добавить следующий код в `.htaccess`:

```
# HTTP Strict Transport Security (HSTS)
<IfModule mod_headers.c>
  Header always set Strict-Transport-Security "max-age=16070400; includeSubDomains"
</IfModule>
# HTTP Strict Transport Security (HSTS)
```
