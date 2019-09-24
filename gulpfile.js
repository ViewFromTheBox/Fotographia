// Grab our gulp packages
var gulp  = require('gulp'),
    gutil = require('gulp-util'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    sourcemaps = require('gulp-sourcemaps'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    plumber = require('gulp-plumber')
    
// Compile Sass, Autoprefix and minify
gulp.task('styles', function() {
  return gulp.src('./assets/scss/**/*.scss')
    .pipe(plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
    }))
    .pipe(sass())
    .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
    .pipe(gulp.dest('./assets/css/'))     
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('./assets/css/'))
});    
    
// JSHint, concat, and minify JavaScript
gulp.task('scripts', function() {
  return gulp.src([	
           // Grab your custom scripts
  		  './assets/js/site/*.js'
  ])
    .pipe(plumber())
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('./assets/js/min'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('./assets/js/min'))
});

gulp.task('foundation-js', function() {
    return gulp.src([

        // Foundation core - needed if you want to use any of the components below
        './vendor/foundation-sites/js/foundation.core.js',
        './vendor/foundation-sites/js/foundation.util.*.js',

        // Pick the components you need in your project
        './vendor/foundation-sites/js/foundation.abide.js',
        './vendor/foundation-sites/js/foundation.accordion.js',
        './vendor/foundation-sites/js/foundation.accordionMenu.js',
        './vendor/foundation-sites/js/foundation.drilldown.js',
        './vendor/foundation-sites/js/foundation.dropdown.js',
        './vendor/foundation-sites/js/foundation.dropdownMenu.js',
        './vendor/foundation-sites/js/foundation.equalizer.js',
        './vendor/foundation-sites/js/foundation.interchange.js',
        './vendor/foundation-sites/js/foundation.magellan.js',
        './vendor/foundation-sites/js/foundation.offcanvas.js',
        './vendor/foundation-sites/js/foundation.orbit.js',
        './vendor/foundation-sites/js/foundation.responsiveMenu.js',
        './vendor/foundation-sites/js/foundation.responsiveToggle.js',
        './vendor/foundation-sites/js/foundation.reveal.js',
        './vendor/foundation-sites/js/foundation.slider.js',
        './vendor/foundation-sites/js/foundation.sticky.js',
        './vendor/foundation-sites/js/foundation.tabs.js',
        './vendor/foundation-sites/js/foundation.toggler.js',
        './vendor/foundation-sites/js/foundation.tooltip.js',
    ])
        .pipe(concat('foundation.js'))
        .pipe(gulp.dest('./js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest('./js'))
});

// Create a default task 
gulp.task('default', function() {
  gulp.start('styles', 'scripts', 'foundation-js');
});

// Watch files for changes
gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('./assets/scss/**/*.scss', ['styles']);

  // Watch site-js files
  gulp.watch('./assets/js/site/*.js', ['scripts']);
  
  // Watch foundation-js files
  gulp.watch('./bower_components/foundation/js/foundation/*.js', ['foundation-js']);

});
