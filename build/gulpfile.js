const elixir = require('laravel-elixir');

elixir((mix) => {
    mix.sass('./assets/theme.scss', '../assets/theme.css')
    .sass('./assets/amp.scss', '../assets/theme-amp.css')
    .webpack('./assets/theme.js', '../assets/theme.js');
});
