<?php

/**
 * @file
 * template.php
 */

// Fudge to restore some missing CSS and JS that aren't getting
// inherited for free - neilb

function uoe_localsearch_preprocess_html(&$variables) {
  drupal_add_css('profiles/uoe_distribution/libraries/bootstrap/css/bootstrap.min.css', array('type' => 'file', 'weight' => -1 ));
  drupal_add_css('profiles/uoe_distribution/libraries/bootstrap/css/bootstrap-theme.min.css', array('type' => 'file', 'weight' => -1));
  drupal_add_css('profiles/uoe_distribution/libraries/bootstrap/plugins/css/bootstrap-accessibility.css', array('type' => 'file', 'weight' => -1));

  drupal_add_js('profiles/uoe_distribution/libraries/bootstrap/plugins/js/bootstrap.min.js', array('type' => 'file', 'scope' => 'header'));
  drupal_add_js('profiles/uoe_distribution/libraries/bootstrap/plugins/js/bootstrap-accessibility.min.js', array('type' => 'file', 'scope' => 'footer'));

  //  error_log( 'uoe localsearch preprocess_html foot -1' );
}


// Try to override search module search form
// https://api.drupal.org/api/drupal/modules%21system%21system.api.php/function/hook_form_FORM_ID_alter/7

function uoe_localsearch_form_search_box_alter(&$form, &$form_state, $form_id) {
  // Not using this for now
  //  $form['actions']['submit']['#value'] = 'NBS';
  //  $form['submit'] = array( '#type' => 'submit', '#value' => 'Submit'  );
  // unset( $form['search_block_form'] );
  // $form['actions']['submit']['#attributes']['class'][] = 'nbwas';

  // dsm($form_id);  // print form ID to messages
  // dsm($form);  // pretty print array using Krumo to messages
}

// Copied from uoe_distribution/themes/bootstrap/theme/bootstrap/bootstrap-search-form-wrapper.func.php

/**
 * Theme function implementation for bootstrap_search_form_wrapper.
 */
function uoe_localsearch_bootstrap_search_form_wrapper($variables) {
  // This is to cope with different markup for the search block
  // in the header, verses the search results page.
  if( $variables['element']['#name'] == 'search_block_form' ) {
    $output = '<div class="input-append">';
    $output .= $variables['element']['#children'];
    $output .= '<button class="btn btn-uoe col-xs-2">';
    $output .= '<span class="glyphicon glyphicon-search"></span>';
    $output .= '<span class="sr-only">';
    // We can be sure that the font icons exist in CDN.
    if (theme_get_setting('bootstrap_cdn')) {
      $output .= _bootstrap_icon('search');
    } else {
      $output .= t('Search');
    }
    $output .= '</span>';
    $output .= '</button>';
    $output .= '</div>';
  } else {
    // Really just want to call the original, overridden function here
    // but what's the correct way to do that? So for now just duplicate code
    $output = '<div class="input-group">';
    $output .= $variables['element']['#children'];
    $output .= '<span class="input-group-btn">';
    $output .= '<button type="submit" class="btn btn-default">';
    // We can be sure that the font icons exist in CDN.
    if (theme_get_setting('bootstrap_cdn')) {
      $output .= _bootstrap_icon('search');
    }
    else {
      $output .= t('Search');
    }
    $output .= '</button>';
    $output .= '</span>';
    $output .= '</div>';
  }
  //  error_log( 'uoe localsearch search_form_wrapper' );
  //  dsm($variables);  // pretty print array using Krumo to messages
  return $output;
}

/* UOE search has this for the button
<button class="btn btn-uoe col-xs-2">
<span class="glyphicon glyphicon-search"></span>
<span class="sr-only">Search</span>
</button>

Default bootstrap search has
<span class="input-group-btn">
<button type="submit" class="btn btn-bootstrap">Search</button>
</span>
*/