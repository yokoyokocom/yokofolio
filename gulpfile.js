const gulp = require("gulp"); //gulp使えるようにする。
const sass = require("gulp-sass")(require("sass")); //scssをコンパイル
const sassGlob = require("gulp-sass-glob-use-forward"); //scssでワイルドカード使えるように
const cleanCss = require("gulp-clean-css"); //コンパイル後のcssで無駄な改行空白削除
const postcss = require("gulp-postcss"); //cssの処理拡張
const autoprefixer = require("autoprefixer"); //自動でベンダープレフィックス追加
const notify = require("gulp-notify"); //エラーや完了の通知を表示

function compilseSass(){
  return gulp
    .src("./themes/yokofolio/assets/scss/style.scss")
    .pipe(sassGlob())
    .pipe(sass().on("error",sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(cleanCss())
    .pipe(gulp.dest("./themes/yokofolio/assets/css"))
    .pipe(notify({message: "コンパイル完了"}));
}

function watchFile(){
  gulp.watch("./themes/yokofolio/assets/scss/**/*.scss", compilseSass);
}

exports.default = watchFile;
exports.compilseSass = compilseSass;