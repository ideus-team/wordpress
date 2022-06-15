# Оптимизация производительности

* [Оптимизация изображений](#Оптимизация-изображений)
* [Включение gzip-компрессии](#Включение-gzip-компрессии)
* [Включение браузерного кеширования](#Включение-браузерного-кеширования)
* [Минификация и склейка CSS, JS, минификация HTML](#Минификация-и-склейка-css-js-минификация-html)
* [Серверное кеширование](#Серверное-кеширование)

## Оптимизация изображений
Разовая ручная оптимизация всех изображений в uploads и теме при помощи [Image Catalyst](https://github.com/lorents17/iCatalyst) со следующими настройками:

* **PNG** — Xtreme
* **JPG** — Progressive
* **GIF** — Default

После этого требуется установка [EWWW Image Optimizer](https://ru.wordpress.org/plugins/ewww-image-optimizer/), он оптимизирует изображения прямо при загрузке.

## Включение gzip-компрессии
```
<IfModule mod_deflate.c>
  AddOutputFilterByType DEFLATE application/javascript
  AddOutputFilterByType DEFLATE application/rss+xml
  AddOutputFilterByType DEFLATE application/vnd.ms-fontobject
  AddOutputFilterByType DEFLATE application/x-font
  AddOutputFilterByType DEFLATE application/x-font-opentype
  AddOutputFilterByType DEFLATE application/x-font-otf
  AddOutputFilterByType DEFLATE application/x-font-truetype
  AddOutputFilterByType DEFLATE application/x-font-ttf
  AddOutputFilterByType DEFLATE application/x-javascript
  AddOutputFilterByType DEFLATE application/xhtml+xml
  AddOutputFilterByType DEFLATE application/xml
  AddOutputFilterByType DEFLATE font/opentype
  AddOutputFilterByType DEFLATE font/otf
  AddOutputFilterByType DEFLATE font/ttf
  AddOutputFilterByType DEFLATE image/svg+xml
  AddOutputFilterByType DEFLATE image/x-icon
  AddOutputFilterByType DEFLATE text/css
  AddOutputFilterByType DEFLATE text/html
  AddOutputFilterByType DEFLATE text/javascript
  AddOutputFilterByType DEFLATE text/plain
  AddOutputFilterByType DEFLATE text/xml
</IfModule>
```

## Включение браузерного кеширования
```
## Add Expires headers ##
<IfModule mod_expires.c>
  ExpiresActive On
  ExpiresDefault "access plus 1 month"
  ExpiresByType image/x-icon "access plus 1 year"
  ExpiresByType image/gif "access plus 1 year"
  ExpiresByType image/png "access plus 1 year"
  ExpiresByType image/jpg "access plus 1 year"
  ExpiresByType image/jpeg "access plus 1 year"
  ExpiresByType image/webp "access plus 1 year"
  ExpiresByType text/css "access plus 1 year"
  ExpiresByType application/javascript "access plus 1 year"
  ExpiresByType application/pdf "access plus 1 year"
  ExpiresByType font/woff "access plus 1 year"
  ExpiresByType font/woff2 "access plus 1 year"
</IfModule>
## Add Expires headers ##

## Configure entity tags (ETags) ##
<IfModule mod_headers.c>
  Header unset ETag
  FileETag None
</IfModule>
## Configure entity tags (ETags) ##

## Configure Cache-Control ##
<filesMatch ".(jpg|jpeg|png|gif|svg|eot|ttf|woff|woff2)$">
  Header set Cache-Control "max-age=31536000"
</filesMatch>
## Configure Cache-Control ##
```

## Минификация и склейка CSS, JS, минификация HTML
… и прочие оптимизации при помощи плагина [Autoptimize](https://wordpress.org/plugins/autoptimize/)

## Серверное кеширование
При помощи плагина [WP Super Cache](https://wordpress.org/plugins/wp-super-cache/)

* Если содержимое сайта часто изменяется, то желательно включить опцию **Clear all cache files when a post or page is published or updated** на вкладке **Advanced**
* Возможно потребуется переключение **Cache Delivery Method** в режим **Expert**, это также можно сделать на вкладке **Advanced**
