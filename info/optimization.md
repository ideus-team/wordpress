# Оптимізація PageSpeed

* [Оптимізація зображень](#оптимізація-зображень)
* [Автоматична конвертація існуючих зображень в формат WebP](#автоматична-конвертація-існуючих-зображень-в-формат-webp)
* [Увімкнення gzip-компресії](#увімкнення-gzip-компресії)
* [Увімкнення браузерного кешування](#увімкнення-браузерного-кешування)
* [Мініфікація та склеювання CSS, JS, мініфікація HTML](#мініфікація-та-склеювання-css-js-мініфікація-html)
* [Серверне кешування](#серверне-кешування)

## Оптимізація зображень
Разова ручна оптимізація всіх зображень у uploads та темі за допомогою [Image Catalyst](https://github.com/lorents17/iCatalyst) з наступними налаштуваннями:

* **PNG** — Xtreme
* **JPG** — Progressive
* **GIF** — Default

Після цього потрібно встановити [EWWW Image Optimizer](https://wordpress.org/plugins/ewww-image-optimizer/), він оптимізує зображення прямо під час завантаження.

## Автоматична конвертація існуючих зображень в формат WebP
Потрібно встановити плагін [WebP Express](https://wordpress.org/plugins/webp-express/)
Я використовую наступні налаштування:
* Operation mode: CDN friendly
* Scope: Uploads & themes
* Destination folder: In separate folder
* Alter HTML: enabled
* What to replace: Replace image URLs
* How to replace: The complete page

## Увімкнення gzip-компресії
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

## Увімкнення браузерного кешування
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
<filesMatch ".(jpg|jpeg|png|gif|svg|webp|eot|ttf|woff|woff2|js|css)$">
	Header set Cache-Control "max-age=31536000"
</filesMatch>
## Configure Cache-Control ##
```

## Мініфікація та склеювання CSS, JS, мініфікація HTML
… та інші оптимізації за допомогою плагіна [Autoptimize](https://wordpress.org/plugins/autoptimize/)

## Серверне кешування
За допомогою плагіна [Cache Enabler](https://wordpress.org/plugins/cache-enabler/)
