<?php

namespace Drupal\jobs\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Provides a 'Job' Block.
 *
 * @Block(
 *   id = "header_block",
 *   admin_label = @Translation("header block"),
 *   category = @Translation("job list"),
 * )
 */
class HeaderBlock extends BlockBase {


    public function  build(){

        return [
            '#theme' => 'header_block',
            '#null' => NULL,
        ];
    }
}