/**
 * Determine if link to website.
 *
 * @param  link
 * @return bool
 */
function is_link_to_website(link)
{
    return -1 != link.href.indexOf('://timacdonald.me');
}

/**
 * Point link to local website.
 *
 * @param  link
 * @return void
 */
function point_to_local_website(link)
{
    link.href = link.href.replace('://timacdonald.me', '://timacdonald.dev');
}

var links = document.getElementsByTagName('a');

for (var i = 0; i < links.length; i++) {
    if (is_link_to_website(links[i])) {
        point_to_local_website(links[i]);
    }
}
