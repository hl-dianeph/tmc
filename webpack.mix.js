let mix = require('laravel-mix');





/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
	// .js('resources/assets/js/app.js', 'public/js')
	.js('resources/assets/libs/bower/breakpoints.js/dist/breakpoints.min.js', 'public/js')
	// .js([
	// 	'resources/assets/libs/bower/jquery/dist/jquery.js',
	// 	'resources/assets/libs/bower/jquery-ui/jquery-ui.min.js',
	// 	'resources/assets/libs/bower/jQuery-Storage-API/jquery.storageapi.min.js',
	// 	'resources/assets/libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js',
	// 	'resources/assets/libs/bower/jquery-slimscroll/jquery.slimscroll.js',
	// 	'resources/assets/libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js',
	// 	'resources/assets/libs/bower/PACE/pace.min.js',
	// ], 'public/js/core.min.js')
	// .js([
	// 	'resources/assets/js/library.js',
	// 	'resources/assets/js/plugins.js',
	// 	'resources/assets/js/app.js',
	// ], 'public/js/app.min.js')
	.js('resources/assets/libs/bower/moment/moment.js', 'public/js')
	.js('resources/assets/libs/bower/fullcalendar/dist/fullcalendar.min.js', 'public/js')
	.js('resources/assets/js/fullcalendar.js', 'public/js')
	.sass('resources/assets/sass/app.scss', 'public/css')
	.styles([
		'resources/assets/libs/bower/font-awesome/css/font-awesome.min.css',
		'resources/assets/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css',
	], 'public/css/libs.css');
   	// .styles([
   	// 	'resources/assets/css/app.css',
   	// 	'resources/assets/css/bootstrap.css',
   	// 	'resources/assets/css/core.css',
   	// ], 'public/css/backend.css');
