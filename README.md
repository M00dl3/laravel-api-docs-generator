# Laravel API docs generator

This package automatically generates documentation based on the Laravel API routes. Every route that begins with `api/` will be used to generate documentation. This package is a work in progress so if you have any suggestions please let me know!

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

> Attention: be aware of documentation that is open to the word wide web!

Then publish the config file by running:

```
php artisan vendor:publish --tag=documentor-config
```

This will create a `documentor.php` file in your `config` folder.

Finally publish the assets file by running:

```
php artisan vendor:publish --tag=documentor-assets
```

This will create a `vendor/documentor` folder in the `public` folder with the assets for the documentation page.

## Usage

Run the artisan command to generate documentation. 

```
php artisan docs:generate
```

This command generates a serialized file that is stored in the storage folder. If you want to update the documentation just rerun the command.

When you generate the documentation you visit `/documentation` page to preview. This can be altered through the config file.

## Contributing

Contributions are welcome, [thanks to y'all](https://github.com/jurrid/laravel-api-docs-generator/graphs/contributors) :)

## License

The Laravel API docs generator is free software licensed under the MIT license.