<?php

namespace Drupal\progress_bar_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * A simple widget to set the progress bar.
 *
 * @FieldWidget(
 *   id = "progress_bar_default",
 *   label = @Translation("Progress Bar"),
 *   field_types = {
 *     "progress_bar"
 *   }
 * )
 */
class ProgressBarWidget extends WidgetBase
{
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state)
  {
    $element['percentage'] = [
      '#type' => 'number',
      '#title' => t('Progress'),
      '#default_value' => isset($items[$delta]->percentage) ? $items[$delta]->percentage : NULL,
      '#min' => 0,
      '#max' => 100,
    ];

    $element['background_color'] = [
      '#type' => 'color',
      '#title' => t('Background color'),
      '#default_value' => isset($items[$delta]->background_color) ? $items[$delta]->background_color : '#FFFFFF',
      '#description' => t('Choose a background color for the progress bar.'),
    ];

    $element['color'] = [
      '#type' => 'color',
      '#title' => t('Bar color'),
      '#default_value' => isset($items[$delta]->color) ? $items[$delta]->color : '#000000',
    ];

    $element['border_color'] = [
      '#type' => 'color',
      '#title' => t('Border color'),
      '#default_value' => isset($items[$delta]->border_color) ? $items[$delta]->border_color : '#000000',
    ];

    $element['text_color'] = [
      '#type' => 'color',
      '#title' => t('Text color'),
      '#default_value' => isset($items[$delta]->text_color) ? $items[$delta]->text_color : '#FFFFFF',
    ];

    return $element;
  }
}
