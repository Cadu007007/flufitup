const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/landing/styles.scss', 'public/css/landing')
    .sass('resources/sass/login/styles.scss', 'public/css/login')
    .sass('resources/sass/register/styles.scss', 'public/css/register')
    .sass('resources/sass/user/home.scss', 'public/css/user')
    .sass('resources/sass/admin/styles.scss', 'public/css/admin');