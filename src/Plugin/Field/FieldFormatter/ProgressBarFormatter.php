<?php

namespace Drupal\progress_bar_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation for displaying the progress bar.
 *
 * @FieldFormatter(
 *   id = "progress_bar_default",
 *   label = @Translation("Default Progress Bar"),
 *   field_types = {
 *     "progress_bar"
 *   }
 * )
 */
class ProgressBarFormatter extends FormatterBase {
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#theme' => 'progress_bar_formatter',
        '#percentage' => $item->percentage,
        '#color' => $item->color,
        '#background_color' => $item->background_color,
        '#border_color' => $item->border_color,
        '#text_color' => $item->text_color,
        '#label' => $this->t('@percentage%', ['@percentage' => $item->value]),
        '#attached' => [
          'library' => [
            'progress_bar_field/progress_bar_style',
          ],
        ],
      ];
    }

    return $elements;
  }
}
