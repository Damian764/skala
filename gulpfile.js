const {
    src,
    dest,
    watch,
    series,
    parallel
} = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
// const concat = require('gulp-concat');
const uglify = require('gulp-uglify-es').default;
const imagemin = require('gulp-imagemin');

const files = {
    scssPath: 'src/scss/**/*.scss',
    jsPath: 'src/js/scripts.js',
    imagesPath: 'src/images/*'
}

function scssTask() {
    return src(files.scssPath)
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(sourcemaps.write('.'))
        .pipe(dest('dist/css'));
}

function jsTask() {
    return src(files.jsPath)
        // .pipe(concat('script.js'))
        .pipe(uglify())
        .pipe(dest('dist/js'));
}

function imagesTask() {
    return src(files.imagesPath)
        .pipe(imagemin())
        .pipe(dest('dist/images'))
}

function watchTask() {
    watch([files.scssPath, files.jsPath, files.imagesPath],
        parallel(scssTask, jsTask, imagesTask)
    );
}

exports.default = series(
    parallel(scssTask, jsTask, imagesTask),
    watchTask
);
