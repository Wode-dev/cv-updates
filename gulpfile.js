var gulp = require('gulp');
const {
    parallel,
    src,
    dest,
    task
} = gulp;

// Requires the gulp-sass plugin
var sass = require('gulp-sass');
let cleanCSS = require('gulp-clean-css');
const webpack = require('webpack-stream');
const minify = require('gulp-minify');

task('compileJavascript', async function () {
    return src('resources/js/app.js')
        .pipe(webpack())
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
            return src('assets/scss/app.scss')
                .pipe(sass({
                    includePaths: ['./node_modules/']
                }))
                .pipe(cleanCSS())
                .pipe(dest('./'));
        },
        function () {
            return src('resources/js/app.js')
                .pipe(webpack())
                .pipe(minify())
                .pipe(dest('assets/js'));
        }
    )
});

task('default', async function () {
    return parallel('compileSass', 'compileJavascript')
});