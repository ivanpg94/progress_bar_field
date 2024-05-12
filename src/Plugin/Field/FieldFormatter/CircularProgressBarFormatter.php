<?php

namespace Drupal\progress_bar_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation for displaying the progress as a circular progress bar.
 *
 * @FieldFormatter(
 *   id = "circular_progress_bar",
 *   label = @Translation("Circular Progress Bar"),
 *   field_types = {
 *     "progress_bar"
 *   }
 * )
 */
class CircularProgressBarFormatter extends FormatterBase {
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#theme' => 'circular_progress_bar_formatter',
        '#percentage' => $item->percentage,
        '#color' => $item->color,
        '#background_color' => $item->background_color,
        '#border_color' => $item->border_color,
        '#text_color' => $item->text_color,
        '#label' => $this->t('@percentage%', ['@percentage' => $item->value]),
        '#attached' => [
          'library' => [
            'progress_bar_field/circular_progress_bar_styles',
          ],
        ],
      ];
    }
    return $elements;
  }
}
