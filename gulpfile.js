var gulp = require('gulp');
const {
    series,
    parallel,
    src,
    dest,
    task,
    watch,
    start
} = gulp;

// Requires the gulp-sass plugin
var sass = require('gulp-sass');
let cleanCSS = require('gulp-clean-css');
const webpack = require('webpack-stream');
const minify = require('gulp-minify');

task('compileJavascript', async function () {
    return src('resources/js/app.js')
        .pipe(webpack({
            output: {
                filename: 'app.js'
            }
        }))
        .pipe(dest('assets/js'));
});

task('compileSass', async function () {
    return src('resources/scss/app.scss')
        .pipe(sass({
            includePaths: ['./node_modules/']
        }))
        .pipe(dest('assets/css'));
});

task('production', async function () {
    return parallel(
        function () {
            return src('resources/scss/app.scss')
                .pipe(sass({
                    includePaths: ['./node_modules/']
                }))
                .pipe(cleanCSS())
                .pipe(dest('assets/css'));
        },
        function () {
            return src('resources/js/app.js')
                .pipe(webpack({
                    output: {
                        filename: 'app.js'
                    }
                }))
                .pipe(minify())
                .pipe(dest('assets/js'));
        }
    )
});

task('watch', function () {
    watch('resources/scss/*.scss', parallel('compileSass'));
    watch('resources/js/app.js', parallel('compileJavascript'));
});

task('default', async function () {
    return parallel('compileSass', 'compileJavascript')
});