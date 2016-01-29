<?php

/**
 * @file
 * Contains Drupal\translator_editor\ImageEmbedHelperTrait.
 */

namespace Drupal\translator_editor;

use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Wrapper methods for image embedding.
 *
 * This utility trait should only be used in application-level code, such as
 * classes that would implement ContainerInjectionInterface. Services registered
 * in the Container should not use this trait but inject the appropriate service
 * directly for easier testing.
 */
trait ImageEmbedHelperTrait {

  /**
   * The module handler service.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface.
   */
  protected $moduleHandler;

  /**
   * The image embed service.
   *
   * @var \Drupal\translator_editor\ImageEmbedService.
   */
  protected $url_embed;

  /**
   * Returns the module handler.
   *
   * @return \Drupal\Core\Extension\ModuleHandlerInterface
   *   The module handler.
   */
  protected function moduleHandler() {
    if (!isset($this->moduleHandler)) {
      $this->moduleHandler = \Drupal::moduleHandler();
    }
    return $this->moduleHandler;
  }

  /**
   * Sets the module handler service.
   *
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler service.
   *
   * @return self
   */
  public function setModuleHandler(ModuleHandlerInterface $module_handler) {
    $this->moduleHandler = $module_handler;
    return $this;
  }

  /**
   * Returns the image embed service.
   *
   * @return \Drupal\translator_editor\ImageEmbedInterface
   *   The image embed service..
   */
  protected function imageEmbed() {
    if (!isset($this->image_embed)) {
      $this->image_embed = \Drupal::service('image_embed');
    }
    return $this->image_embed;
  }

  /**
   * Sets the image embed service.
   *
   * @param \Drupal\translator_editor\ImageEmbedInterface $image_embed
   *   The image embed service.
   *
   * @return self
   */
  public function setImageEmbed(ImageEmbedInterface $image_embed) {
    $this->image_embed = $image_embed;
    return $this;
  }
}
