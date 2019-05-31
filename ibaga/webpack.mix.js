const mix = require('laravel-mix');
const webpack = require('webpack');
const tailwindcss = require('tailwindcss');
const CompressionPlugin = require('compression-webpack-plugin');
// process.NODE_ENV = 'development'


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
    .webpackConfig({
        plugins: [
            // new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)
            new CompressionPlugin()
        ],
    });
    
mix    
    .copy('resources/assets', '../public_html/assets/')

mix
    .setPublicPath('../public_html')
    .js('resources/js/app.js', 'assets/js/').extract()
    // .sass('resources/sass/light.scss', '../public_html', {}, [tailwindcss('./light.js')])
    // .version();

mix
    .setPublicPath('../public_html')
    .sass('resources/sass/bundle.scss', 'assets/css/')
    // .version();

mix
    .copy('resources/favicon.png', '../public_html')
    // .version()

mix
    .setPublicPath('../public_html')
    .sass('resources/js/plugins/index.scss', 'assets/css/plugins.css')
    // .version();
    
    // .copy('resources/css', '../public_html/styles')
    // .copy('resources/images', '../public_html/assets/images')
    // .copy('resources/fonts', '../public_html/assets/fonts');



// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');
