const mix = require('laravel-mix');
const webpack = require('webpack');
const tailwindcss = require('tailwindcss');

process.NODE_ENV = 'development'


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

mix
    .options({
        
        uglify: {
            uglifyOptions: {
                compress: {
                    drop_console: false,
                }
            }
        },
        processCssUrls: false,
    })
    // .webpackConfig({
    //     plugins: [
    //         // new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)
    //     ],
    // });

mix
.setPublicPath('../public_html')
.js('resources/js/app.js', '../public_html')
.sass('resources/sass/light.scss', '../public_html', {}, [tailwindcss('./light.js')])
.version();

mix
    .setPublicPath('../public_html')
    .sass('resources/sass/bundle.scss', '../public_html')
    .version();

mix
    .sass('resources/sass/dark.scss', '../public_html', {}, [tailwindcss('./dark.js')])
    .version()
    .copy('resources/favicon.png', '../public_html')

mix
    .sass('resources/js/plugins/index.scss', '../public_html/plugins.css')
    .version();
    // .copy('resources/favicon.png', '../public_html')
    // .copy('../public_html', '../winktest/public_html/vendor/wink');
    
mix    
    .copy('resources/css', '../public_html/styles')
    .copy('resources/assets', '../public_html/assets')
    .copy('resources/images', '../public_html/images')
    .copy('resources/fonts', '../public_html/fonts');



// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');
