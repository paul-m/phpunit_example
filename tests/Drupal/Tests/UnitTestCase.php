<?php

/**
 * @file
 * Contains ugly mock of \Drupal\Tests\UnitTestCase so that local testing works.
 */

namespace Drupal\Tests;

/**
 * Provides a base class and helpers for Drupal unit tests.
 */
abstract class UnitTestCase extends \PHPUnit_Framework_TestCase {

  /**
   * This method exists to support the simpletest UI runner.
   *
   * It should eventually be replaced with something native to phpunit.
   *
   * Also, this method is empty because you can't have an abstract static
   * method. Sub-classes should always override it.
   *
   * @return array
   *   An array describing the test like so:
   *   array(
   *     'name' => 'Something Test',
   *     'description' => 'Tests Something',
   *     'group' => 'Something',
   *   )
   */
  public static function getInfo() {
    throw new \RuntimeException("Sub-class must implement the getInfo method!");
  }

  /**
   * Generates a unique random string containing letters and numbers.
   *
   * @param int $length
   *   Length of random string to generate.
   *
   * @return string
   *   Randomly generated unique string.
   *
   * @see \Drupal\Component\Utility\Random::name()
   */
  public function randomName($length = 8) {
    $this->markTestSkipped();
  }

  /**
   * Gets the random generator for the utility methods.
   *
   * @return \Drupal\Component\Utility\Random
   *   The random generator
   */
  protected function getRandomGenerator() {
    $this->markTestSkipped();
  }


  /**
   * Returns a stub config factory that behaves according to the passed in array.
   *
   * Use this to generate a config factory that will return the desired values
   * for the given config names.
   *
   * @param array $configs
   *   An associative array of configuration settings whose keys are configuration
   *   object names and whose values are key => value arrays for the configuration
   *   object in question.
   *
   * @return \PHPUnit_Framework_MockObject_MockBuilder
   *   A MockBuilder object for the ConfigFactory with the desired return values.
   */
  public function getConfigFactoryStub($configs) {
    $this->markTestSkipped();
  }

  /**
   * Returns a stub config storage that returns the supplied configuration.
   *
   * @param array $configs
   *   An associative array of configuration settings whose keys are
   *   configuration object names and whose values are key => value arrays
   *   for the configuration object in question.
   *
   * @return \Drupal\Core\Config\StorageInterface
   *   A mocked config storage.
   */
  public function getConfigStorageStub(array $configs) {
    $this->markTestSkipped();
  }

  /**
   * Mocks a block with a block plugin.
   *
   * @param string $machine_name
   *   The machine name of the block plugin.
   *
   * @return \Drupal\block\BlockInterface|\PHPUnit_Framework_MockObject_MockObject
   *   The mocked block.
   */
  protected function getBlockMockWithMachineName($machine_name) {
    $this->markTestSkipped();
  }

  /**
   * Returns a stub translation manager that just returns the passed string.
   *
   * @return \PHPUnit_Framework_MockObject_MockBuilder
   *   A MockBuilder of \Drupal\Core\StringTranslation\TranslationInterface
   */
  public function getStringTranslationStub() {
    $this->markTestSkipped();
  }

}
