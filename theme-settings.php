<?php
/**
 * @file
 * theme-settings.php
 *
 * Provides theme settings for Local Search UoE based theme.
 */

/**
 * Implements hook_form_FORM_ID_alter().
 *
 */

function uoe_localsearch_form_system_theme_settings_alter(&$form, $form_state) {

// Show/Hide banner image

  $form['uoe_localsearch_hidebanner'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Hide banner image'),
    '#default_value' => theme_get_setting('uoe_localsearch_hidebanner'),
    '#description'   => t('Checking this box will hide the banner image from the page header.'),
  );

/* Not needed for now
  $form['uoe_localsearch_text'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Spare Field'),
    '#default_value' => theme_get_setting('uoe_localsearch_text'),
    '#description'   => t('This is a spare text field, I may use it later. NeilB'),
  );
*/
}
