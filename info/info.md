# Корисна інформація

* [Константи](#константи)
* [Видалення ревізій](#видалення-ревізій)
* [Увімкнення SSL](#увімкнення-ssl)
* [Робота з AJAX](#робота-з-ajax)
* [Необхідні Google Maps API для використання у ACF Pro](#необхідні-google-maps-api-для-використання-у-acf-pro)

## Константи

У WordPress існують спеціальні константи часу, створені для зручності, щоб не множити постійно секунди:
```
MINUTE_IN_SECONDS = 60
HOUR_IN_SECONDS   = 60  * MINUTE_IN_SECONDS
DAY_IN_SECONDS    = 24  * HOUR_IN_SECONDS
WEEK_IN_SECONDS   = 7   * DAY_IN_SECONDS
MONTH_IN_SECONDS  = 30  * DAY_IN_SECONDS
YEAR_IN_SECONDS   = 365 * DAY_IN_SECONDS
```

## Видалення ревізій

Видалити всі ревізії з БД можна за допомогою наступного запиту:
```sql
DELETE p,m,r FROM wp_posts p LEFT JOIN wp_postmeta m ON (p.ID = m.post_id) LEFT JOIN wp_term_relationships r ON (p.ID = r.object_id) WHERE p.post_type = 'revision';
```

## Увімкнення SSL

Після покупки SSL-сертифіката слід зробити наступне:

1. Встановити плагін [Really Simple SSL](https://wordpress.org/plugins/really-simple-ssl/) та активувати в його налаштуваннях SSL
2. Бажано додати наступний код у `.htaccess`:

```
# HTTP Strict Transport Security (HSTS)
<IfModule mod_headers.c>
  Header always set Strict-Transport-Security "max-age=expireTime; includeSubDomains"
</IfModule>
# HTTP Strict Transport Security (HSTS)
```
где:
* `expireTime` — (наприклад 2592000) час у секундах, на який браузер повинен запам'ятати, що цей сайт повинен відвідуватись виключно за HTTPS
* `includeSubdomains` — (опціонально) якщо вказати цей необов'язковий параметр, правила також застосовується до всіх піддоменів

3. Додати наступний код у `wp-config.php` (якщо його там немає, останні версії **Really Simple SSL** самі його додають):

```
@ini_set( 'session.cookie_httponly', true );
@ini_set( 'session.cookie_secure', true );
@ini_set( 'session.use_only_cookies', true );
```

## Робота з AJAX

```js
/**
 * Надсилаємо AJAX-запит типу nc_action
 */
$.ajax({
  type: 'POST',
  url: nc_params.ajaxurl,
  data: {
    'test'   : 'Hello, world!',
    'action' : 'nc_action',
  },
  dataType: 'json',
  success: function(result){
    console.log('success: ' + result.success);
    console.log(result.data);
  }
});
```

```php
/**
 * Обробляємо AJAX-запит типу nc_action
 */
add_action( 'wp_ajax_nc_action', 'nc_action_callback' );
add_action( 'wp_ajax_nopriv_nc_action', 'nc_action_callback' );
function nc_action_callback() {
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

## Необхідні Google Maps API для використання у ACF Pro

* Maps Javascript API
* Geocoding API
* Geolocation API
* Maps Embed API
* Places API
