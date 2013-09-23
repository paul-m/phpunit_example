<?php

/**
 * @file
 * Contains Drupal\phpunit_example\Tests\Double_DisplayManagerTest
 */

namespace Drupal\phpunit_example\Tests;

use Drupal\Tests\UnitTestCase;

use Drupal\phpunit_example\DisplayManager;
use Drupal\phpunit_example\DisplayInfoInterface;

/**
 * A PHPUnit example test case against an example class.
 *
 * @todo: More documentation.
 *
 * @ingroup phpunit_example
 * @group phpunit_example
 */
class Double_DisplayManagerTest extends UnitTestCase {

  public static function getInfo() {
    return array(
      'name' => 'DisplayManager Unit Test',
      'description' => 'Demonstrate unit testing with test doubles.',
      'group' => 'Examples',
    );
  }

  public function testSimpleMockDisplayManager() {
    // Setting up:
    // Get a mock object belonging to our desired interface.
    // Note that we have to fully qualify the domain name
    // for PHPUnit's benefit.
    $mock = $this->getMock('Drupal\phpunit_example\DisplayInfoInterface');
    // Here we're illustrating that the mock object belongs to
    // our interface.
    $this->assertTrue($mock instanceof DisplayInfoInterface);
    // 'Program' our mock object to return a value for getDisplayName().
    // expects($this->any()) tells the mock to return this value any time
    // the method is called.
    $mock->expects($this->any())
         ->method('getDisplayName')
         ->will($this->returnValue('the display name'));

    // Create a DisplayManager, the class we're actually testing here.
    $dm = new DisplayManager();
    // Give it the mocked info object.
    $dm->addDisplayableItem($mock);
    // Assert that our DisplayManager has exactly one display object (our mock).
    $this->assertEquals(1, $dm->countDisplayableItems());
    // Assert that the DisplayManager can find our mocked info object.
    $this->assertSame($mock, $dm->item('the display name'));
    // Assert that the DisplayManager can't find an info object
    // that it shouldn't have.
    $this->assertNull($dm->item('nonexistant'));
  }

}
