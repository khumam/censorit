<?php

declare(strict_types=1);

use khumam\censorit\Censorit;
use PHPUnit\Framework\TestCase;

/**
 * HalfCensorTest
 */
final class HalfCensorTest extends TestCase
{    
    /**
     * testHalfCensoring
     *
     * @return void
     */
    public function testHalfCensoring()
    {
        $string = 'Hello World';
        $censored = Censorit::censor($string)->half(5);
        $expect = 'Hello *****';

        $this->assertIsString($censored);
        $this->assertEquals($censored, $expect);
    }
    
    /**
     * testHalfCensoringFromEndOfString
     *
     * @return void
     */
    public function testHalfCensoringFromEndOfString()
    {
        $string = 'Hello World';
        $censored = Censorit::censor($string)->half(-5);
        $expect = '***** World';

        $this->assertIsString($censored);
        $this->assertEquals($censored, $expect);
    }
    
    /**
     * testHalfCensoringWhenOffsetGreatherThanLengthOfString
     *
     * @return void
     */
    public function testHalfCensoringWhenOffsetGreatherThanLengthOfString()
    {
        $string = 'Hello World';
        $censored = Censorit::censor($string)->half(strlen($string) + 1);
        $expect = '***** *****';

        $this->assertIsString($censored);
        $this->assertEquals($censored, $expect);
    }
}
