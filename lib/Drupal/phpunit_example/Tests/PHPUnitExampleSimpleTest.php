<?php
/**
 * @file
 * SimpleTests for phpunit_example module.
 */

namespace Drupal\phpunit_example\Tests;
use Drupal\simpletest\WebTestBase;

/**
 * Default test case for the phpunit_example module.
 *
 * Note that this is _not_ a PHPUnit-based test.
 *
 * @ingroup phpunit_example
 */
class PHPUnitExampleSimpleTest extends WebTestBase {

  public static $modules = array('phpunit_example');

  public static function getInfo() {
    return array(
      'name' => 'SimpleTest for PHPUnit Example module',
      'description' => 'Functional tests for the PHPUnit Example module',
      'group' => 'Examples',
    );
  }

  public function testController() {
    $this->drupalGet('examples/phpunit_example');
    $this->assertResponse(200, 'The PHPUnit Example description page is available.');
  }

}
