let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.disableNotifications();
mix.copy("resources/assets/dashboard/", "public/dashboard");

mix
    .js('resources/assets/js/components/advice/app.js', 'public/js/advice.js')
    .js('resources/assets/js/components/category/app.js', 'public/js/category.js')
    .js('resources/assets/js/components/product/app.js', 'public/js/product.js')
    .sass('resources/assets/sass/app.scss', 'public/css');
