<?php

/**
 * @file
 * Contains Drupal\phpunit_example\DisplayManager
 */

namespace Drupal\phpunit_example;

use Drupal\phpunit_example\DisplayInfoInterface;

/**
 * A class with features to show how to do unit testing.
 *
 * @ingroup phpunit_example
 */
class DisplayManager {

  protected $items;

  public function addDisplayableItem(DisplayInfoInterface $item) {
    $this->items[$item->getDisplayName()] = $item;
  }

  public function countDisplayableItems() {
    return count($this->items);
  }

  public function displayableItems() {
    return $this->items;
  }

  public function item($name) {
    if (isset($this->items[$name])) {
      return $this->items[$name];
    }
    return NULL;
  }

}
