#### Реализация приложения `landing` на Symfony 5.3.10

PHP version >= 7.3

Отчет посещений любой страницы по *json-rpc 2.0* в другой микросервис.

Изменение URL микросервиса `activity`:
 
 ```App\Logic\BaseActivityQuery::ACTIVITY_URL ```
 
 Пробный запуск (из папки ``public``): 
 
 ```bash
 $ php -S localhost:8001
 ```

Если локально (или по указанному URL) запущен проект [activity](https://github.com/fomiash/activity) , то на странице ```/admin/activity/``` появится отчет посещений.
