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

mix.js('resources/js/app.js', 'public/js/app.js').version()
    .js('resources/mobile/js/app.js', 'public/js/mobile.js').version()
    .sass('resources/css/app.scss', 'public/css/app.css')
    .postCss('resources/mobile/css/mobile.css', 'public/css/mobile.css')
    mix.copy('resources/mobile/img', 'public/images');
    mix.setResourceRoot('../');
mix.browserSync('127.0.0.1:8000');
