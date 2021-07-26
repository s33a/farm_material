<?php

namespace Drupal\farm_material\Plugin\Asset\AssetType;

use Drupal\farm_entity\Plugin\Asset\AssetType\FarmAssetType;

/**
 * Provides the material asset type.
 *
 * @AssetType(
 *   id = "material",
 *   label = @Translation("material"),
 * )
 */
class Material extends FarmAssetType {

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions(): array {
    $fields = parent::buildFieldDefinitions();
    $field_info = [
      'material_type' => [
        'type' => 'entity_reference',
        'label' => $this->t('Substrate'),
        'description' => "What Fungi species benefits from this substrate?",
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'substrate',
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
