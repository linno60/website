/**
 * Determine if link to website.
 *
 * @param  link
 * @return bool
 */
function isLinkToWebsite(link)
{
    return -1 != link.href.indexOf('://timacdonald.me');
}

/**
 * Point link to local website.
 *
 * @param  link
 * @return void
 */
function pointToLocalWebsite(link)
{
    link.href = link.href.replace('://timacdonald.me', '://timacdonald.dev');
}

var links = document.getElementsByTagName('a');

for (var i = 0; i < links.length; i++) {
    if (isLinkToWebsite(links[i])) {
        pointToLocalWebsite(links[i]);
    }
}
