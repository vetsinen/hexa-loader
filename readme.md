
### to add package to your project
```composer require neohexa/imageloader```

### using package
``` 
$ldr = new ImageLoader();
$ldr->act('https://hexa.com.ua/wp-content/themes/hexa/images/girl.jpg', 'babe.jpg', '/tmp/);
```

### to run tests download package from github
```
composer install
./vendor/bin/phpunit
```

### original concept

Напишете пакет для Composer, который будет заниматься тем, что будет загружать картинку с
указанного URL и сохранять ее на ФС(файловая система).
Пакет выложить на packagist. Пакет должен делать все возможные проверки и бросать
exceptions в случае исключительных ситуаций.

- Возможные форматы картинок - jpg, png, gif. Работать должно на Windows и Linux.
- Код комментировать, стиль - psr-2
- Автолоадер - psr-4
- Комменты - phpdoc
- Юнит тесты обязательно - phpunit
- Выложить на Github