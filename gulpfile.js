const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));


const style = () => {
    return gulp.src('./resources/sass/**/*.scss')
    .pipe(sass())
    .pipe(gulp.dest('./public/css'));
}

const watch = () => {
    gulp.watch('./resources/sass/**/*.scss', style)
}

exports.style = style;
exports.watch = watch;