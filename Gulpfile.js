'use strict';

var gulp    = require('gulp');
var sass    = require('gulp-sass');
var concat  = require('gulp-concat');
var uglify  = require('gulp-uglify');
var uglifycss  = require('gulp-uglifycss');
var gulpif  = require('gulp-if');
var watch = require('gulp-watch');

var dir = {
    assets: './app/Resources/',
    dist: './web/',
    bower: './bower_components/',
    bootstrapJS: './bower_components/bootstrap-sass/assets/javascripts/bootstrap/'
};

//CSS TASK: write one minified css file out of bootstrap.less and all of my custom less files
gulp.task('sass', function () {
    return gulp.src([
            dir.bower  + 'bootstrap/dist/css/bootstrap.css',
           // dir.assets + 'style/*.scss',
            dir.assets + 'style/scrolling-nav.scss'
        ])
        .pipe(gulpif(/[.]scss/, sass()))
        .pipe(concat('styles.css'))
        .pipe(uglifycss())
        .pipe(gulp.dest(dir.dist + 'css'));
});


gulp.task('scripts', function() {
    gulp.src([
            dir.bower + 'jquery/dist/jquery.min.js',
            dir.bower + 'bootstrap/dist/js/bootstrap.min.js',
            // Bootstrap JS modules
            //dir.bootstrapJS + 'transition.js',
            //...
            // Main JS file
            dir.assets + 'scripts/jquery.easing.min.js',
            dir.assets + 'scripts/scrolling-nav.js'
        ])
        .pipe(concat('script.js'))
        .pipe(uglify())
        .pipe(gulp.dest(dir.dist + 'js'));
});

gulp.task('images', function() {
    gulp.src([
            dir.assets + 'images/**'
        ])
        .pipe(gulp.dest(dir.dist + 'images'));
});

gulp.task('fonts', function() {
    gulp.src([
        dir.bower + 'bootstrap-sass/assets/fonts/**'
        ])
        .pipe(gulp.dest(dir.dist + 'fonts'));
});

// Watch
gulp.task('watch', function() {
    // Watch .scss files
    gulp.watch(dir.assets + 'style/*.scss', ['sass']);
    // Watch .js files
    gulp.watch(dir.assets + 'scripts/*.js', ['scripts']);
    // Watch image files
    gulp.watch(dir.assets + 'images/**', ['images']);

});

// Default task
gulp.task('default', ['watch', 'sass', 'scripts', 'fonts', 'images']);
