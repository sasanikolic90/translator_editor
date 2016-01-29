<?php

/**
 * @file
 * Contains \Drupal\translator_editor\Plugin\CKEditorPlugin\DrupalLineBreakImage.
 */

namespace Drupal\translator_editor\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\ckeditor\CKEditorPluginConfigurableInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "drupalLineBreak" plugin.
 *
 * @CKEditorPlugin(
 *   id = "drupalLineBreak",
 *   label = @Translation("Line break image"),
 *   module = "translation_editor"
 * )
 */
class DrupalLineBreakImage extends CKEditorPluginBase implements CKEditorPluginConfigurableInterface {

  /**
   * {@inheritdoc}
   */
  public function getFile() {
    return drupal_get_path('module', 'translator_editor') . '/js/plugins/drupalLineBreak/plugin.js';
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries(Editor $editor) {
    return array(
      'core/drupal.ajax',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return array(
      'drupalImage_dialogTitleAdd' => 'Test',
      'drupalImage_dialogTitleEdit' => t('Edit Image'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    return array(
      'DrupalImage' => array(
        'label' => t('Image'),
        'image' => drupal_get_path('module', 'translator_editor') . '/js/plugins/drupalLineBreak/line_break.png',
      ),
    );
  }

  /**
   * {@inheritdoc}
   *
   * @see \Drupal\editor\Form\EditorImageDialog
   * @see editor_image_upload_settings_form()
   */
  public function settingsForm(array $form, FormStateInterface $form_state, Editor $editor) {
    $form_state->loadInclude('editor', 'admin.inc');
    $form['line_break_image_upload'] = editor_image_upload_settings_form($editor);
    $form['line_break_image_upload']['#attached']['library'][] = 'ckeditor/drupal.ckeditor.drupalLineBreak.admin';
    $form['line_break_image_upload']['#element_validate'][] = array($this, 'validateImageUploadSettings');
    return $form;
  }

  /**
   * #element_validate handler for the "image_upload" element in settingsForm().
   *
   * Moves the text editor's image upload settings from the DrupalImage plugin's
   * own settings into $editor->image_upload.
   *
   * @see \Drupal\editor\Form\EditorImageDialog
   * @see editor_image_upload_settings_form()
   */
  function validateImageUploadSettings(array $element, FormStateInterface $form_state) {
    $settings = &$form_state->getValue(array('editor', 'settings', 'plugins', 'drupalLineBreak', 'line_break_image_upload'));
    $form_state->get('editor')->setImageUploadSettings($settings);
    $form_state->unsetValue(array('editor', 'settings', 'plugins', 'drupalLineBreak'));
  }

}
