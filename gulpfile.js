const gulp = require("gulp"); //gulp使えるようにする。
const sass = require("gulp-sass")(require("sass")); //scssをコンパイル
const sassGlob = require("gulp-sass-glob-use-forward"); //scssでワイルドカード使えるように
const cleanCss = require("gulp-clean-css"); //コンパイル後のcssで無駄な改行空白削除
const postcss = require("gulp-postcss"); //cssの処理拡張
const autoprefixer = require("autoprefixer"); //自動でベンダープレフィックス追加
const esbuild = require("esbuild");

function compilseSass(){
  return gulp
    .src("./themes/yokofolio/assets/scss/style.scss")
    .pipe(sassGlob())
    .pipe(sass().on("error",sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(cleanCss())
    .pipe(gulp.dest("./themes/yokofolio/assets/css"))
}

function compilseTs(){
  return esbuild.build({
    entryPoints: ["./themes/yokofolio/assets/ts/main.ts"],
    outfile: "./themes/yokofolio/assets/js/main.js",
    bundle: true,
    minify: true,
    sourcemap: false,
    target: ["es2017"],
    platform: "browser",
  })
  .then(() => {
    console.log("##### JSコンパイル完了 #####");
  })
  .catch((err) => {
    const errorMessage = err.errors && err.errors[0] ? err.errors[0].text : err.message;
    console.error("[Gulp] JSコンパイルエラー:", errorMessage);
    return Promise.reject(err);
  });
}

function watchFile(){
  gulp.watch("./themes/yokofolio/assets/scss/**/*.scss", compilseSass);
  gulp.watch("./themes/yokofolio/assets/ts/**/*.ts", compilseTs);
}

exports.compilseSass = compilseSass;
exports.compilseTs = compilseTs;
exports.build = gulp.series(compilseSass, compilseTs);
exports.default = watchFile;