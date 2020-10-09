//GENERAL modules
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const del = require("del");
const env =
  typeof process.env.NODE_ENV == "undefined"
    ? "development"
    : process.env.NODE_ENV;

//GULP modules
const gulp = require("gulp");
const sourcemaps = require("gulp-sourcemaps");
const plumber = require("gulp-plumber");
const sass = require("gulp-sass");
var archiver = require("gulp-archiver");
const gulpif = require("gulp-if");
const concat = require("gulp-concat");
const postcss = require("gulp-postcss");
const terser = require("gulp-terser");
var strip = require("gulp-strip-comments");
const cleanCSS = require("gulp-clean-css"); //https://github.com/scniro/gulp-clean-css#readme

// Clean assets
function clean() {
  return del(["./package/*", "./dist/*", "./custom_style.css"]);
}

function copy_assets(done) {
  gulp
    .src([
      "./assets/*",
      // './video/*',
      "./assets/*/*",
      "./assets/*/*/*",
    ])
    // .pipe(gulp.dest("./dist/assets/"));
    .pipe(gulp.dest("./dist/assets")) // Dev normal CSS
    .pipe(gulpif(env === "package", gulp.dest("./package/dist/assets")));

  done();
}

// Compile JS files
function js(done) {
  console.log("JS + " + env);
  gulp
    .src([
      "node_modules/jquery/dist/jquery.min.js",
      "node_modules/jquery-validation/dist/jquery.validate.min.js",
      "node_modules/aos/dist/aos.js",
      "node_modules/moment/min/moment.min.js",
      "node_modules/slick-carousel/slick/slick.min.js",
      "./js/*/*.js",
      "./js/*.js",
    ])
    .pipe(gulpif(env === "development", sourcemaps.init()))
    .pipe(plumber()) //ignore js errors
    .pipe(strip()) // remove comments
    .pipe(concat("main.js")) // append to one main fill
    .pipe(
      gulpif(
        env === "production" || env === "package",
        terser({ mangle: true, compress: true }),
        terser({ mangle: false, compress: false })
      )
    )
    .pipe(gulpif(env === "development", sourcemaps.write(".")))
    .pipe(gulp.dest("./dist/js")) // Dev normal CSS
    .pipe(gulpif(env === "package", gulp.dest("./package/dist/js")));
  done();
}

// Compile SASS + CSS files
function css(done) {
  gulp
    .src([
      "./style/css/*.css",
      "node_modules/bootstrap/dist/css/bootstrap-grid.css",
      "node_modules/aos/dist/aos.css",
      "node_modules/slick-carousel/slick/slick.css",
      "./style/sass/style.sass",
    ])
    .pipe(gulpif(env === "development", sourcemaps.init()))
    .pipe(plumber())
    .pipe(sass({ outputStyle: "expanded" }))
    .pipe(concat("custom_style.css")) // append to one main file
    .pipe(
      gulpif(
        env === "production" || env === "package",
        postcss([
          cssnano({
            comments: { removeAll: true },
          }),
          autoprefixer(),
        ])
      )
    )
    .pipe(
      gulpif(
        env === "production" || env === "package",
        cleanCSS({ level: { 1: { specialComments: false } } })
      )
    )
    .pipe(gulpif(env === "development", sourcemaps.write(".")))
    .pipe(gulp.dest("./dist/style")) // Dev normal CSS
    .pipe(gulpif(env === "package", gulp.dest("./package/dist/style")));

  done();
}

// Watch files
function watchFiles(cb) {
  //console.log('WATCH FILES...');
  gulp.watch(
    ["./style/sass/*.sass", "./style/sass/*/*.sass"],
    gulp.series(css)
  );
  gulp.watch(["./js/*.js", "./js/*/*.js"], gulp.series(js));
  cb();
}

function build_package(done) {
  gulp.src(["./docs/**"]).pipe(gulp.dest("./package/docs"));

  gulp.src(["./api/**"]).pipe(gulp.dest("./package/api"));

  gulp.src(["./assets/**"]).pipe(gulp.dest("./package/assets"));

  gulp.src(["./partials/**"]).pipe(gulp.dest("./package/partials"));

  gulp
    .src([
      "./thankyou.php",
      "./details-received.php",
      "./employer-recruitment.php",
      "./old_index_v2.php",
      "./steps.php",
      "./recruitment-first.php",
      "./employer-thankyou.php",
      "./old_index.php",
      "./index.php",
    ])
    .pipe(gulp.dest("./package"));

  done();
}

function zip_package(done) {
  gulp
    .src(["./package/**"])
    .pipe(archiver("package.zip"))
    .pipe(gulp.dest("./"));
  done();
}

exports.js = js;
exports.css = css;
exports.copy_assets = copy_assets;
exports.watch = gulp.parallel(watchFiles);

exports.package = gulp.task(
  "package",
  gulp.series(clean, gulp.parallel(css, js, copy_assets), build_package)
);
exports.zipup = gulp.task("zipup", gulp.series(zip_package));

exports.default = gulp.series(clean, gulp.parallel(css, js, copy_assets));
