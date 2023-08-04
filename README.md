
## Idea

Use Vue3 in PHP Projects

## Requirements
- uses Php version 7.4+ or Php 8.0+
- uses Php Session to best compatibility with ajax calls

## Usage

There is tree basic steps to getting started:

1) Call the Class
You can instantiate the Vue class with the default options
```php
use RBVue\VueOptions, RBVue\Vue;
$meuVueApp = new Vue();
```
Or use with any custom options to overwrite default
```php
use RBVue\VueOptions, RBVue\Vue;
$options = new VueOptions([
    'version' => ['major' => 3, 'full' => "3.0.0"]
]);
$meuVueApp = new Vue($options);
```

2) Call any module js or desired codes
```php
$meuVueApp
    ->module('path/to/file1.js') //just include this file as <script module...
    ->module('path/to/file2.js') //any files you want
    ->component('path/to/file2.js') //just include this file in same file from createApp()
;
```

3) Call the render when all your configs are done!
```php
$meuVueApp->run(); //create the app using the options | you can use $meuVueApp->render(); to capture the rendered result of run
```

## Autores

- [@ledark](https://www.github.com/ledark)

