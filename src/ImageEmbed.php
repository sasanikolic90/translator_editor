<?php

/**
 * @file
 * Contains Drupal\translator_editor\ImageEmbed.
 */

namespace Drupal\translator_editor;

use Embed\Embed;

/**
 * A service class for handling Image embeds.
 */
class ImageEmbed implements ImageEmbedInterface {

  /**
   * @var array
   */
  public $config;

  /**
   * @{inheritdoc}
   */
  public function __construct(array $config = []) {
    $this->config = $config;
  }

  /**
   * @{inheritdoc}
   */
  public function getConfig() {
    return $this->config;
  }

  /**
   * @{inheritdoc}
   */
  public function setConfig(array $config) {
    $this->config = $config;
  }

  /**
   * @{inheritdoc}
   */
  public function getEmbed($request, array $config = []) {
    return Embed::create($request, $config ?: $this->config);
  }

}
