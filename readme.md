#### Реализация приложения `landing` на Symfony 5.3.10

PHP version >= 7.3

Изменение URL микросервиса `activity`:
 
 ```App\Logic\BaseActivityQuery::ACTIVITY_URL ```
 
 Пробный запуск (из папки ``public``): 
 
 ```bash
 $ php -S localhost:8001
 ```

Если локально (или по указанному URL) запущен проект `activity`, то на странице ```/admin/admin/``` появится отчет посещений.

----------------

Foma Tuturov

fomiash@yandex.ru