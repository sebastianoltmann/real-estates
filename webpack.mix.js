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

const themes = ['admin','chasa'];

// // compile themes
for (const theme of themes) {
    mix.js(`resources/assets/themes/${theme}/js/app.js`, `public/themes/${theme}/assets/js/app.bundle.js`)
        .sass(`resources/assets/themes/${theme}/sass/app.scss`, `public/themes/${theme}/assets/css/app.bundle.css`)
        .webpackConfig(require('./webpack.config'))
}

if (mix.inProduction()) {
    mix.version();
} else{
    mix.sourceMaps();
}
