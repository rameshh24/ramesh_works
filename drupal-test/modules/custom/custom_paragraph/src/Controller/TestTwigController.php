<?php
/**
 * @file
 * Contains \Drupal\custom_paragraph\Controller\TestTwigController.
 */

namespace Drupal\custom_paragraph\Controller;

use Drupal\Core\Controller\ControllerBase;

class TestTwigController extends ControllerBase {
  public function content() {
    //$config = \Drupal::config('custom_paragraph.adminsettings');
  //  $welcome_message = $config->get('welcome_message'); exit();
    return [
      '#theme' => 'paragraph__paragraph_2',
      '#test_var' => $this->t('Test Value'),
    ];

  }
}
