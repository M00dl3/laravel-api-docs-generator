let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'resources/publish/app.js')
   .sass('resources/sass/app.scss', 'resources/publish/app.css');
