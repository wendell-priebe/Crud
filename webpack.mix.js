const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/global.js', 'public/js')
    .scripts('node_modules/jquery/dist/jquery.js', 'public/js/jquery.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/js/bootstrap.js')
    //.sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/scss/bootstrap.css')
    .sass('resources/views/scss/style.scss', 'public/scss/style.css')
    //.sass('resources/scss/global.scss', 'public/scss', []);
