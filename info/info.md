# Полезная информация

* [Константы](#Константы)
* [Удаление ревизий](#Удаление-ревизий)
* [Contact Form 7](#contact-form-7)
* [Включение SSL](#Включение-ssl)
* [Работа с AJAX](#Работа-с-ajax)

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
define( 'WPCF7_AUTOP', false );
```
## Включение SSL

После покупки SSL-сертификата следует сделать следующее:
16070400
1. Установить плагин [Really Simple SSL](https://wordpress.org/plugins/really-simple-ssl/) и активировать в его настройках SSL
2. Желательно добавить следующий код в `.htaccess`:

```
# HTTP Strict Transport Security (HSTS)
<IfModule mod_headers.c>
  Header always set Strict-Transport-Security "max-age=expireTime; includeSubDomains"
</IfModule>
# HTTP Strict Transport Security (HSTS)
```
где:

`expireTime` — (например 2592000) время в секундах, на которое браузер должен запомнить, что данный сайт должен посещаться исключительно по HTTPS

`includeSubdomains` - (опционально) если указать этот необязательный параметр, правила так же применятся ко всем поддоменам. 

## Работа с AJAX

```js
/*
 * Отправляем AJAX-запрос типа ncAction
 */
$.ajax({
  type: 'POST',
  url: ncVar.ajaxurl,
  data: {
    'test'   : 'Hello, world!',
    'action' : 'ncAction',
  },
  dataType: 'json',
  success: function(result){
    console.log('success: ' + result.success);
    console.log(result.data);
  }
});
```

```php
/*
 * Обрабатываем AJAX-запрос типа ncAction
 */
add_action( 'wp_ajax_ncAction', 'ncAction_callback' );
add_action( 'wp_ajax_nopriv_ncAction', 'ncAction_callback' );
function ncAction_callback() {
  $args = wp_parse_args( $_POST, array(
    'test' => false,
  ) );

  $result = array(
    'test' => $args['test'],
  );

  if ( $result['test'] ) {
    wp_send_json_success( $result );
  } else {
    wp_send_json_error( $result );
  }
}
```
