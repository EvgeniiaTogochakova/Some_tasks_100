# Laravel. Homework 13. Тогочакова Евгения

В этой практической работе вы реализуете уведомления через внешние сервисы.

1. Создайте новый проект Laravel или откройте уже существующий.

2. Создайте новую ветку вашего репозитория от корневой (main или master).

3. Создайте сущность Product (модель, миграцию и контроллер) командой ```php artisan make:model Product -mc```.

4. Опишите миграцию для таблицы products c типами полей:
```
$table->integer('sku');
$table->string('name');
$table->decimal('price', 9, 3);
```

5. Выполните миграцию командой ```php artisan migrate```.


6. Добавьте в файл api.php маршруты:
```Route::apiResource('products', \App\Http\Controllers\ProductController::class);```

7. Создайте класс-фабрику для сущности Product c помощью команды ```php artisan make:factory ProductFactory```.

8. Создайте класс-наполнитель для сущности Product c помощью команды ```php artisan make:seeder ProductsSeeder```.

9. Выполните команду ```php artisan db:seed``` для наполнения базы данных сгенерированными данными.![Иллюстрация](postman-screenshots/screenshot1.png)

10. В классе ProductController реализуйте методы index, show, store, update, destroy.

11. Протестируйте каждый из маршрутов контроллера ProductController с помощью Postman и приложите скриншоты ответа на запросы в папку postman-screenshots (названия файлов должны соответствовать формату index.jpeg, show.jpeg, store.jpeg, update.jpeg, destroy.jpeg для каждого метода, соответственно). <br> index![Иллюстрация](postman-screenshots/index.png) show![Иллюстрация](postman-screenshots/show.png) store![Иллюстрация](postman-screenshots/store.png) update![Иллюстрация](postman-screenshots/update.png) destroy![Иллюстрация](postman-screenshots/destroy.png)

12. Создайте тест c помощью команды ```php artisan make:test Products/ProductTest```.

13. Опишите функции:
```
test_products_can_be_indexed,
test_product_can_be_shown,
test_product_can_be_stored,
test_product_can_be_updated,
test_product_can_be_destroyed.
```

14. Запустите выполнение тестов командой ```php artisan test```.![Иллюстрация](postman-screenshots/screenshot2.png)