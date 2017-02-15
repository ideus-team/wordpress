# Оптимизация производительности

## Изображения
Разовая ручная оптимизация всех изображений в uploads и теме при помощи [Image Catalyst](https://github.com/lorents17/iCatalyst) со следующими настройками:

* **PNG** — Xtreme
* **JPG** — Progressive
* **GIF** — Default

После этого требуется установка [WP Smush](https://wordpress.org/plugins/wp-smushit/), он оптимизирует изображения прямо при загрузке, но делает это не так хорошо как вышеуказынный пакет утилит.

## Включение gzip-компрессии
```
<IfModule mod_deflate.c>
  AddOutputFilterByType DEFLATE text/plain
  AddOutputFilterByType DEFLATE text/html
  AddOutputFilterByType DEFLATE text/xml
  AddOutputFilterByType DEFLATE text/css
  AddOutputFilterByType DEFLATE application/xml
  AddOutputFilterByType DEFLATE application/xhtml+xml
  AddOutputFilterByType DEFLATE application/rss+xml
  AddOutputFilterByType DEFLATE application/javascript
  AddOutputFilterByType DEFLATE application/x-javascript
  AddType x-font/otf .otf
  AddType x-font/ttf .ttf
  AddType x-font/eot .eot
  AddType x-font/woff .woff
  AddType image/x-icon .ico
  AddType image/png .png
</IfModule>
```

## Минификация и склейка CSS, JS, минификация HTML
… и прочие оптимизации при помощи плагина [Fast Velocity Minify](https://wordpress.org/plugins/fast-velocity-minify/)

## Серверное кеширование
При помощи плагина [WP Super Cache](https://wordpress.org/plugins/wp-super-cache/)

Обязательно включить опцию **Clear all cache files when a post or page is published or updated** на вкладке **Advanced**
