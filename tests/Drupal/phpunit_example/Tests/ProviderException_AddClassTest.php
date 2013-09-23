<?php

/**
 * @file
 * Contains Drupal\phpunit_example\Tests\ProviderException_AddClassTest
 */

namespace Drupal\phpunit_example\Tests;

use Drupal\Tests\UnitTestCase;

use Drupal\phpunit_example\AddClass;

/**
 * A PHPUnit example test case against an example class.
 *
 * This test case demonstrates the following PHPUnit annotations:
 * - dataProvider
 * - expectedException
 *
 * PHPUnit looks for classes with names ending in 'Test'. Then it
 * looks to see whether that class is a subclass of
 * \PHPUnit_Framework_TestCase. Drupal supplies us with
 * Drupal\Tests\UnitTestCase, which is a subclass of
 * \PHPUnit_Framework_TestCase. So yay, PHPUnit will find this class.
 *
 * In unit testing, there should be as few dependencies as possible.
 * We want the smallest number of moving parts to be interacting in
 * our test, or we won't be sure where the errors are, or whether our
 * tests passed by accident.
 *
 * So with that in mind, it's up to us to build out whatever
 * dependencies we need. In the case of AddClass, our needs are meager;
 * we only want an instance of AddClass so we can test its add() method.
 *
 * @ingroup phpunit_example
 * @group phpunit_example
 */
class ProviderException_AddClassTest extends UnitTestCase {

  public static function getInfo() {
    return array(
      'name' => 'AddClass Unit Test',
      'description' => 'Show some simple unit tests',
      'group' => 'Examples',
    );
  }

  /**
   * Very simple test of AddClass::add().
   *
   * This is a very simple unit test of a single method. It has
   * a single assertion, and that assertion is probably going to
   * pass. It ignores most of the problems that could arise in the
   * method under test, so therefore: It is not a very good test.
   */
  public function testAdd() {
    $sut = new AddClass();
    $this->assertEquals($sut->add(2, 3), 5);
  }

  /**
   * Test AddClass::add() with a data provider method.
   *
   * This method is very similar to testAdd(), but uses a data provider method
   * to test with a wider range of data.
   *
   * You can tell PHPUnit which method is the data provider using the
   * '@dataProvider' annotation.
   *
   * The data provider method just returns a big array of arrays of arguments.
   * That is, for each time you want this test method run, the data provider
   * should create an array of arguments for this method. In this case, it's
   * $a, $b, and $expected. So one set of arguments would look a bit like this
   * pseudocode:
   *
   * @code
   * array( valueForA, valueForB, valueForExpected )
   * @endcode
   *
   * It would then wrap this up in a higher-level array, so that PHPUnit can
   * loop through them, like this pseudocode:
   *
   * @code
   * return array( array(first, set), array (next, set) );
   * @endcode
   *
   * This test has a better methodology than testAdd(), because it can easily
   * be adapted by other developers, and because it tries more than one data
   * set. This test is much better than testAdd(), although it still only
   * tests 'good' data. When combined with testAddWithBadDataProvider(),
   * we get a better picture of the behavior of the method under test.
   *
   * @dataProvider addDataProvider
   *
   * @see AddClassTest::addDataProvider()
   */
  public function testAddWithDataProvider($a, $b, $expected) {
    $sut = new AddClass();
    $this->assertEquals($sut->add($a, $b), $expected);
  }

  /**
   * Test AddClass::add() with data that should throw an exception.
   *
   * This method is similar to testAddWithDataProvider(), but the data
   * provider gives us data that should throw an exception.
   *
   * This test uses the '@expectedException' annotation to tell PHPUnit that
   * a thrown exception should pass the test. You specify a
   * fully-qualified exception class name. If you specify \Exception, PHPUnit
   * will pass any exception, whereas a more specific subclass of \Exception
   * will require that exception type to be thrown.
   *
   * Alternately, you can use try and catch blocks with assertions in order
   * to test exceptions. We won't demonstrate that here; it's a much better
   * idea to test your exceptions with @expectedException.
   *
   * @dataProvider addBadDataProvider
   * @expectedException \InvalidArgumentException
   *
   * @see AddClassTest::addBadDataProvider()
   */
  public function testAddWithBadDataProvider($a, $b) {
    $sut = new AddClass();
    $sut->add($a, $b);
  }

  /**
   * Data provider for testAddWithDataProvider().
   *
   * Data provider methods take no arguments and return an array of data
   * to use for tests. Each element of the array is another array, which
   * corresponds to the arguments in the test method's signature.
   *
   * Note also that PHPUnit tries to run tests using methods that begin
   * with 'test'. This means that data provider method names should not
   * begin with 'test'. Also, by convention, they should end with
   * 'DataProvider'.
   *
   * @see AddClassTest::testAddWithDataProvider()
   */
  public function addDataProvider() {
    return array(
      // array($a, $b, $expected)
      array(2, 3, 5),
      array(20, 30, 50),
    );
  }

  /**
   * Data provider for testAddWithBadDataProvider().
   *
   * Since AddClass::add() can throw exceptions, it's time
   * to give it some data that will cause these exceptions.
   *
   * add() should throw exceptions if either of it's arguments are
   * not numeric, and we will generate some test data to prove that
   * this is what it actually does.
   *
   * @see AddClassTest::testAddWithBadDataProvider()
   */
  public function addBadDataProvider() {
    $badData = array();
    // Set up an array with data that should cause add()
    // to throw an exception.
    $badDataTypes = array('string', FALSE, array('foo'), new \stdClass());
    // Create some data where both $a and $b are bad types.
    foreach ($badDataTypes as $badDatumA) {
      foreach ($badDataTypes as $badDatumB) {
        $badData[] = array($badDatumA, $badDatumB);
      }
    }
    // Create some data where $a is good and $b is bad.
    foreach($badDataTypes as $badDatumB) {
      $badData[] = array(1, $badDatumB);
    }
    // Create some data where $b is good and $a is bad.
    foreach($badDataTypes as $badDatumA) {
      $badData[] = array($badDatumA, 1);
    }
    return $badData;
  }

}
