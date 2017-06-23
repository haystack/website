var gulp = require("gulp");
var rename = require("gulp-rename");
var postcss = require('gulp-postcss');

var svg = function (css, opts) {
	css.replaceValues(/\bsvg\s*\([\S\s]+?'\)/g, {
		fast: "svg",
		props: ["background", "background-image", "content"]
	}, string => {
		return string.replace(/\bsvg\s*\((\d+), (\d+), '/, `url('data:image/svg+xml,
	<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox="0 0 $1 $2">
	`)
			.replace(/'\)$/, `
	</svg>')`)
			.replace(/\n/g, "\\\n");
	});
};

gulp.task('css', function () {
	return gulp.src(["**/*.src.css", "!node_modules/**"])
		.pipe(postcss([
			require('postcss-nesting')(),
			require("postcss-selector-matches")({
				lineBreak: true
			}),
			require('autoprefixer')({
				browsers: ["last 2 versions"]
			}),
			require("postcss-custom-properties")({
				preserve: false
			}),
			svg
		]))
		.pipe(rename({ extname: "" }))
		.pipe(rename({ extname: ".css" }))
		.pipe(gulp.dest('.'));
});


gulp.task("watch", function() {
	gulp.watch(["**/*.src.css"], ["css"]);
});

gulp.task("default", ["css"]);
