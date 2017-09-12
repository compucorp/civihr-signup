<?php

namespace Drupal\civihr_signup\Service;

class BlockService {

  /**
   * @param string $module
   *   The module the block belongs to
   * @param string $delta
   *   The name of tbe block
   */
  public function deleteBlock($module, $delta) {
    $result = db_select('block', 'b')
      ->fields('b', ['bid'])
      ->condition('module', $module)
      ->condition('delta', $delta)
      ->execute();

    $blockIDs = $result->fetchCol('bid');

    db_delete('block_custom')
      ->condition('bid', $blockIDs)
      ->execute();

    db_delete('block')
      ->condition('module', $module)
      ->condition('delta', $delta)
      ->execute();

    db_delete('block_role')
      ->condition('module', $module)
      ->condition('delta', $delta)
      ->execute();

    cache_clear_all();
  }

}
