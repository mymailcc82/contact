var gulp          = require('gulp');
var sass          = require('gulp-sass');
var autoprefixer  = require('gulp-autoprefixer');
var concat        = require('gulp-concat');
var uglify        = require('gulp-uglify');
var imagemin      = require('gulp-imagemin');
var pngquant      = require('imagemin-pngquant');
var browserSync   = require('browser-sync');
var minify        = require('gulp-minify');
var sourcemaps    = require('gulp-sourcemaps');
var plumber       = require('gulp-plumber');

/* ---------- Browser-Sync ---------- */
gulp.task('browser-sync', function () {
    browserSync({
        proxy: "http://shokokaigisho.test/"
    });
});

/* ---------- Browser-Reload ---------- */
gulp.task('bs-reload', function () {
    browserSync.reload();
});

/* ---------- Sass ---------- */
var styleSrc      = 'src/sass/style.scss',   //sass source
  styleDest     = '';        //sass destination
  sassOptions   = {
    errLogToConsole: false,
    outputStyle: 'compact'      //compact / expanded / compressed
  };
  autoprefixerOptions = {
    browsers: ['last 10 versions', '> 1%', 'Android 4.1 - 4.3']
  };

gulp.task('sass', function () {
  return gulp
    .src(styleSrc)
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(sass(sassOptions).on('error', sass.logError))
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(styleDest))
    .pipe(browserSync.reload({stream: true}));
});

/* ---------- Javascript-Minify ---------- */
var jsPath = 'src/js/';
gulp.task('scripts', function () {
  var jsFiles = [
                  jsPath+"iscroll.js",
                  jsPath+"drawer.js",
                  jsPath+"slick.js",
                  jsPath+"velocity.js",
                  jsPath+"lightbox.js",
                  jsPath+"bxslider.min.js",
                  jsPath+"matchHeight.js",
                  jsPath+"bootstrap-select.js",
                  jsPath+"fakeLoader.js",
                  jsPath+"script.js",
                ];
    gulp.src(jsFiles)
    .pipe(plumber())
    .pipe(concat('all.min.js')) //JSを結合
    .pipe(uglify())
    .pipe(gulp.dest('assets/js'))
    .pipe(browserSync.reload({stream: true}));
});
/* ---------- Images-Minify ---------- */
gulp.task('images', function () {
	gulp.src('src/img/**/*')
    .pipe(plumber())
    .pipe(imagemin({
      optimizationLevel: 5,
      progressive: true,
      svgoPlugins: [{removeUnknownsAndDefaults: false}, {cleanupIDs: false}],
      use: [pngquant({quality: '60-70', speed: 1})]
    }))
		.pipe(gulp.dest('assets/img'))
    .pipe(browserSync.reload({stream: true}));
});

/* ---------- Default ---------- */
gulp.task('default', ['sass','scripts','browser-sync'], function () {
  gulp.watch("src/sass/**/*.scss", ['sass']);
  gulp.watch("src/js/**/*.js", ['scripts']);
  gulp.watch("./**/*.php", ['bs-reload']);
});
