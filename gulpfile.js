/**
 *
 *  Abraham
 *
 */

'use strict';

// Include Gulp & Tools We'll Use
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var del = require('del');
var minifyCSS = require('gulp-minify-css');
var rename = require('gulp-rename');
var composer = require('gulp-composer');
var csscomb = require('gulp-csscomb');
var runSequence = require('run-sequence');
var browserSync = require('browser-sync');
var reload = browserSync.reload;

var AUTOPREFIXER_BROWSERS = [
  'ie >= 9',
  'ie_mob >= 10',
  'ff >= 30',
  'chrome >= 34',
  'safari >= 7',
  'opera >= 23',
  'ios >= 6',
  'android >= 4.3',
  'bb >= 10'
];

gulp.task('composer', function () {
    composer({ cwd: './', bin: 'composer' });
});

// Optimize Images
gulp.task('images', function () {
  return gulp.src('assets/flagship/images/**/*')
    .pipe($.imagemin({
      progressive: true,
      interlaced: true,
      removeUselessStrokeAndFill: true,
      removeEmptyAttrs: true
    }))
    .pipe(gulp.dest('assets/images'))
    .pipe($.if('*.svg', $.rename({
			prefix: 'svg-',
			extname: '.php'
		})))
    .pipe(gulp.dest('assets/svg'));
});

// Copy hybrid-core to extras
gulp.task('hybrid', function () {
  return gulp.src([
  	'assets/composer/justintadlock/hybrid-core/**/*'
  	])
    .pipe(gulp.dest('hybrid-core'));
});

// Copy customizer-library to vendors
// gulp.task('customizer', function () {
//   return gulp.src([
//   	'vendor/devinsays/customizer-library/**/*'
//   	])
//     .pipe(gulp.dest('inc/vendors/customizer-library'));
// });

// Copy customizer-library to vendors
gulp.task('flagship', function () {
  return gulp.src([
  	'assets/composer/flagshipwp/flagship-library/**/*'
  	])
    .pipe(gulp.dest('includes/vendor/flagship-library'));
});

// Copy customizer-library to vendors
gulp.task('tha', function () {
  return gulp.src([
  	'assets/composer/zamoose/themehookalliance/tha-theme-hooks.php'
  	])
    .pipe(gulp.dest('includes/vendor'));
});

// Compile and Automatically Prefix Stylesheets
gulp.task('styles', function () {
  return gulp.src([
    'assets/flagship/scss/*.scss',
    'assets/flagship/scss/**/*.css',
    'assets/flagship/scss/style.scss'
  ])
    .pipe($.changed('styles', {extension: '.scss'}))
    .pipe($.sass({
      precision: 10
    }))
    .on('error', console.error.bind(console))
    .pipe($.autoprefixer({browsers: AUTOPREFIXER_BROWSERS}))
    .pipe(csscomb())
    .pipe(gulp.dest('./'))
    //Concatenate And Minify Styles
    .pipe(rename({ suffix: '.min' }))
    .pipe(minifyCSS())
    .pipe(gulp.dest('./'));
});

// Concatenate And Minify JavaScript
gulp.task('scripts', function() {
  return gulp.src([
  	'assets/flagship/js/**/*.js'
  	])
    .pipe($.concat('main.js'))
    .pipe(gulp.dest('js'))
    .pipe(rename({ suffix: '.min' }))
    .pipe($.uglify({preserveComments: 'some'}))
    // Output Files
    .pipe(gulp.dest('assets/js'));
});

// Build and serve the output
gulp.task('serve', ['default'], function () {
  browserSync({
    proxy: "local.wordpress.dev"
    //proxy: "local.wordpress-trunk.dev"
    //proxy: "doc-beta.dev"
     });

  gulp.watch(['**/*.php'], reload);
  gulp.watch(['assets/flagship/scss/**/*.{scss,css}'], ['styles', reload]);
  gulp.watch(['assets/flagship/js/**/*.js'], reload);
  gulp.watch(['assets/flagship/images/**/*'], reload);
});

// Build Production Files, the Default Task
gulp.task('default', function (cb) {
  runSequence('composer', ['styles', 'scripts', 'images', 'hybrid', 'flagship', 'tha'], cb);
});