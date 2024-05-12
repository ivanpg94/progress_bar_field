<?php

namespace Drupal\progress_bar_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'progress_bar' field type.
 *
 * @FieldType(
 *   id = "progress_bar",
 *   label = @Translation("Progress Bar"),
 *   description = @Translation("Displays a progress bar."),
 *   default_widget = "progress_bar_default",
 *   default_formatter = "progress_bar_default"
 * )
 */
class ProgressBarItem extends FieldItemBase {
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['percentage'] = DataDefinition::create('integer')
      ->setLabel(t('Progress value'))
      ->setRequired(TRUE);

    $properties['background_color'] = DataDefinition::create('string')
      ->setLabel(t('Background color'))
      ->setRequired(TRUE);


    $properties['color'] = DataDefinition::create('string')
      ->setLabel(t('Bar color'))
      ->setRequired(TRUE);

    $properties['border_color'] = DataDefinition::create('string')
      ->setLabel(t('Border color'))
      ->setRequired(TRUE);

    $properties['text_color'] = DataDefinition::create('string')
      ->setLabel(t('Text color'))
      ->setRequired(TRUE);

    return $properties;
  }


  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $schema = [
      'columns' => [
        'percentage' => [
          'type' => 'int',
          'not null' => TRUE,
        ],
        'background_color' => [
          'type' => 'varchar',
          'length' => 7,
          'not null' => TRUE,
        ],
        'color' => [
          'type' => 'varchar',
          'length' => 7,
          'not null' => TRUE,
        ],
        'border_color' => [
          'type' => 'varchar',
          'length' => 7,
          'not null' => TRUE,
        ],
        'text_color' => [
          'type' => 'varchar',
          'length' => 7,
          'not null' => TRUE,
        ],
      ],
      'indexes' => [
        'percentage' => ['percentage'],
      ],
      'foreign keys' => [],
    ];

    return $schema;
  }


  public function isEmpty() {
    $percentage = $this->get('percentage')->getValue();
    $background_color = $this->get('background_color')->getValue();
    $color = $this->get('color')->getValue();
    $border_color = $this->get('border_color')->getValue();
    $text_color = $this->get('text_color')->getValue();
    return $percentage === NULL || $percentage === '' || $background_color === NULL || $color === NULL || $border_color === NULL || $text_color === NULL;
  }
}
