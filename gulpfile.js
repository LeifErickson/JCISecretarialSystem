var elixir = require('laravel-elixir');
var gulp = require('gulp');
var rename = require('gulp-rename');

elixir(function(mix) {
 mix
     .phpUnit()

    /**
     * Copy needed files from /node directories
     * to /public directory.
     */
     .copy(
       'node_modules/font-awesome/fonts',
       'public/build/fonts/font-awesome'
     )
     .copy(
       'node_modules/bootstrap-sass/assets/fonts/bootstrap',
       'public/build/fonts/bootstrap'
     )
     .copy(
       'node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
       'public/js/vendor/bootstrap'
     )

     /**
      * Process frontend SCSS stylesheets
      */
     .sass([
        'frontend/app.scss',
        'plugin/sweetalert/sweetalert.scss'
     ], 'resources/assets/css/frontend/app.css')

     /**
      * Combine pre-processed frontend CSS files
      */
     .styles([
        'frontend/app.css'
     ], 'public/css/frontend.css')

     /**
      * Combine frontend scripts
      */
     .scripts([
        'plugin/sweetalert/sweetalert.min.js',
        'plugins.js',
        'frontend/app.js'
     ], 'public/js/frontend.js')

     /**
      * Process backend SCSS stylesheets
      */
     .sass([
         'backend/app.scss',
         'backend/plugin/toastr/toastr.scss',
         'plugin/sweetalert/sweetalert.scss'
     ], 'resources/assets/css/backend/app.css')

     /**
      * Combine pre-processed backend CSS files
      */
     .styles([
         'backend/app.css'
     ], 'public/css/backend.css')

     /**
      * Combine backend scripts
      */
     .scripts([
         'plugin/sweetalert/sweetalert.min.js',
         'plugins.js',
         'backend/app.js',
         'backend/plugin/toastr/toastr.min.js',
         'backend/custom.js'
     ], 'public/js/backend.js')

    /**
      * Apply version control
      */
     .version(["public/css/frontend.css", "public/js/frontend.js", "public/css/backend.css", "public/js/backend.js"]);
});

gulp.task("copyfiles", function() {

  // Copy jQuery, Bootstrap, and FontAwesome
  gulp.src("vendor/bower_dl/jquery/dist/jquery.js")
      .pipe(gulp.dest("resources/assets/js/"));

  gulp.src("vendor/bower_dl/bootstrap/less/**")
      .pipe(gulp.dest("resources/assets/less/bootstrap"));

  gulp.src("vendor/bower_dl/bootstrap/dist/js/bootstrap.js")
      .pipe(gulp.dest("resources/assets/js/"));

  gulp.src("vendor/bower_dl/bootstrap/dist/fonts/**")
      .pipe(gulp.dest("public/assets/fonts"));

  gulp.src("vendor/bower_dl/fontawesome/less/**")
      .pipe(gulp.dest("resources/assets/less/fontawesome"));

  gulp.src("vendor/bower_dl/fontawesome/fonts/**")
      .pipe(gulp.dest("public/assets/fonts"));

  // Copy datatables
  var dtDir = 'vendor/bower_dl/datatables-plugins/integration/';

  gulp.src("vendor/bower_dl/datatables/media/js/jquery.dataTables.js")
      .pipe(gulp.dest('resources/assets/js/'));

  gulp.src(dtDir + 'bootstrap/3/dataTables.bootstrap.css')
      .pipe(rename('dataTables.bootstrap.less'))
      .pipe(gulp.dest('resources/assets/less/others/'));

  gulp.src(dtDir + 'bootstrap/3/dataTables.bootstrap.js')
      .pipe(gulp.dest('resources/assets/js/'));

  // Copy selectize
  gulp.src("vendor/bower_dl/selectize/dist/css/**")
      .pipe(gulp.dest("public/assets/selectize/css"));

  gulp.src("vendor/bower_dl/selectize/dist/js/standalone/selectize.min.js")
      .pipe(gulp.dest("public/assets/selectize/"));

  // Copy pickadate
  gulp.src("vendor/bower_dl/pickadate/lib/compressed/themes/**")
      .pipe(gulp.dest("public/assets/pickadate/themes/"));

  gulp.src("vendor/bower_dl/pickadate/lib/compressed/picker.js")
      .pipe(gulp.dest("public/assets/pickadate/"));

  gulp.src("vendor/bower_dl/pickadate/lib/compressed/picker.date.js")
      .pipe(gulp.dest("public/assets/pickadate/"));

  gulp.src("vendor/bower_dl/pickadate/lib/compressed/picker.time.js")
      .pipe(gulp.dest("public/assets/pickadate/"));

});

/**
 * Default gulp is to run this elixir stuff
 */
elixir(function(mix) {

  // Combine scripts
  mix.scripts([
      'js/jquery.js',
      'js/bootstrap.js',
      'js/jquery.dataTables.js',
      'js/dataTables.bootstrap.js'
    ],
    'public/assets/js/admin.js',
    'resources/assets'
);

  // Compile Less
  mix.less('admin.less', 'public/assets/css/admin.css');
});