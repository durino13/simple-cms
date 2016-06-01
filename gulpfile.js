var gulp = require('gulp');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var merge = require('merge-stream');
var watch = require('gulp-watch');
var source = require('vinyl-source-stream');
var webpack = require('webpack');
var gulpWebpack = require('webpack-stream');
var named = require('vinyl-named');

// Copy fonts to public directory ..
gulp.task('fonts', function() {
    gulp.src([
        'node_modules/font-awesome/fonts/**/*'
    ]).pipe(gulp.dest(
        'public/fonts'
    ))
});

gulp.task('js', function() {
        return gulp.src('resources/assets/js/common.js')
        .pipe(named())
        .pipe(gulpWebpack(require('./webpack.config.js')))
        .pipe(gulp.dest('public/js'));
});

// Concatenate all css
gulp.task('css', function() {
    var appCssStream, vendorCssStream;

    appCssStream = gulp.src(
            'resources/assets/sass/app.scss'
        )
        .pipe(sass({
            errLogToConsole: true
        }));

    vendorCssStream = gulp.src([
            'node_modules/bootstrap/dist/css/bootstrap.min.css',
            'node_modules/admin-lte/dist/css/AdminLTE.min.css',
            'node_modules/admin-lte/dist/css/skins/_all-skins.min.css',
            'node_modules/font-awesome/css/font-awesome.min.css',
            'node_modules/datatables.net-dt/css/jquery.dataTables.css'
        ]);

    return merge(appCssStream, vendorCssStream)
        .pipe(concat('all.css'))
        .pipe(gulp.dest('public/css'));
});


gulp.task('watch', function() {
    gulp.watch('resources/assets/js/**/*',['js']);
    gulp.watch('resources/assets/sass/**/*',['css']);
})

gulp.task('build', ['fonts', 'js', 'css']);
gulp.task('default', ['js', 'css']);