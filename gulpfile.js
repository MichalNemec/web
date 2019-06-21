var gulp = require('gulp'),
    concat  = require('gulp-concat'),
    autoprefixer    = require('gulp-autoprefixer'),
    sass = require('gulp-sass');

//task para o sass

var paths = {
    styles: {
        src: './web/sass/**/*.scss',
        dest: './web/css'
    }
};

function styles() {
    return gulp
        .src(paths.styles.src, {
            sourcemaps: true
        })
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('main.min.css'))
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 2 version', '> 5%'],
            cascade: false
        }))
        .pipe(gulp.dest(paths.styles.dest));
}

function watch() {
    gulp.watch(paths.styles.src, styles);
}

var build = gulp.parallel(styles, watch);
gulp.task(build);
gulp.task('default', build);