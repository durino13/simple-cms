var gulp = require('gulp');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var merge = require('merge-stream');

// Copy fonts to public directory ..
gulp.task('fonts', function() {
    gulp.src([
        'node_modules/font-awesome/fonts/**/*'
    ]).pipe(gulp.dest(
        'public/fonts'
    ))
});

// Concatenate all javascript files
gulp.task('js', function() {
    gulp.src([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/admin-lte/dist/js/app.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js'
    ]).pipe(concat('all.js'))
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
                'node_modules/font-awesome/css/font-awesome.min.css'
            ]);

        return merge(appCssStream, vendorCssStream)
            .pipe(concat('all.css'))
            .pipe(gulp.dest('public/css'));
});

gulp.task('build', ['fonts', 'css']);
gulp.task('default', ['js', 'css']);