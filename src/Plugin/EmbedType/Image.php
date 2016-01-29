<?php

/**
 * @file
 * Contains \Drupal\translator_editor\Plugin\EmbedType\Image.
 */

namespace Drupal\translator_editor\Plugin\EmbedType;

use Drupal\embed\EmbedType\EmbedTypeBase;

/**
 * Image embed type.
 *
 * @EmbedType(
 *   id = "image",
 *   label = @Translation("Image")
 * )
 */
class Image extends EmbedTypeBase {

  /**
   * {@inheritdoc}
   */
  public function getDefaultIconUrl() {
    return file_create_url(drupal_get_path('module', 'translator_editor') . '/js/plugins/drupalLineBreak/line_break.png');
  }
}
