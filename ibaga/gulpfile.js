// a gulp task to clean up vendor folder files for production machine. 

var del = require('del');
var gulp = require('gulp');
var zip = require('gulp-zip');
const {phpMinify} = require('@cedx/gulp-php-minify');


gulp.task('vendor:cleanup', function () {
    return gulp.src(
        [
            'vendor/**/*',
            '!vendor/**/*.md',
            '!vendor/**/*.sh',
            '!vendor/**/*.yml',
            '!vendor/**/*.txt',
            '!vendor/**/*.pdf',
            '!vendor/**/LICENSE',
            '!vendor/**/NOTICE',
            '!vendor/**/CHANGES',
            '!vendor/**/README',
            '!vendor/**/VERSION',
            '!vendor/**/composer.json',
            '!vendor/**/.gitignore',
            '!vendor/**/doc',
            '!vendor/**/doc/**',
            '!vendor/**/docs',
            '!vendor/**/docs/**',
            '!vendor/**/.github',
            '!vendor/**/.github/**',
            '!vendor/**/test',
            '!vendor/**/test/**',
            '!vendor/**/tests',
            '!vendor/**/Tests',
            '!vendor/**/tests/**',
            '!vendor/**/Tests/**',
            '!vendor/**/unitTests',
            '!vendor/**/unitTests/**',
            '!vendor/**/.git',
            '!vendor/**/.git/**',
            '!vendor/**/examples',
            '!vendor/**/examples/**',
            '!vendor/**/build.xml',
            '!vendor/**/phpunit.xml',
            '!vendor/**/phpunit.xml.dist'
             // if you thing there is more let me know.
        ],
        {base: '.'}
    ).pipe(gulp.dest('./tempendor'))
})
gulp.task('vendor:minify', () => gulp.src('tempendor/vendor/**/*.php', {read: false})
  .pipe(phpMinify({silent: true}))
  .pipe(zip('vendor.zip'))
  .pipe(gulp.dest('.'))
);

gulp.task('clean', () => del(['./tempendor']))

exports.vendorAll = series('clean', 'vendor:cleanup', 'vendor:minify', 'clean');