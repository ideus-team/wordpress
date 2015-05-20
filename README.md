# Заготовки и лайфхаки для Wordpress

##Установка
1. Скачиваем с офсайта архив голого Wordpress и заливаем его в новый пустой проект
2. Удаляем:
 - `wp-content/plugins/hello.php`
 - `wp-content/themes/` все-стандартные-темы
3. Clone https://github.com/ideus-team/wordpress.git
4. В свой проект копируем поверх содержимое каталога `wp-framework`
5. Переименовываем тему:
 - правим соответствующие строки в `wp-content/themes/theme/style.css`
 - заменяем `wp-content/themes/theme/screenshot.png` на скриншот проекта (880х660px)
 - переименовываем папку `wp-content/themes/theme` по имени проекта
6. Во время установки указываем email `wordpress@ideus.biz` (или клиента, но не личный!)
7. Активируем нашу тему
8. Под каждую страницу создается шаблон вида `page-PAGE_SLUG.php` (эти страницы также нужно создать в Pages). Главная страница = `front-page.php`
9. Permalink Settings → Common Settings → Post name (если WP попросит внести изменения в .htaccess — нужно это сделать)
10. Settings → General - выставляем таймозону, форматы даты-времени и т.д.

## Вспомогательная информация

* Готовый функционал
* [Необходимые плагины](https://github.com/ideus-team/wordpress/blob/master/info/plugins.md)
* [Смена домена на сайте](https://github.com/veloper/WordPress-Domain-Changer)
* [Полезная информация](https://github.com/ideus-team/wordpress/blob/master/info/info.md)
* [Решение проблем](https://github.com/ideus-team/wordpress/blob/master/info/solving.md)
