<?php
ini_set('error_reporting', E_ALL | E_STRICT);
ini_set('display_errors', 1);
ini_set('html_errors', 1);
ini_set('log_errors', 0);

use PHPUnit\Framework\TestCase;
use Lib\Example\ExampleLib;
use \Xicrow\PhpDebug\Debugger;
use \Xicrow\PhpDebug\Timer;
use Worker\ExampleWorkerJob;

class ExampleTest extends TestCase
{
    /**
     * @dataProvider testProvider
     */
    public function testExample($input_one, $input_two, $output)
    {
        // Sample Config for timer
        Timer::$forceDisplayUnit = 'MS';
        Timer::$colorThreshold   = [
        	0     => 'green',
        	2000  => 'orange',
        	50000 => 'red'
        ];

        // Test Code Begins
        $example_obj = new ExampleLib();
        $example_response = $example_obj->exampleMethod();
        $this->assertEquals("testing string", $example_response);

        // Start timer for Method
        Timer::start("Join String Test");
        $this->assertEquals($output, $example_obj->joinStrings($input_one, $input_two));
        Timer::stop();

        // Show All Timers
        Timer::showAll();
    }

    public function testSomeMethod()
    {
        // Sample Config for timer
        Timer::$forceDisplayUnit = 'MS';
        Timer::$colorThreshold   = [
        	0     => 'green',
        	2000  => 'orange',
        	50000 => 'red'
        ];

        // Test Code Begins
        $example_obj = new ExampleLib();
        Timer::start("Some Method Test");
        $test_output = $example_obj->someMethod();
        $this->assertArrayHasKey("bool_value", $test_output);
        $this->assertContains(23, $test_output);
        $this->assertEquals("88", $test_output['string_value']);
        $this->assertGreaterThan(20, $test_output['integer_value']);
        $this->assertInternalType('bool', $test_output['bool_value']);
        Timer::stop();
        Timer::showAll();

        // To enable debug trace.
        // Debugger::showTrace();
    }

    public function testExampleWorkerBeforeRun()
    {
        $worker_obj = new ExampleWorkerJob();
        $worker_obj->beforeRun();
    }

    public function testProvider()
    {
        return [
            'Example Test 1' => ['Hello', 'World', 'Hello World'],
            'Example Test 2' => ['Sun', 'Rising', 'Sun Rising']
        ];
    }
}
