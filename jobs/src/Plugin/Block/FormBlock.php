<?php

namespace Drupal\jobs\Plugin\Block;

use Drupal\Core\Block\BlockBase;
// use Drupal\Core\Session\AccountInterface;
// use Drupal\Core\Access\AccessResult;

/**
 * Provides a 'Job' Block.
 *
 * @Block(
 *   id = "form_block",
 *   admin_label = @Translation("form block"),
 *   category = @Translation("job list"),
 * )
 */
class FormBlock extends BlockBase {


    public function  build(){
     $simpleform = \Drupal::formBuilder()->getForm('Drupal\jobs\Form\SimpleForm');

        return [
            '#theme' => 'form_block',
            '#form' => $simpleform,
        ];
    }
}