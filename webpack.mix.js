/*
 * AWPS uses Laravel Mix
 *
 * Check the documentation at
 * https://laravel.com/docs/5.6/mix
 */

let mix = require( 'laravel-mix' );

// BrowserSync and LiveReload on `npm run watch` command
// Update the `proxy` and the location of your SSL Certificates if you're developing over HTTPS
mix.browserSync({
	proxy: 'http://basic.co.za/',
	files: [
		'**/*.php',
		'**/*.css',
		'**/*.js'
	],
	injectChanges: true,
	open: false
});

// Autloading jQuery to make it accessible to all the packages, because, you know, reasons
// You can comment this line if you don't need jQuery
mix.autoload({
	jquery: ['$', 'window.jQuery', 'jQuery'],
});

// Compile assets
mix.sass( 'scss/style.scss', 'style.css' );

// Add versioning to assets in production environment
if ( mix.inProduction() ) {
	mix.version();
}
