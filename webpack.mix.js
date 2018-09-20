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

mix.js('resources/assets/js/components/telban/app.js', 'public/js/telban.js')
    .js('resources/assets/js/components/ipban/app.js', 'public/js/ipban.js')
    .js('resources/assets/js/components/currency/app.js', 'public/js/currency.js')
    .js('resources/assets/js/components/product/app.js', 'public/js/product.js')
    .js('resources/assets/js/components/stock-operation/app.js', 'public/js/stock-operation.js')
    .sass('resources/assets/sass/app.scss', 'public/css');
