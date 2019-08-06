var gulp = require('gulp'),
    // svgo = require('gulp-svgo'),
    // sprite = require('gulp-svg-sprite'),
    plumber = require('gulp-plumber'),
    size = require('gulp-size'),
    add = require('gulp-add-src'),
    sass = require('gulp-sass'),
    postcss = require('gulp-postcss'),
    autoprefixer = require('autoprefixer'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    livereload = require('gulp-livereload'),
    sourcemaps = require('gulp-sourcemaps'),
    modernizr = require('gulp-modernizr');

gulp.task('sass', function () {
    var options = {
        sourceMap: true,
        outputStyle: 'compressed',
        includePaths: [
            'node_modules'
        ]
    },
    plugins = [
        autoprefixer({browsers: [
            'Chrome >= 35',
            'Firefox >= 38',
            'Edge >= 12',
            'Explorer >= 10',
            'iOS >= 8',
            'Safari >= 8',
            'Android 2.3',
            'Android >= 4',
            'Opera >= 12'
        ]})
    ];

    return gulp.src('./sass/**/*.scss')
        .pipe(plumber(function (error) {
            console.error(error.message);
            this.emit('end');
        }))
        .pipe(sourcemaps.init())
        .pipe(sass(options))
        .pipe(postcss(plugins))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./css'))
        .pipe(livereload());
});

gulp.task('jshint', function () {
    var scripts = [
        './js/main.js'
    ];

    return gulp.src(scripts)
        .pipe(jshint())
        .pipe(jshint.reporter(stylish));
});

gulp.task('js', function () {
    var head = [
        './js/respond.min.js',
        './js/modernizr.min.js'
    ];

    var main = [
        './js/util.js',
        './js/main.js'
    ];

    var plugins = [
        './node_modules/waypoints/lib/jquery.waypoints.min.js',
        './js/isotope.pkgd.js',
        './js/jquery.magnific-popup.js',
        './js/jquery.fitvids.js',
        // './js/jquery.waypoints.js',
        './js/fastclick.js',
        './js/bootstrap.js',
        './js/jquery.imagesloaded.js'
    ];

    gulp.src(head)
        .pipe(concat('head.min.js'))
        .pipe(gulp.dest('./js'));

    return gulp.src(main)
        .pipe(plumber(function (error) {
            console.error(error.message);
            this.emit('end');
        }))
        .pipe(uglify())
        .pipe(add.prepend(plugins))
        .pipe(size({showFiles: true}))
        .pipe(concat('main.min.js'))
        .pipe(gulp.dest('./js'))
        .pipe(livereload());
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('./sass/**/*.scss', ['sass']);
    gulp.watch('./js/main.js', ['jshint', 'js']);
});

gulp.task('build', ['sass', 'jshint', 'js']);

gulp.task('default', ['build', 'watch' ]);
