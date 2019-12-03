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

mix.js('resources/dashboards/main-dashboard/app.js', 'public/js/main-dashboard.js');

mix.sass('resources/ui-kit/sass/styles.scss', 'public/css/oschool-ui-kit.css')
    .js('resources/ui-kit/oschool-ui-kit-overview.js', 'public/js')
    .sass('resources/ui-kit/sass/oschool-icons.scss', 'public/css/oschool-icons.css');

// mix.copy('node_modules/bootstrap/dist/css/bootstrap-grid.css', 'public/css/bootstrap');
