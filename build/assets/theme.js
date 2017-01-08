/**
 * Turbolinks
 */
var turbolinks = require('turbolinks');
turbolinks.start();

/**
 * Highlight.js
 */
var hljs = require('../node_modules/highlight.js/lib/highlight');
hljs.registerLanguage('php', require('../node_modules/highlight.js/lib/languages/php'));

var highlightSamps = function () {
    var samps = document.getElementsByTagName('samp');
    for (var i = 0; i < samps.length; i++) {
        hljs.highlightBlock(samps[i]);
    }
}

hljs.initHighlightingOnLoad();
highlightSamps();
document.addEventListener('turbolinks:load', function () {
    hljs.initHighlighting.called = false;
    hljs.initHighlighting();
    highlightSamps();
});

/**
 * Google Analytics
 */
if (!window.dontTrack) {
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-89608436-1', 'auto');
    ga('send', 'pageview');
}
