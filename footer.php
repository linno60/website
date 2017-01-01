            <footer>
            	<div class="dont-print">
	            	<?php include 'templates/site-menu.php' ?>
		</div>
            </footer>
        </div>
        <?php wp_footer() ?>
        <?php if ('local' === ENV) : ?>
            <script src="//timacdonald.dev/wp-content/themes/theme/assets/theme.js"></script>
        <?php else : ?>
            <script src="//cdn.timacdonald.me/website/theme.js?v=3"></script>
        <?php endif ?>
        <script>
        	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        	ga('create', 'UA-89608436-1', 'auto');
        	ga('send', 'pageview');
            <?php if ('local' === ENV) : ?>

                /**
                 * Determine if link to website.
                 *
                 * @param  link
                 * @return bool
                 */
                function isLinkToWebsite(link)
                {
                    return -1 != link.href.indexOf('//timacdonald.me')
                }

                /**
                 * Point link to local website.
                 *
                 * @param  link
                 * @return void
                 */
                function pointToLocalWebsite(link)
                {
                    link.href = link.href.replace('//timacdonald.me', '//timacdonald.dev');
                }

                var links = document.getElementsByTagName('a');

                for (var i = 0; i < links.length; i++) {
                    if (isLinkToWebsite(links[i])) {
                        pointToLocalWebsite(links[i]);
                    }
                }

            <?php endif; ?>
        </script>
    </body>
</html>
