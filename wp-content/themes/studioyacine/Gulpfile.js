"use strict";

// Load plugins
const autoprefixer = require("autoprefixer");
const browsersync = require("browser-sync").create();
const cp = require("child_process");
const cssnano = require("cssnano");
const del = require("del");
const gulp = require("gulp");
const imagemin = require("gulp-imagemin");
const newer = require("gulp-newer");
const plumber = require("gulp-plumber");
const postcss = require("gulp-postcss");
const uglify = require("gulp-uglify");
const rename = require("gulp-rename");
const sass = require("gulp-sass");
const globbing = require("gulp-css-globbing");
const concat = require("gulp-concat");

const onError = (err) => {
    console.log(err);
};

// BrowserSync
function browserSync(done) {
    browsersync.init({
        proxy: "opendata.local"
    });
    done();
}

// BrowserSync Reload
function browserSyncReload(done) {
    browsersync.reload();
    done();
}

// Clean assets
function clean() {
    return del(["./library/css/style.css"]);
}

// CSS task
function css() {
    return gulp
        .src("./library/scss/**/*.scss")
        .pipe(globbing({ extensions: [".scss"] }))
        .pipe(plumber({ errorHandler: onError }))
        .pipe(sass({ outputStyle: "expanded" }).on("error", sass.logError))
        .pipe(gulp.dest("./library/css/"))
        .pipe(rename({ suffix: ".min", basename: "main", extname: ".css" }))
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(gulp.dest("./dist/css/"))
        .pipe(browsersync.stream());
}

// Transpile, concatenate and minify scripts
function scripts() {
    return gulp
        .src([
            // "./library/js/cookie-consent-box.min.js",
            // "./library/js/vendor/chocolat.js",
            "./library/js/scripts.js"
        ])
        .pipe(plumber({ errorHandler: onError }))
        .pipe(
            uglify({
                mangle: false,
                compress: {
                    hoist_funs: false
                }
            })
        )
        .pipe(concat("all.min.js"))
        .pipe(gulp.dest("./dist/js/"))
        .pipe(browsersync.stream());
}

// Copy jQuery
function wordpressAssets() {
    return gulp
        .src(["./library/js/vendor/jquery.min.js"])
        .pipe(gulp.dest("./dist/js/"));
}

// Copy Images
function fonts() {
    return gulp
        .src(["./library/fonts/" + "*.{eot,ttf,woff,woff2}"])
        .pipe(gulp.dest("./dist/fonts/"));
}

// Optimize Images
function images() {
    return gulp
        .src("./library/img/**/*.{gif,jpg,png,svg}")
        .pipe(newer("./dist/img/*"))
        .pipe(
            imagemin([
                imagemin.gifsicle({ interlaced: true }),
                imagemin.jpegtran({ progressive: true }),
                imagemin.optipng({ optimizationLevel: 5 }),
                imagemin.svgo({
                    plugins: [
                        {
                            removeViewBox: false,
                            collapseGroups: true
                        }
                    ]
                })
            ])
        )
        .pipe(gulp.dest("./dist/img/"));
}

// Watch files
function watchFiles() {
    gulp.watch("./library/scss/**/*", css);
    gulp.watch("./library/js/**/*", gulp.series(scripts));
    gulp.watch("./library/img/**/*.{gif,jpg,png,svg}", images);

    gulp.watch(
        [
            "./*",
            "./blocks/**/*",
            "./templates/**/*",
            "./functions/*",
            "./pages/*"
        ],
        gulp.series(browserSyncReload)
    );
}

// define tasks
const js = gulp.series(scripts);
const build = gulp.series(
    clean,
    gulp.parallel(fonts, wordpressAssets),
    gulp.parallel(css, js, images)
);
const watch = gulp.parallel(build, watchFiles, browserSync);

// export tasks
exports.images = images;
exports.fonts = fonts;
exports.wordpressAssets = wordpressAssets;
exports.css = css;
exports.clean = clean;
exports.js = js;
exports.build = build;
exports.watch = watch;
exports.default = build;
