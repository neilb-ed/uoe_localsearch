uoe_localsearch

Version 1.0:

First things first, this is my first attempt at any Drupal coding, so
if I've got things wrong, or there's better ways to do things, eg like
how to call overridden functions, then please let me know.

The default EdWEB uoe theme's search box takes people off to the central
uoe search pages. For our use of the EdWeb distro for a local intranet, we
want/need search to search the local Drupal content.

This sub-theme of the (7.x-1.3 release of edweb) uoe theme is an
attempt to do that "cleanly".

As well as installing this theme, and making it the default, you need to:

  * enable Drupal's default "search" module. Set the permissions as you
    see fit, we're only allowing the basic search to all users.

  * From the /admin/structure/block page, add "Search form" to the new
    "Search Box" region.

If you don't do that last part, then the default search behaviour remains.


Version 1.1

There is now a theme setting checkbox to hide the large banner image
from the page header.

That's it.
neilb @ inf.ed.ac.uk
26/5/2015
