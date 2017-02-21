const { mix } = require('laravel-mix');

mix.js('./assets/theme.js', '../assets')
   .sass('./assets/theme.scss', '../assets')
   .sass('./assets/amp.scss', '../assets/theme-amp.css');