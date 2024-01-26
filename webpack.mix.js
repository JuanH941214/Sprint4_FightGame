const mix = require('laravel-mix');
require('tailwindcss');

mix.postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
]);
