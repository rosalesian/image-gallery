var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    /*mix.sass('app.scss');*/

    mix.styles([
    		"bootstrap-material-design.css" ,
    		"bootstrap-material-design.min.css",
    		"ripples.css",
    		"ripples.min.css",
    		"ripples.min.css.map"
    	]);

    mix.scripts([
    		"material.js",
    		"material.min.js",
    		"ripples.js",
    		"ripples.min.js"
    	]);
});

mix.version(['css/all.css', 'js/all.js']);
