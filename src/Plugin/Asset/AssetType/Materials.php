<?php

namespace Drupal\farm_materials\Plugin\Asset\AssetType;

use Drupal\farm_entity\Plugin\Asset\AssetType\FarmAssetType;

/**
 * Provides the compost asset type.
 *
 * @AssetType(
 *   id = "materials",
 *   label = @Translation("Materials"),
 * )
 */
class Materials extends FarmAssetType {

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {
    $fields = parent::buildFieldDefinitions();
    $field_info = [
      'material_type' => [
        'type' => 'entity_reference',
        'label' => $this->t('Substrates'),
        'description' => "What Fungi species benefits from this substrate?",
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'material_type',
        'auto_create' => TRUE,
        'required' => TRUE,
        'multiple' => TRUE,
        'weight' => [
          'form' => -90,
          'view' => -50,
        ],
      ],
    ];
    foreach ($field_info as $name => $info) {
      $fields[$name] = $this->farmFieldFactory->bundleFieldDefinition($info);
    }
    return $fields;
  }

}
