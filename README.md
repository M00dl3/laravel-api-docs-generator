# Laravel API docs generator

This pagackage automatically generate documentation based on de laravel api routes. Every route that begins with `api/` will be used to generate documentation. This packages is work in progress so if you have suggestion please let me know!

**Documentation contains:**

- Controller
- Summary docblock
- Uri
- HTTP method
- Middleware
- Validation rules

## Installation

First install the package by running:

```
$ composer require jurrid/documentor --dev
```

> Attention: be aware of documentation that is open for the word wide web!

Then publish the config file by running:

```
php artisan vendor:publish  --tag=documentor-config
```

This will create a `documentor.php` file in your `config` folder.

Finally publish the assets  file by running:

```
php artisan vendor:publish  --tag=documentor-assets
```

This will create a `vendor/documentor` folder in the `public` folder with the assets for the documentation page.

## Usage

Run the artisan command to generate documentation. 

```
php artisan docs:generate
```

The command generate a serialized file that is stored in the storage folder. If you want to update the documentation just rerun the command.

When you generate the documentation you visite `/documentation` page to preview. This can be updated through the config file.

## Contributing

Contributions are welcome, [thanks to y'all](https://github.com/jurrid/laravel-api-docs-generator/graphs/contributors) :)

##  License

The Laravel API docs generator is free software licensed under the MIT license.