# Заготовки и лайфхаки для Wordpress

##Установка
1. Качаешь архив голого Wordpress и заливаешь его в новый пустой проект
2. Удаляешь:
 - wp-content\plugins\hello.php
 - wp-content\themes\ все стандартные темы
3. Clone https://github.com/ideus-team/wordpress.git
4. В свой проект копируешь поверх содержимое /wp-framework/
5. Переименовываешь тему:
 - отредактировать соответствующие строки в wp-content\themes\theme\style.css
 - заменить wp-content\themes\theme\screenshot.png на скриншот проекта 880х660
 - переименовать папку wp-content\themes\theme по имени проекта
6. Во время установки указываем email `wordpress@ideus.biz` (или клиента, но не личный!)

## Вспомогательная информация

* Готовый функционал
* [Необходимые плагины](https://github.com/ideus-team/wordpress/blob/master/info/plugins.md)
* [Смена домена на сайте](https://github.com/veloper/WordPress-Domain-Changer)
* [Полезная информация](https://github.com/ideus-team/wordpress/blob/master/info/info.md)
* [Решение проблем](https://github.com/ideus-team/wordpress/blob/master/info/solving.md)
