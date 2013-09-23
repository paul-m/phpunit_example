<?php

/**
 * @file
 * Contains Drupal\phpunit_example\DisplayInfoInterface
 */

namespace Drupal\phpunit_example;

/**
 * An interface to objects that provide displayable information.
 *
 * Part of the PHPUnit Example module.
 *
 * Think of this interface as representing objects that can return some sort of
 * display information, such as getInfo() in Drupal tests, or an .info.yml file.
 *
 * @ingroup phpunit_example
 */
interface DisplayInfoInterface {

  /**
   * Get displayable name.
   *
   * @returns string
   *    The display name for the item this object represents.
   */
  public function getDisplayName();

  /**
   * Get displayable description.
   *
   * @returns string
   *    The displayable description for the item this object represents.
   */
  public function getDisplayDescription();

}
