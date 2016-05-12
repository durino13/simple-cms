var gulp = require('gulp');
var concat = require('gulp-concat');

// Concatenate all javascript files
gulp.task('concat-js', function() {
    gulp.src([
        'node_modules/jquery/dist/jquery.min.js',
        'vendor/almasaeed2010/adminlte/dist/js/app.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js'
    ]).pipe(concat('all.js'))
     .pipe(gulp.dest('public/js'));
});

// Concatenate all css
gulp.task('concat-css', function() {
    gulp.src([
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css',
        'vendor/almasaeed2010/adminlte/dist/css/skins/_all-skins.min.css'
    ]).pipe(concat('all.css'))
        .pipe(gulp.dest('public/css'));
});

// Build js & css files
gulp.task('default', ['concat-js', 'concat-css']);