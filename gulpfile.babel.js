import { src, dest, watch, series, parallel } from 'gulp'
import yargs from 'yargs'
import sass from 'gulp-sass'
import cleanCss from 'gulp-clean-css'
import gulpif from 'gulp-if'
import postcss from 'gulp-postcss'
import license from 'gulp-header-license'
import sourcemaps from 'gulp-sourcemaps'
import autoprefixer from 'autoprefixer'
import imagemin from 'gulp-imagemin'
import del from 'del'
import webpack from 'webpack-stream'
import wp from 'webpack'
import browserSync from 'browser-sync'
import info from './package.json'
import wpPot from 'gulp-wp-pot'
import countryTable from "./data/countries.json" assert { type: "json" }
import * as data from "countries"
const PRODUCTION = yargs.argv.prod
const server = browserSync.create()
export const serve = (done) => {
	server.init({
		proxy: 'http://localhost/vox', // put your local website link here
	})
	done()
}
export const styles = () => {
	var year = new Date().getFullYear()
	return src(
		'wp-content/themes/Wordpress-gulp-webpack-theme/src/scss/main.scss'
	)
		.pipe(gulpif(!PRODUCTION, sourcemaps.init()))
		.pipe(sass().on('error', sass.logError))
		.pipe(gulpif(PRODUCTION, postcss([autoprefixer])))
		.pipe(gulpif(PRODUCTION, cleanCss({ compatibility: 'ie8' })))
		.pipe(gulpif(!PRODUCTION, sourcemaps.write()))
		.pipe(license('/*Copyright (c) ${year}, Canvilled */', { year: year }))
		.pipe(dest('dist/css'))
		.pipe(server.stream())
}

export const images = () => {
	return src(
		'wp-content/themes/Wordpress-gulp-webpack-theme/src/images/**/*.{jpg,jpeg,png,svg,gif}'
	)
		.pipe(gulpif(PRODUCTION, imagemin()))
		.pipe(dest('dist/images'))
}
export const scripts = () => {
	var year = new Date().getFullYear()
	return src('wp-content/themes/Wordpress-gulp-webpack-theme/src/js/root.js')
		.pipe(
			webpack({
				module: {
					rules: [
						{
							test: /\.js$/,
							use: {
								loader: 'babel-loader',
								options: {
									presets: ['@babel/preset-env'],
								},
							},
						},
					],
				},
				mode: PRODUCTION ? 'production' : 'development',
				devtool: !PRODUCTION ? 'inline-source-map' : false,
				output: {
					filename: 'root.js',
				},
			})
		)
		.pipe(license('/*Copyright (c) ${year}, Canvilled */', { year: year }))
		.pipe(dest('dist/js'))
}

export const copy = () => {
	return src([
		'wp-content/themes/Wordpress-gulp-webpack-theme/src/**/*',
		'!wp-content/themes/Wordpress-gulp-webpack-theme/src/{images,js,scss}',
		'!wp-content/themes/Wordpress-gulp-webpack-theme/src/{images,js,scss}/**/*',
	]).pipe(dest('dist'))
}

export const reload = (done) => {
	server.reload()
	done()
}

export const watchForChanges = () => {
	watch(
		'wp-content/themes/Wordpress-gulp-webpack-theme/src/scss/**/*.scss',
		styles
	)
	watch(
		'wp-content/themes/Wordpress-gulp-webpack-theme/src/images/**/*.{jpg,jpeg,png,svg,gif}',
		series(images, reload)
	)
	watch(
		[
			'wp-content/themes/Wordpress-gulp-webpack-theme/src/**/*',
			'!wp-content/themes/Wordpress-gulp-webpack-theme/src/{images,js,scss}',
			'!wp-content/themes/Wordpress-gulp-webpack-theme/src/{images,js,scss}/**/*',
		],
		series(copy, reload)
	)
	watch(
		'wp-content/themes/Wordpress-gulp-webpack-theme/src/js/**/*.js',
		series(scripts, reload)
	)
	watch('wp-content/themes/Wordpress-gulp-webpack-theme/**/*.php', reload)
}

export const pot = () => {
	return src('wp-content/themes/Wordpress-gulp-webpack-theme/**/*.php')
		.pipe(
			wpPot({
				domain: '_themename',
				package: info.name,
			})
		)
		.pipe(
			dest(
				`wp-content/themes/Wordpress-gulp-webpack-theme/languages/${info.name}.pot`
			)
		)
}

export const clean = () => del(['dist/js', 'dist/css/main.scss', 'dist/images'])

export const dev = series(
	clean,
	parallel(styles, images, copy, scripts),
	serve,
	watchForChanges
)
export const build = series(clean, parallel(styles, images, copy, scripts), pot)
export default dev
