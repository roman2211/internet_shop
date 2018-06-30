/**
 * Created by USER on 08.08.2017.
 */
var gulp = require('gulp'),
    less = require('gulp-less'),
    uglifyJs = require('gulp-uglifyjs'),
    BS = require('browser-sync');

var config = {
    style: '../css/'
};

gulp.task('test', function () {
    console.log(111);
});

gulp.task('getStyle', function () {
    gulp.src(config.style + 'style.less')
        .pipe(less())
        .pipe(gulp.dest(config.style));
});