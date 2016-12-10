// The input SCSS files and the SCSS output path
var scssInput = [
	'scss/style.scss',
	'scss/print.scss'
	];
var scssOutput = 'wp/wp-content/themes/graders/css';

// Start everything up.
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');


// Watch SASS.
gulp.task('sass', function() {
  return gulp
    .src(scssInput)
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(scssOutput))
});


gulp.task('watch', ['sass'], function (){
  gulp.watch('scss/**/*.scss', ['sass']); 
});