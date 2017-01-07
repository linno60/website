const elixir = require('laravel-elixir');

elixir((mix) => {
    mix.sass('./buildable/theme.scss', './assets/theme.css')
    .sass('./buildable/amp.scss', './assets/theme-amp.css')
    .webpack('./buildable/theme.js', './assets/theme.js');
});
