<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 * - $is_admin_path: TRUE if the user is viewing an administration page.
 * - $hide_furniture: TRUE if the header region and main menu should not be displayed.
 * - $show_taskbar: TRUE if the task bar should be displayed.
 * - $brand_title: TRUE if the page header should use brand colour elements.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $contact_link: A 'contact us' link, if populated, linking to a Contact page
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see uoe_preprocess_page()
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<?php if ($show_taskbar): ?>
  <div class="container admin-bar">
    <div class="row">
      <div class="col-md-8">
        <?php print render($title_prefix); ?>
        <?php if (!empty($title)): ?>
          <h1 class="page-header"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if (!empty($breadcrumb) && !$is_front): print $breadcrumb; endif;?>
      </div>
      <?php if ($rendered_tabs = render($tabs)): ?>
        <div class="col-md-4" id="uoe-local-tasks">
          <?php print $rendered_tabs; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>

<?php if (!$hide_furniture && $show_navbar): ?>
<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#uoe-navbar-collapse">
        <span class="sr-only">Toggle section links</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <?php if (!empty($primary_nav) || !empty($page['navigation'])): ?>
      <div class="collapse navbar-collapse" id="uoe-navbar-collapse">
      <?php if (!empty($primary_nav)): ?>
        <?php print render($primary_nav); ?>
      <?php endif; ?>
      <?php if (!empty($page['navigation'])): ?>
        <?php print render($page['navigation']); ?>
      <?php endif; ?>
      </div>
    <?php endif; ?>

  </div>
</nav>
<?php endif; ?>

<?php if (!$is_admin_path): ?>
<div class="jumbotron headercontainer">
  <div class="container">
    <div class="row">
      <div class="header brand">
        <div class="col-sm-7 col-md-8">
          <a href="<?php print $front_page; ?>">
            <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?> home" />
        	</a>
        </div>
        <div class="col-sm-5 col-md-4">
         <?php if (empty($page['searchbox'])): ?>
          <form class="form-search" action="http://www.ed.ac.uk/search" method="get">
            <p>
              <small>
                <strong>
                  <a href="//www.ed.ac.uk/schools-departments/"><span class="glyphicon glyphicon-chevron-right"></span> Schools &amp; departments</a>
                </strong>
              </small>
            </p>
            <div class="input-append">
              <label for="uoe-search" class="sr-only">Search: </label>
              <input type="text" placeholder="Search" class="form-control" data-items="4" data-provide="typeahead" name="q" id="uoe-search">
              <button class="btn btn-uoe"><span class="glyphicon glyphicon-search"></span><span class="sr-only">Search</span></button>
            </div>
          </form>
         <?php else: ?>
	   <div class="form-search">
            <p>
              <small>
                <strong>
                  <a href="//www.ed.ac.uk/schools-departments/"><span class="glyphicon glyphicon-chevron-right"></span> Schools &amp; departments</a>
                </strong>
              </small>
            </p>
           <?php print render($page['searchbox']); ?>
          </div>
         <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if (!empty($page_home_hero)): ?>
  <div class="jumbotron home-hero" >
    <?php print $page_home_hero['image']; ?>
    <div class="container titleblock" >
      <?php if (!empty($page_home_hero['subtitle'])): ?>
        <h3><?php print $page_home_hero['subtitle']; ?></h3>
      <?php endif; ?>
      <h1><?php print $page_home_hero['title']; ?></h1>
    </div>
  </div>
<?php endif; ?>
<?php endif; ?>

<div class="container content">

  <?php print render($page['header']); ?>

  <?php if (!empty($page['highlighted'])): ?>
    <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
  <?php endif; ?>

  <?php if (!empty($page['help'])): ?>
    <?php print render($page['help']); ?>
  <?php endif; ?>

  <?php if (!empty($action_links)): ?>
    <ul class="action-links"><?php print render($action_links); ?></ul>
  <?php endif; ?>

  <div class="row">
    <?php if (!$hide_furniture && !empty($page['sidebar_first'])): ?>
      <div class="col-xs-12 col-sm-3 uoe-nav-panel">
        <?php print render($page['sidebar_first']); ?>
      </div>

      <div class="col-xs-12 col-sm-9">
    <?php else: ?>
      <div class="col-xs-12">
    <?php endif; ?>

    <?php if (!$hide_furniture): ?>
      <div class="row breadtrail">
        <div class="col-sm-9 col-md-10">
          <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
        </div>
        <?php if (!empty($contact_link)): ?>
          <div class="col-sm-3 col-md-2">
             <?php print $contact_link; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <a id="main-content"></a>
    <?php print $messages; ?>

    <?php if ($show_title): ?>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1 class="page-header<?php if ($brand_title): ?> brand<?php endif; ?>"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
    <?php endif; ?>

    <?php print render($page['content']); ?>

    <?php if (!empty($node_last_published) && !$is_admin_path): ?>
      <small class="article-published"><?php print $node_last_published; ?></small>
    <?php endif; ?>
    </div><!--/col-xs-12 col-sm-9 end -->
  </div><!--/row-->

</div><!--/container content-->

<?php if (!$is_admin_path): ?>
<footer>
  <?php if (!$hide_furniture): ?>
  <div class="discover-uni">
    <div class="container">
      <h3>The University of Edinburgh</h3>
    </div>
  </div>
  <?php endif; ?>

  <div class="footer">
    <div class="container">
      <div class="row">

        <div class="col-sm-6 col-md-4">
          <ul>
            <li><a href="http://www.ed.ac.uk/about/website/website-terms-conditions">Terms &amp; conditions</a></li>
            <li><a href="http://www.ed.ac.uk/about/website/privacy">Privacy &amp; cookies</a></li>
          </ul>
        </div>

        <div class="col-sm-6 col-md-4">
          <ul>
            <li><a href="http://www.ed.ac.uk/about/website/accessibility">Website accessibility</a></li>
            <li><a href="http://www.ed.ac.uk/about/website/freedom-information">Freedom of information publication scheme</a></li>
          </ul>
        </div>

        <div class="col-sm-6 col-md-4">
          <ul class="footerLogins">
            <li class="buttonMyEd"><a class="btn btn-uoe btn-sm" href="http://www.myed.ed.ac.uk/"> MyEd login <span class="glyphicon glyphicon-chevron-right"></span></a></li>
          </ul>
        </div>

      </div><!--/row-->
    </div><!--/container-->
  </div><!--/footer-->

  <div class="container footer-copyright">
    <div class="row">
      <div class="col-md-12 copyright">
        <p>Unless explicitly stated otherwise, all material is copyright &copy; The University of Edinburgh <?php print date('Y'); ?>.</p><br>
      </div>
    </div>
  </div>

  <?php if ($login_link): ?>
    <div class="container footer-login">
      <div class="row">
        <div class="col-md-12">
          <a class="login-link pull-right" href="<?php print $login_link; ?>"> <abbr class="initialism">CMS</abbr> login <span class="glyphicon glyphicon-chevron-right"></span></a></li>
        </div>
      </div><!--/row-->
    </div><!--/container-->
  <?php endif; ?>

  <?php print render($page['footer']); ?>
</footer>
<?php endif; ?>
