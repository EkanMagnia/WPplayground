'use strict';

var gulpfile = require('gulp');
var sass = require('gulp-sass');

sass.compiler = require('node-sass');

gulpfile.task('sass', function () {
    return gulpfile.src('./assets/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpfile.dest('./assets/css'));
});

gulpfile.task('sass:watch', function () {
    gulpfile.watch('./assets/sass/**/*.scss', ['sass']);
});
